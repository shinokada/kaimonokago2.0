# Kaimonokago 3.0.1

Multi-Languages Shopping Cart on CodeIgniter 2.1.0 and BackendPro 0.6.7
PHP 5.3 compatible

## Features

- Multi-languages menu, page content, product content etc.
- Email order notice to admin and cutomer
- Admin login, forgot password function
- Admin Event calendar
- Admin Page management
- jQuery Drop-down site menu
- Different types of slideshow
- Admin Product management
- Customerr News letter subscription
- Customer Login system
- Customer management
- Admin File management
- Admin Menu management
- Admin Order management
- Admin Ajax messages
- Dashboard/RSS feeds
- Dashboard/Google Analytics
- Sharethis
- Email template system
- Ajax status change
- Ajax user name and email check for subscriber module

## Installation

- Create a database kaimonokago and import kaimonokago30.sql
- Modify application/config/config.php and application/config/database.php accordingly.
- Change application/modules/recaptcha/config/recaptcha.php.original to recaptcha.php. Visit http://recaptcha.net/ to get your keys. If you need keys for your localhost, just add a newsite "localhost".

The following folders and files must be writable or chmod 777. After installation please don’t forget checking and changing some of files, especially files in config directory, to 644.

    /var/www/kaimonokago2.0/application/logs/
    /var/www/kaimonokago/assets/cache/
    /var/www/kaimonokago/application/config/config.php
    /var/www/kaimonokago/application/config/database.php
    /var/www/kaimonokago/modules/recaptcha/config/recaptcha.php
    /var/www/kaimonokago/assets/js/plugins/ajaxfilemanager/session/
    /var/www/kaimonokago/assets/js/plugins/ajaxfilemanager/session/gc_counter.ajax.php

Visit http://localhost/kaimonokago2.0

To log-in go to http://localhost/kaimonokago2.0/index.php/auth and change your username, email and password.

    login email: admin@gmail.com
    password: admin

- Enter your public and private key to modules/recaptcha/config/recaptcha.php

Add password to the ajaxfilemanager assets/js/plugins/ajaxfilemanager/inc/config.base.php

    define('CONFIG_ACCESS_CONTROL_MODE', ture);
    define("CONFIG_LOGIN_USERNAME", 'admin@gmail.com');
    define('CONFIG_LOGIN_PASSWORD', 'admin');

- Further Security

Open application/config/config.php and change encryption key.

    $config['encryption_key'] = "yourkey here";

For your Encryption Key, visit "http://www.ideaspace.net/misc/hash/":http://www.ideaspace.net/misc/hash/ or "http://www.whatsmyip.org/hash_generator/":http://www.whatsmyip.org/hash_generator/ to
generate at least 32 characters long code.
After doing this you need to register a new user and change the group field to 2 in be_users in the database. Then try to login.

## Configure Your website
Go to System->Settings and add necessary information for your website. The Settings include followings.

- General Configuration
- Member Settings
- Security Preferences
- Email Configuration
- Maintenance & Debugging Settings
- Module Management
- Website Configuration
- Slideshow Settings
- Google Analytics Settings
- RSS Feeds Settings
- Sharethis Settings
- Twitter Settings 

## How to switch to Multi-language in the frontend.

After logged in, go to System->Settings->Website Configuration. Select 'Yes' in Multiple Languages for Frontend.


## How to add translation

- Go to System->Settings->Website Configuration and select 'Yes' in Multiple Languages.
- Add a language in Languages page and create a new directory application/modules/language/languages/newlang_name.
- Copy from application/modules/welcome/language/english/multi_lang.php and paste it.
- This file is for general language in the webshop. Translate the content of the file.
- Create a menu, page or product.
- Click the name to edit the page. Then find the language you just added.

## How to change the front-end slideshow

- Go to Settings>Slideshow Settings and select a slideshow from a dropdown.

## How to hide/show module menus in the back-end

- Go to Settings>Module Management. Select 'Yes' to show, select 'No' to hide.

## How to delete a menu/page/product etc

- Click a status/tick icon to change the status.
- Delete icon will be displayed. 

## How to use Access Control

- BackendPro: "http://www.kaydoo.co.uk/backendpro/user_guide/features/acl.html":http://www.kaydoo.co.uk/backendpro/user_guide/features/acl.html

## How to customize the template

- There are two placed you need to look at. system/application/views/shop and modules/welcome/views/shop.
- You need to tweak accordingly.

