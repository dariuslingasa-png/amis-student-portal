# Deploy AMIS Student Portal to Railway

## Prerequisites
- GitHub account with the repository pushed
- Railway account (sign up at https://railway.app)

## Step 1: Prepare Your Repository
The necessary files have been created:
- `nixpacks.toml` - Railway build configuration
- `.railwayignore` - Files to ignore during deployment

## Step 2: Deploy to Railway

1. Go to https://railway.app and sign in with GitHub

2. Click "New Project"

3. Select "Deploy from GitHub repo"

4. Choose your repository: `dariuslingasa-png/amis-student-portal`

5. Railway will automatically detect it's a Laravel app

## Step 3: Add Environment Variables

In your Railway project dashboard, go to "Variables" and add:

```
APP_NAME="AMIS Student Portal"
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-app.railway.app

DB_CONNECTION=mysql
DB_HOST=${{MYSQLHOST}}
DB_PORT=${{MYSQLPORT}}
DB_DATABASE=${{MYSQLDATABASE}}
DB_USERNAME=${{MYSQLUSER}}
DB_PASSWORD=${{MYSQLPASSWORD}}

SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

## Step 4: Add MySQL Database

1. In your Railway project, click "New" → "Database" → "Add MySQL"

2. Railway will automatically create database environment variables

3. The app will use these variables automatically

## Step 5: Generate APP_KEY

Run this command locally to generate an app key:
```bash
php artisan key:generate --show
```

Copy the output and paste it as the `APP_KEY` value in Railway

## Step 6: Deploy

1. Railway will automatically deploy when you push to GitHub

2. Or click "Deploy" in the Railway dashboard

3. Wait for the build to complete (usually 2-5 minutes)

## Step 7: Access Your App

1. Go to "Settings" → "Networking" → "Generate Domain"

2. Railway will give you a URL like: `https://your-app.railway.app`

3. Visit the URL to see your student portal!

## Troubleshooting

### If deployment fails:
- Check the build logs in Railway dashboard
- Ensure all environment variables are set correctly
- Make sure APP_KEY is generated and set

### If database connection fails:
- Verify MySQL database is added to the project
- Check that DB_* variables are correctly linked

### To run migrations manually:
Railway doesn't have a direct console, but migrations run automatically on deployment via the start command.

## Updating Your App

Simply push changes to GitHub:
```bash
git add .
git commit -m "Update student portal"
git push origin main
```

Railway will automatically redeploy!

## Cost
- Railway offers a free tier with $5 credit per month
- Should be sufficient for development/testing
- Upgrade if you need more resources

## Support
- Railway Docs: https://docs.railway.app
- Railway Discord: https://discord.gg/railway
