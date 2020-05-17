# Unzipper

This script allows you to extract contents of the zip to the same directory.

**NOTE: You must upload both script and the zip file to the same directory**

# Usage

- Just upload this script along with your zip file and browse to ```yourdomain.com/path/to/upload/unzip.php```
- Make very sure that the zip is also in the same directory
- Once the script loads, enter the exact name of zip. For example, if you are uploading wordpress, then type ```wordpress-x.x.zip```
- Done, the script will extract zip contents to the current directory (ie. the directory where the script resides)

# Screenshots

<img src="https://github.com/vaibhavkandwal/php-scripts/raw/master/Unzipper/sc1.png" width="600">
<img src="https://github.com/vaibhavkandwal/php-scripts/raw/master/Unzipper/sc2.png" width="600">

# Usage Scenario

This script was made out of frustation. When I first started to learn about web, I wanted to host my wordpress blog for free. Premium hosting comes with 'One-Click Installers' to install wordpress, but free hosts (the ones that I used) contained obsolete versions of those. So the only fix was to use Wordpress from it's official website.

In the beginning, I used to extract all files on my PC, then initiate FTP upload to webserver. This was cumbersome and used to take hours. Then I realised that a continuous stream of data uploads wayyyy faster than discontinuous one (meaning that wordpress.zip got uploaded in mere seconds whereas extracted files took hours).

So I found out a way to extract zip using PHP. I modified and beautified the script a little. That is one case scenario, there may be others. PS: I am still a noob, if there exists another method to setup wordpress, enlighten me!

# Licence

GNU GPL
