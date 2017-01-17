@echo OFF
title Software Package Creator"
cls
cd putfileshere
goto mainpage

:mainpage
echo Choose Compression Levels
echo 1. Store
echo 2. Fast
echo 3. Normal
echo 4. Ultra
set /P compress="Compression: "
IF /I "%compress%"=="1" goto compress1
IF /I "%compress%"=="2" goto compress2
IF /I "%compress%"=="3" goto compress3
IF /I "%compress%"=="4" goto compress4

:compress1
color 0d
..\7z.exe a -tzip ..\generated.zip *.* -mx0
goto confirmdelete

:compress2
color 09
..\7z.exe a -tzip ..\generated.zip *.* -mx1
goto confirmdelete

:compress3
color 0a
..\7z.exe a -tzip ..\generated.zip *.* -mx5
goto confirmdelete

:compress4
color 0c
..\7z.exe a -tzip ..\generated.zip *.* -mx9
goto confirmdelete

:confirmdelete
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo.
echo HeY! If you want, I can remove the contents of the Source Directory too!
echo :D I am a smart program
set /p deleteconfirm="What Do you Say? [y/n]: "
If /I "%deleteconfirm%"=="y" goto deletefiles 
If /I "%deleteconfirm%"=="n" goto exit 

:deletefiles
del *.* /F /Q
goto deleteexit

:deleteexit
cls
echo All Files from source Directory deleted successfully
echo Thank you for using me
echo Cya Around
pause

:exit
cls
echo Thanks for using me! Cya
pause