@echo off
echo ========================================
echo Deploying Project to XAMPP htdocs...
echo ========================================

set "SOURCE=%~dp0"
set "DEST=C:\xampp\htdocs\online-course-registration"

echo Source: %SOURCE%
echo Destination: %DEST%
echo.

xcopy /s /e /y "%SOURCE%*" "%DEST%\"

echo.
echo ========================================
echo Deployment Complete!
echo ========================================
echo.
echo You can now access the updated site at:
echo http://localhost/online-course-registration/
pause