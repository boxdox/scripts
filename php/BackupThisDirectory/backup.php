<?php
/*
 * PHP: Recursively Backup Files & Folders to ZIP-File
 * (c) 2012-2014: Marvin Menzerath - http://menzerath.eu
 * contribution: Drew Toddsby
*/

// Make sure the script can handle large folders/files
ini_set('max_execution_time', 600);
ini_set('memory_limit','1024M');


// This is bad coding, but works!, this sets source directory as current directory
//Start configuration from here!
$sourcedir = getcwd();

//Adding a name to zip, feel free to change it
$zipname=date("Y-m-d").'--'.date("h:i:sa").'--backup.zip';

// THis is where backup will be saved, inside the backups folder of the present directory
$backupdir=getcwd()."/backups/$zipname";

// List all files to be excluded from backup, seperated by comma
$exclude = array("$sourcedir/backups","$sourcedir/backup.php");


// Start the backup! (WARNING: DO NOT CHANGE UNLESS YOU KNOW WHAT YOU ARE DOING!)
zipData($sourcedir, $backupdir, $exclude);
echo 'Finished.';
// Here the magic happens :)
function zipData($source, $destination, $exclude) {
    if (extension_loaded('zip')) {
        if (file_exists($source)) {
            $zip = new ZipArchive();
            if ($zip->open($destination, ZIPARCHIVE::CREATE)) {
                $source = realpath($source);
                if (is_dir($source)) {
                    $iterator = new RecursiveDirectoryIterator($source);
                    // skip dot files while iterating 
                    $iterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
                    $files = new RecursiveIteratorIterator($iterator, RecursiveIteratorIterator::SELF_FIRST);
                    foreach ($files as $file) {
                        if ( in_array($file, $exclude) ) {
                            continue;
                        }
                        if ( is_file($file) ) {
                            $p = pathinfo($file);
                            if ( in_array($p['dirname'], $exclude) ) {
                                continue;
                            }
                        }
                        $file = realpath($file);
                        if (is_dir($file)) {
                            $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                        } else if (is_file($file)) {
                            $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                        }
                    }
                } else if (is_file($source)) {
                    $zip->addFromString(basename($source), file_get_contents($source));
                }
            }
            return $zip->close();
        }
    }
    return false;
}
?>
