@echo off
:loop
php "%~dp0expired.php"
timeout /t 60 >nul
goto loop
