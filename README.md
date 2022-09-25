# DLBCSPJWD01

Hello Sandra, 

unfortunately the XAMPP installation file is 164MB big and cant be uploaded to GitHub, they only allow files up to 25MB, so i could only upload it to pebblepad, in addition i added the official download link in the install instructions.

Please find the installation instructions below: 


1)Download XAMPP (https://downloadsapachefriends.global.ssl.fastly.net/8.1.6/xampp-windows-x64-8.1.6-0-VS16-installer.exe?from_af=true) or from the pebblepad submission. 

2)Start the XAMPP installer and add following components: Apache, MySQL, PHP, phpMyAdmin

3)Open the XAMPP control panel and start: the Apache and MySQL modules

4)Download the SQL Dump "webshop.sql" from the GitHub repository 

5)Open http://localhost/phpmyadmin/index.php to configure the MySQL-database, this link will open your phpMyadmin to configure your MySQL database. 

6)Click on "New" to open the configuration window for a new database

7)Click import and choose the previously downloaded file "webshop.sql", this way we import our dumped database and can work with already existing datasets. 

8)Open the root folder of your apache webserver C:\xampp\htdocs and copy the css, javascript and pics folder from the github repository additionally the cart.php, index.php, mail.php, store.php files to it. 

9)Now our webserver should be reachable and present the index.php file as the startpage for browsercalls. Please open in a webbrowser of your choice http://localhost/

10)You can now start browsing the website and shop in the webstore, when you filled up your shoppingbasket, please move to the checkout page, here you can update all quantities or trigger an order via email. 
