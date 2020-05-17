import subprocess

data = []

for x in data:
	name = "{}. {}.mp4".format(x['num'], x['title'])
	print("Downloading: {}".format(name))
	subprocess.call(['curl', '-L', x['vimeo'], '--output', name])