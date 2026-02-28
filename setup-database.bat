@echo off
REM Database Setup Script for Online Course Registration
REM This script helps import the database into MySQL

echo ========================================
echo Online Course Registration - DB Setup
echo ========================================
echo.

REM Check if MySQL is installed
where mysql >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: MySQL is not found in system PATH
    echo.
    echo Please ensure:
    echo 1. XAMPP is installed
    echo 2. MySQL service is running
    echo 3. MySQL bin folder is in PATH
    echo.
    pause
    exit /b 1
)

echo Checking MySQL connection...
mysql -u root -e "SELECT 1" >nul 2>nul
if %errorlevel% neq 0 (
    echo ERROR: Cannot connect to MySQL
    echo Make sure:
    echo 1. MySQL service is running in XAMPP Control Panel
    echo 2. Default credentials (user: root, password: empty) are correct
    echo.
    pause
    exit /b 1
)

echo MySQL connection OK!
echo.
echo Creating database 'onlinecourse'...
mysql -u root -e "CREATE DATABASE IF NOT EXISTS onlinecourse;"

if %errorlevel% neq 0 (
    echo ERROR: Failed to create database
    pause
    exit /b 1
)

echo Importing SQL data...
mysql -u root onlinecourse < "SQL File\onlinecourse.sql"

if %errorlevel% neq 0 (
    echo ERROR: Failed to import SQL file
    pause
    exit /b 1
)

echo.
echo ========================================
echo SUCCESS! Database imported successfully
echo ========================================
echo.
echo You can now access the application at:
echo Student Portal: http://localhost/online-course-registration/
echo Admin Panel: http://localhost/online-course-registration/admin/
echo.
echo Default Admin Credentials:
echo Username: admin
echo Password: admin
echo.
pause
 REM In creating this project, AI was used in some parts for assistance
 

