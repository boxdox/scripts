@Echo OFF
title Extension Remover!!
color a
echo This App allows you to remove additional extensions 
echo (usually the last ones) from all the files in the given folder!
echo.
echo.
echo.
set /p extension="Enter the extension to remove (without the .): "
echo Trying to remove all the extra extension!
RENAME *.%extension% *.
echo Done!
pause
