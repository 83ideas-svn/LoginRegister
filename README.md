# LoginRegister
Custome Authentication  is a minimal, simple implementation of all of Laravel's authentication features, including login, registration, password reset, email verification, and password confirmation.  Custome Auth default view layer is made up of simple Blade templates. 

# Installation
Please check the official laravel installation guide for server requirements before you start. Official Documentation

# Package installation
You may install Laravel Custome Authentication via the Composer package manager:

# Step 1 :
composer require custome/authentication

# Step 2 :
Next, you should publish the Custome Authentication configuration and blade files using the vendor:publish Artisan command. The Custome Authentication configuration file will be placed in your application's config directory:

php artisan vendor:publish --provider="Custome\Auth\CustomeAuthServiceProvider"

# Step 3 :
Now You create your Database. Then update your Database name in .env file

# Step 4 :
Finally, you should run your database migrations. Custome Authentication will create user database table in which to store data:

 php artisan migrate
 
 # Step 5 :
Finally Now You can Start your server:

 php artisan serve
 
 # Step 6 :
Set the SMTP details in .env file.

# Step 7 :
Now you go to the config/constants.php file. Then set the own sendor email and username.
 
