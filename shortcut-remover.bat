@echo off
echo HeY! Tired of Shortcut virus? Just input your drive letter (be careful!!)
echo To remove shortcut virus from:
echo[
echo[

:CHOOSE
set /p driveletter=Just the drive letter (without ":"): 

SET /P AREYOUSURE=Are you sure ([Y]/N)?:  
IF /I "%AREYOUSURE%" NEQ "Y" GOTO END

echo Cleaning Drive...

attrib -h -r -s /s /d /l %driveletter%:*.*
echo[
echo[
GOTO DeleteLinks

:DeleteLinks

SET /P dellinks=Do You Want Me to Remove those pesky link files ([Y]/N)?
IF /I "%dellinks%" NEQ "Y" GOTO THANKS

del %driveletter%:/*.lnk
GOTO THANKS


:THANKS
cls
echo Your Drive has been fixed!
echo[
echo[
echo Thanks for using!!
echo[
echo[
echo Press any key to close........
pause >nul
exit

:END
GOTO CHOOSE
