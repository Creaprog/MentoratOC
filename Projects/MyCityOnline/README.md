#My City Online

It's a first project of Multimedia project manager.

### Installation

You need Composer installed :

* Visit https://getcomposer.org/

You need phpMyAdmin

Install the project :

On Windows :

```sh
composer install
```

On Linux or Mac :

```sh
php composer.phar install
```

Edit configuration :

* Rename config.php.dist to config.php in config/ folder.
* Edit config.php witch your personal data.

Install the database :

* Edit installDb.sql in install/ folder.
* Line 108 to 119 complete account config with your accounts names and your accounts passwords. See documentation for more details.
* Import installDB.sql in phpMyAdmin.
* In "mycityonline" database, go to "procedure" and on accounts_creator click on execute. When query is finished click on delete.

Enjoy !

### Documentation

Config.php :

* DBHOST = "YourMySqlHost" - Example : localhost
* DBUSER = "YourMySqlUser" - Example : root
* DBPASS = "YourMySqlPass" - Example : root
* DBNAME = "YourDbName" - By default : mycityonline
* SMTP_ADDRESS = "YourSmtpServer" - Example : smtp.free.fr
* SMTP_PORT = "YourSmtpServerPort" - Example : 25
* SMTP_USER = "YourSmtpUser" - Example : john.doe@free.fr
* SMTP_PASSWORD = "YourSmtpPassword" - Example : 123azerty456
* SWIFT_MESSAGE_TO = "YourCompanyEmail" - Example : mycompany@hotmail.com
* SWIFT_MESSAGE_TO_NAME = "YourCompanyName" - Example : MyCompany

InstallDB.sql :

* admin is the admin account. Example : admin
* admin_pass is the admin password. Example : MyAdminPassword
* publisher_x is the publisher account. Example : carl
* publisher_x_pass is the publisher password. Example : littleApple
* unpublisher_x is the unpublisher account. Example : Mike
* unpublisher_x_pass is the unpublisher password. Example : MySun

> Warning : All account's password must be encrypted in Sha1 !

Rank :

The project have 3 rank :

* Admin : He have total access on the administration panel.
* Publisher : He can publish news, create and edit news.
* Unpublisher : He just can submit news but not publish them, create and edit his news.

Insert/Edit image in news/information form :

* In Image input put url of image who you would like insert. Example : http://wwww.websiteimage.com/image/666.png