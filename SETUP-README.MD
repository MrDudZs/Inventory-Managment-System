# Setup guide

## What to do when you clone or Fork this repository:

### Step 0:
> Open Repo with Visual Studio code

> Open XAMPP and add database to PHPMyAdmin doing the following:
```
Create new database
Name: invmgmtsys
Coalation: utf8mb4_general_ci

Open database
select import > select invmgmtsys.sql file from Inventory-Managment-System\database\invmgmtsys.sql
```

(Database Location on Repo: "database\invmgmtsys.sql" )


### Step 1:
> Open Terminal:

**In terminal:**
> Type in console: 
```
Composer install
```
> Press enter and wait for install to complete (This will take a while)
> Wait for:
```
"Generating optimized autoload files"
```
> When this is done you will be able to input the console again.

### Step 2:
> In terminal type:
```
php artisan ser
```
> or
```
php artisan serve
```
> ctrl + click the IP given in terminal
```
   INFO  Server running on [IP]].
```

## What to do incase of "Internal Server Error"
> If you have this error this is due to the database file not being uploaded to XAMPP PHPMyAdmin
> Ensure you:
> Named the database "invmgmtsys"
> Uploaded the .db file to the database "invmgmtsys"

