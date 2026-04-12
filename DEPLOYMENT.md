# AMIS Student Portal - Deployment Guide

## ⚠️ Important: Laravel Cannot Run on Netlify
Netlify is for static sites only. Laravel requires PHP server and MySQL database.

## Recommended Hosting Options

### Option 1: Heroku (Free Tier Available)
**Best for testing and small projects**

1. Install Heroku CLI: https://devcenter.heroku.com/articles/heroku-cli
2. Login to Heroku:
   ```bash
   heroku login
   ```

3. Create new Heroku app:
   ```bash
   cd student_portal
   heroku create amis-student-portal
   ```

4. Add MySQL database (ClearDB):
   ```bash
   heroku addons:create cleardb:ignite
   ```

5. Get database credentials:
   ```bash
   heroku config:get CLEARDB_DATABASE_URL
   ```

6. Set environment variables:
   ```bash
   heroku config:set APP_NAME="Al Munawwara Islamic School"
   heroku config:set APP_ENV=production
   heroku config:set APP_DEBUG=false
   heroku config:set APP_KEY=base64:YOUR_APP_KEY_HERE
   ```

7. Deploy:
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   git push heroku main
   ```

8. Run migrations:
   ```bash
   heroku run php artisan migrate:fresh --seed
   ```

9. Your app will be live at: https://amis-student-portal.herokuapp.com

---

### Option 2: Railway.app (Recommended - Easy Setup)
**Modern, easy to use, free tier**

1. Go to https://railway.app
2. Sign up with GitHub
3. Click "New Project" → "Deploy from GitHub repo"
4. Select your repository
5. Add MySQL database from Railway marketplace
6. Set environment variables in Railway dashboard
7. Deploy automatically!

---

### Option 3: Render.com (Free Tier)
**Good alternative to Heroku**

1. Go to https://render.com
2. Sign up and create new "Web Service"
3. Connect your GitHub repository
4. Set build command: `composer install`
5. Set start command: `php artisan serve --host=0.0.0.0 --port=$PORT`
6. Add PostgreSQL or MySQL database
7. Set environment variables
8. Deploy!

---

### Option 4: InfinityFree / 000webhost (Free PHP Hosting)
**For simple testing**

1. Sign up at https://infinityfree.net or https://www.000webhost.com
2. Upload files via FTP
3. Create MySQL database from control panel
4. Update .env with database credentials
5. Run migrations via SSH or phpMyAdmin

---

### Option 5: Shared Hosting (cPanel)
**Traditional hosting with cPanel**

1. Upload Laravel files to public_html
2. Move contents of /public to root
3. Update paths in index.php
4. Create MySQL database in cPanel
5. Update .env file
6. Run migrations

---

## Pre-Deployment Checklist

- [ ] Set `APP_ENV=production` in .env
- [ ] Set `APP_DEBUG=false` in .env
- [ ] Generate new `APP_KEY`: `php artisan key:generate`
- [ ] Configure database credentials
- [ ] Run `composer install --optimize-autoloader --no-dev`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Test all features locally first

---

## Environment Variables Needed

```env
APP_NAME="Al Munawwara Islamic School"
APP_ENV=production
APP_KEY=base64:YOUR_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password
```

---

## Test Accounts (After Seeding)

1. **New Student**: newstudent@amis.edu.ph / 123
2. **Old Student**: oldstudent@amis.edu.ph / 123
3. **Dropout**: dropout@amis.edu.ph / 123
4. **Transferee**: transferee@amis.edu.ph / 123
5. **Rejected**: rejected@amis.edu.ph / 123

---

## Troubleshooting

**500 Error:**
- Check storage and bootstrap/cache permissions (775)
- Run `php artisan config:clear`
- Check .env file is configured correctly

**Database Connection Error:**
- Verify database credentials
- Check if database exists
- Ensure database server is accessible

**Missing Assets:**
- Run `php artisan storage:link`
- Check public folder permissions

---

## Need Help?

- Laravel Deployment Docs: https://laravel.com/docs/deployment
- Heroku PHP Docs: https://devcenter.heroku.com/articles/getting-started-with-laravel
- Railway Docs: https://docs.railway.app/
