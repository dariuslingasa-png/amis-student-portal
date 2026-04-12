# Quick Start - Deploy to Heroku in 5 Minutes! 🚀

## Before You Start

✅ Make sure you have:
1. Heroku account (sign up at https://heroku.com - FREE!)
2. Heroku CLI installed (download from https://devcenter.heroku.com/articles/heroku-cli)
3. Git installed

---

## Option 1: Automatic Deployment (Easiest!)

Just double-click this file:
```
deploy-to-heroku.bat
```

The script will:
- Initialize Git
- Create Heroku app
- Add MySQL database
- Set environment variables
- Deploy your code
- Run migrations
- Open your app!

---

## Option 2: Manual Deployment (Step by Step)

### 1. Install Heroku CLI
Download: https://cli-assets.heroku.com/heroku-x64.exe

### 2. Open Terminal in Project Folder
```bash
cd "C:\xampp\htdocs\AMIS Online\student_portal"
```

### 3. Login to Heroku
```bash
heroku login
```

### 4. Initialize Git
```bash
git init
git add .
git commit -m "Initial commit"
```

### 5. Create Heroku App
```bash
heroku create amis-student-portal
```

### 6. Add MySQL Database
```bash
heroku addons:create cleardb:ignite
```

### 7. Set Environment Variables
```bash
php artisan key:generate --show
```
Copy the output, then:
```bash
heroku config:set APP_KEY="paste-key-here"
heroku config:set APP_NAME="Al Munawwara Islamic School"
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
```

### 8. Deploy!
```bash
git push heroku main
```

### 9. Run Migrations
```bash
heroku run php artisan migrate:fresh --seed
```

### 10. Open Your App
```bash
heroku open
```

---

## Test Accounts

After deployment, login with:

| Email | Password | Type |
|-------|----------|------|
| newstudent@amis.edu.ph | 123 | New Student |
| oldstudent@amis.edu.ph | 123 | Old Student (Grade 11 STEM) |
| dropout@amis.edu.ph | 123 | Dropout Student |
| transferee@amis.edu.ph | 123 | Transferee |
| rejected@amis.edu.ph | 123 | Rejected Student |

---

## Troubleshooting

### "heroku: command not found"
- Install Heroku CLI from the link above
- Restart your terminal after installation

### "Permission denied"
- Run: `heroku login` again

### "App name already taken"
- Choose a different name: `heroku create your-unique-name`

### "Database connection failed"
- Check: `heroku config`
- The CLEARDB_DATABASE_URL should be set automatically

### View Logs
```bash
heroku logs --tail
```

---

## Update Your App Later

When you make changes:
```bash
git add .
git commit -m "Your update message"
git push heroku main
```

---

## Need More Help?

📖 Read: HEROKU_DEPLOYMENT_STEPS.md (detailed guide)
🌐 Visit: https://devcenter.heroku.com/articles/getting-started-with-laravel
💬 Check logs: `heroku logs --tail`

---

## Your App URL

After deployment, your app will be at:
```
https://your-app-name.herokuapp.com
```

Share this URL with your team! 🎉
