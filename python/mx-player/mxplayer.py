import requests
import json
import re
import subprocess
import sys

# Parse args
if (len(sys.argv) < 2):
    print("please provide link to first episode as argument. exiting")
    sys.exit()
elif (len(sys.argv) > 2):
    print("too many arguments. try `python mx.py url`. exiting.")
    sys.exit()
url = sys.argv[1]

# Fetch the data
source = requests.get(url).text

l = source.find("window.state = ")+15
r = source.find("window.MX_LANGUAGES")

data = json.loads(source[l:r])

# Configure the data
links = []
base_link = data["config"]["videoCdnBaseUrl"]

for entry in data["entities"].items():
    x = entry[1]["stream"]
    if x is not None:
        title = re.sub(r'[^-a-zA-Z0-9_.() ]+', '', entry[1]["title"])
        season = entry[1]["container"]["sequence"]
        episode = entry[1]["sequence"]
        name = "S{:02d}E{:02d} - {}".format(season, episode, title)

        provider = x["provider"]
        if provider == "thirdParty":
            if x[provider]["dashUrl"] is not None:
                down = x[provider]["dashUrl"]
            if x[provider]["hlsUrl"] is not None:
                down = x[provider]["hlsUrl"]
            else:
                print("cannot find download link.")
                break

        elif provider == "mxplay":
            if x[provider]["dash"]["base"] is not None:
                down = x[provider]["dash"]["base"]
            if x[provider]["dash"]["high"] is not None:
                down = x[provider]["dash"]["high"]
            if x[provider]["hls"]["base"] is not None:
                down = x[provider]["hls"]["base"]
            if x[provider]["hls"]["high"] is not None:
                down = x[provider]["hls"]["high"]
        if provider != "thirdParty":
            url = base_link + down
        else:
            url = down
        links.append((name, url))

for x in links:
    print("Downloading: {}".format(x[0]))
    subprocess.call(['ffmpeg', '-i', x[1], "-c", "copy", "-hide_banner",
                     "-loglevel", "warning", "{}.mp4".format(x[0])])
