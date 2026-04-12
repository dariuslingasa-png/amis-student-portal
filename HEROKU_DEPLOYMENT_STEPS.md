# Heroku Deployment - Step by Step Guide

## Prerequisites
- Git installed on your computer
- Heroku account (sign up at https://heroku.com - it's free!)
- Heroku CLI installed

---

## Step 1: Install Heroku CLI

### For Windows:
Download and install from: https://devcenter.heroku.com/articles/heroku-cli

Or use this direct link:
https://cli-assets.heroku.com/heroku-x64.exe

### Verify Installation:
Open a new terminal and run:
```bash
heroku --version
```

You should see something like: `heroku/8.x.x`

---

## Step 2: Login to Heroku

In your terminal, run:
```bash
heroku login
```

This will open your browser. Click "Log in" and enter your Heroku credentials.

---

## Step 3: Prepare Your Project

Navigate to your project folder:
```bash
cd "C:\xampp\htdocs\AMIS Online\student_portal"
```

Initialize Git (if not already done):
```bash
git init
```

Add all files:
```bash
git add .
```

Commit:
```bash
git commit -m "Initial commit for Heroku deployment"
```

---

## Step 4: Create Heroku App

Create a new Heroku app:
```bash
heroku create amis-student-portal
```

Note: If "amis-student-portal" is taken, Heroku will suggest a different name or you can choose your own:
```bash
heroku create your-unique-app-name
```

---

## Step 5: Add MySQL Database

Add ClearDB MySQL addon (free tier):
```bash
heroku addons:create cleardb:ignite
```

Get your database URL:
```bash
heroku config:get CLEARDB_DATABASE_URL
```

You'll see something like:
```
mysql://username:password@host/database_name?reconnect=true
```

---

## Step 6: Set Environment Variables

Set your app key (generate a new one):
```bash
php artisan key:generate --show
```

Copy the output and set it:
```bash
heroku config:set APP_KEY="base64:YOUR_KEY_HERE"
```

Set other environment variables:
```bash
heroku config:set APP_NAME="Al Munawwara Islamic School"
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
heroku config:set LOG_CHANNEL=errorlog
```

---

## Step 7: Configure Database Connection

Heroku automatically sets CLEARDB_DATABASE_URL. We need to parse it.

Add this to your `config/database.php` in the connections array (already done for you):

The system will automatically use CLEARDB_DATABASE_URL.

---

## Step 8: Deploy to Heroku

Push your code to Heroku:
```bash
git push heroku main
```

If you're on master branch:
```bash
git push heroku master
```

This will take a few minutes. You'll see the build process in your terminal.

---

## Step 9: Run Database Migrations

After deployment, run migrations:
```bash
heroku run php artisan migrate:fresh --seed
```

Type `yes` when prompted.

---

## Step 10: Open Your App

Open your app in browser:
```bash
heroku open
```

Or visit: https://your-app-name.herokuapp.com

---

## Test Accounts

After seeding, you can login with:

1. **New Student**: newstudent@amis.edu.ph / 123
2. **Old Student**: oldstudent@amis.edu.ph / 123
3. **Dropout**: dropout@amis.edu.ph / 123
4. **Transferee**: transferee@amis.edu.ph / 123
5. **Rejected**: rejected@amis.edu.ph / 123

---

## Useful Heroku Commands

View logs:
```bash
heroku logs --tail
```

Run artisan commands:
```bash
heroku run php artisan [command]
```

Open Heroku dashboard:
```bash
heroku open --app your-app-name
```

Restart app:
```bash
heroku restart
```

Check app info:
```bash
heroku info
```

---

## Troubleshooting

### Error: "No such app"
Make sure you're in the right directory and the app is created:
```bash
heroku apps
```

### Error: "Permission denied"
Login again:
```bash
heroku login
```

### Error: "Database connection failed"
Check database config:
```bash
heroku config
```

### Error: "500 Internal Server Error"
Check logs:
```bash
heroku logs --tail
```

Clear cache:
```bash
heroku run php artisan config:clear
heroku run php artisan cache:clear
```

### Need to update code?
```bash
git add .
git commit -m "Update message"
git push heroku main
```

---

## Important Notes

1. **Free Tier Limitations:**
   - App sleeps after 30 minutes of inactivity
   - 550-1000 free dyno hours per month
   - 5MB database storage (ClearDB free tier)

2. **Keep App Awake:**
   - Use a service like UptimeRobot to ping your app every 25 minutes
   - Or upgrade to paid tier ($7/month)

3. **Database Backups:**
   - Free tier doesn't include automatic backups
   - Export data regularly if important

4. **Custom Domain:**
   - You can add a custom domain in Heroku dashboard
   - Go to Settings → Domains

---

## Next Steps After Deployment

1. Test all features on the live site
2. Update the bottom bar message (remove "LOCAL DEVELOPMENT")
3. Set up monitoring (Heroku dashboard has basic metrics)
4. Consider upgrading if you need more resources
5. Add custom domain if desired

---

## Need Help?

- Heroku Support: https://help.heroku.com
- Laravel Heroku Guide: https://devcenter.heroku.com/articles/getting-started-with-laravel
- Check logs first: `heroku logs --tail`
