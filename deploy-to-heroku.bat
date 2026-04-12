@echo off
echo ========================================
echo AMIS Student Portal - Heroku Deployment
echo ========================================
echo.

echo Step 1: Checking if Git is initialized...
if not exist .git (
    echo Initializing Git repository...
    git init
    echo Git initialized!
) else (
    echo Git already initialized.
)
echo.

echo Step 2: Adding files to Git...
git add .
echo Files added!
echo.

echo Step 3: Committing changes...
git commit -m "Deploy to Heroku"
echo Changes committed!
echo.

echo Step 4: Creating Heroku app...
echo Please enter your desired app name (or press Enter for random name):
set /p APPNAME=App Name: 

if "%APPNAME%"=="" (
    heroku create
) else (
    heroku create %APPNAME%
)
echo.

echo Step 5: Adding ClearDB MySQL addon...
heroku addons:create cleardb:ignite
echo Database added!
echo.

echo Step 6: Setting environment variables...
echo Generating APP_KEY...
for /f "tokens=*" %%i in ('php artisan key:generate --show') do set APPKEY=%%i
heroku config:set APP_KEY="%APPKEY%"
heroku config:set APP_NAME="Al Munawwara Islamic School"
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
heroku config:set LOG_CHANNEL=errorlog
echo Environment variables set!
echo.

echo Step 7: Deploying to Heroku...
git push heroku main
echo.

echo Step 8: Running database migrations...
heroku run php artisan migrate:fresh --seed --force
echo.

echo ========================================
echo Deployment Complete!
echo ========================================
echo.
echo Opening your app in browser...
heroku open
echo.
echo Your app is now live!
echo.
echo Test Accounts:
echo 1. newstudent@amis.edu.ph / 123
echo 2. oldstudent@amis.edu.ph / 123
echo 3. dropout@amis.edu.ph / 123
echo 4. transferee@amis.edu.ph / 123
echo 5. rejected@amis.edu.ph / 123
echo.
pause
