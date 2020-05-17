# Backup This Directory!
This script allows you to backup the current directory (the directory in which the script is present) recursively (all files and subfolders included) into a zip file!.

**Note: This script can also backup a specific folder (see Configurations)**

Steps to backup your current directory:
1. Upload this file inside the folder you are looking to backup (For Ex: If you want to backup your htdocs (or public_html) folder, then upload this to the root of your webhosting)
2. Run the script from your browser: www.yourdomain.com/path/to/script/backup.php
3. It will generate backup in the 'backup' directory, relative to script path. (This directory is excluded from backup)
4. Use Filezilla (or your favorite FTP Client) to download the backup.

## Configurations
You can configure the script using the configuration variables available at the top of the script

- ```$sourcedir```, this allows you to specify the 'Source' directory (or the directory to be backed up)
- ```$backupdir```, this specifies the location for backup to be stored
- ```$zipname```, as the name suggests, is naming of the zip file
- ```$exclude```, this is an array, which specifies files/directories to be excluded from backup

## Licence
Free to use, under GNU GPL licence
