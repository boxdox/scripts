@Echo OFF
title Extension Remover!!
color a
echo This App allows you to remove additional extensions 
echo (usually the last ones) from all the files in the given folder!
echo.
echo.
echo.
set /p extension="Enter the extension to remove (without the .): "
set /p choice="Do you want to remove extension of files in sub directories too? [Y/N]: "
IF /i "%choicethis%"=="Y" IF /i "%choicethis%"=="y" goto Recursive
IF /i "%choicethis%"=="N" IF /i "%choicethis%"=="n" goto Normal

echo Trying to remove all the extra extension!

:Normal
RENAME *.%extension% *.
goto commonexit

:Recursive
for /r %%x in (*.%extension%) do ren "%%x" *.
goto commonexit

:commonexit
echo Done!
pause
