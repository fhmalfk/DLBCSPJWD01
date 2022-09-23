# DLBCSPJWD01

Hello Sandra, 

the XAMPP installation file is 164MB big and cant be uploaded to GitHub, they only allow files up to 25MB, so i can only attach a download link for it. 

Please find the installation instructions below: 


1)Download XAMPP (https://downloadsapachefriends.global.ssl.fastly.net/8.1.6/xampp-windows-x64-8.1.6-0-VS16-installer.exe?from_af=true)
2)Start the XAMPP installer and add following components: Apache, MySQL, PHP, phpMyAdmin
3)Open XAMPP control panel and start the Apache and MySQL services

4)Download the SQL Dump "webshop.sql" from the GitHub repository 
5)Open http://localhost/phpmyadmin/index.php to configure the MySQL-database
6)Click on "New" to open the configuration window for a new database
7)Click import and choose the previously downloaded file "webshop.sql", this way we import our dumped database and can work with already existing datasets. 

8)Open the root folder of our apache webserver C:\xampp\htdocs and copy the css, javascript and pics folder from the github repository
then copy the cart.php, index.php, mail.php, store.php files to it. 
9)Now our webserver should be reachable and present the index.php file as the startpage for browsercalls. Please open in a webbrowser of your choice http://localhost/


