# Quick Railway Setup for AMIS Student Portal

## What Railway Will Do Automatically:
✅ Create MySQL database
✅ Run all migrations (create tables)
✅ Run seeders (insert sample data)
✅ Deploy your app

## Step-by-Step Setup:

### 1. Go to Railway
Visit: https://railway.app and sign in with GitHub

### 2. Create New Project
- Click "New Project"
- Select "Deploy from GitHub repo"
- Choose: `dariuslingasa-png/amis-student-portal`

### 3. Add MySQL Database
- In your project, click "+ New"
- Select "Database" → "MySQL"
- Wait 30 seconds for it to provision

### 4. Add Environment Variables
Click on your web service → "Variables" tab → Add these:

```
APP_NAME=AMIS Student Portal
APP_ENV=production
APP_KEY=base64:XCFsRtXMWRD7fndPvUZ7T7bAZGCRdSpkBJRzD2WzKWM=
APP_DEBUG=false
APP_URL=https://your-app.railway.app

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

SESSION_DRIVER=database
CACHE_DRIVER=database
QUEUE_CONNECTION=database

LOG_CHANNEL=stack
LOG_LEVEL=error
```

**IMPORTANT:** Replace `MySQL` in the DB variables with your actual MySQL service name from Railway!

### 5. Generate Domain
- Go to "Settings" → "Networking"
- Click "Generate Domain"
- You'll get a URL like: `https://web-production-xxxxx.up.railway.app`
- Copy this URL and update the `APP_URL` variable

### 6. Deploy
Railway will automatically deploy. Wait 3-5 minutes.

### 7. Test Login
Visit your Railway URL and login with:

**New Student (Not Enrolled):**
- Email: `newstudent@amis.edu.ph`
- Password: `123`

**Old Student (With Grades):**
- Email: `oldstudent@amis.edu.ph`
- Password: `123`

**Dropout Student:**
- Email: `dropout@amis.edu.ph`
- Password: `123`

**Transferee:**
- Email: `transferee@amis.edu.ph`
- Password: `123`

**Rejected Student:**
- Email: `rejected@amis.edu.ph`
- Password: `123`

## Database Structure

The app will automatically create:
- **users** table - Student information
- **grades** table - Student grades (Q1-Q4, Final, Remarks)
- **sessions** table - User sessions
- **password_reset_tokens** - Password resets
- **cache** tables - Application cache
- **jobs** tables - Background jobs

## Sample Data Included

The seeder creates 5 students with complete data:
1. Ahmad Ibrahim - New student, Grade 7
2. Fatima Abdullah - Old student with full grade history (Grade 6-11 STEM)
3. Hassan Malik - Dropout student
4. Aisha Rahman - Transferee, Grade 12 ABM
5. Maria Santos - Rejected enrollment

## Troubleshooting

### 500 Error?
- Check that APP_KEY is set
- Verify MySQL database is added
- Check deployment logs for errors

### Database Connection Error?
- Make sure MySQL service name matches in DB variables
- Example: If your MySQL is called "mysql-production", use:
  ```
  DB_HOST=${{mysql-production.MYSQLHOST}}
  ```

### Need to Reset Database?
Railway will run `migrate:fresh --seed` on every deployment, which:
- Drops all tables
- Recreates them
- Inserts sample data

## Cost
- Free tier: $5 credit/month
- Should be enough for development/testing

## Support
- Railway Docs: https://docs.railway.app
- Railway Discord: https://discord.gg/railway
