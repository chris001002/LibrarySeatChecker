@echo off
:loop
php C:\Users\kokia\Desktop\LibrarySeatChecker\expired.php
timeout /t 60 >nul
goto loop