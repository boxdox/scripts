This script downloads the TV shows from MXPlayer's desktop website. Currently there is no setting to control the download quality, you will always get the highest quality.

> Since MXPlayer works with different video providers. If you are unable to download from an unsupported provider, please open a issue.

### Instructions:

1. **Make sure that you have ffmpeg installed and is available in path**
2. Go to your favorite show on [mxplayer.in](https://www.mxplayer.in/), play the first episode and copy the url.
3. Run the script, provide the link as argument:
    ```sh
    python3 mxplayer.py your-copied-url-here
    ```
4. Wait for your show to download in the same directory as the script.

_Note: This is supposed to download all the seasons of the show, if it doesn't, try to follow step 2 for each season._