#!/bin/bash

echo "***INSTALLING REQUIREMENTS***";
echo "";

echo "Installing git";
apt-get install -y git;

echo "Installing curl";
apt-get install -y curl;

echo "Installing apache2";
apt-get install -y apache2;

echo "Installing php7.0";
apt-get install -y php7.0;

echo "Installing libapache2-mod-php7.0";
apt-get install -y libapache2-mod-php7.0;

echo "Installing php7.0-intl";
apt-get install -y php7.0-intl;

echo "Installing php7.0-xml";
apt-get install -y php7.0-xml;

echo "Installing php7.0-mbstring";
apt-get install -y php7.0-mbstring;

echo "Installing mysql-server";
apt-get install -y mysql-server;

echo "Installing php7.0-mysql";
apt-get install -y php7.0-mysql;

echo "Enabling mod_rewrite";
a2enmod rewrite;

echo "Downloading BeWaterMelon source code"
cd /var/www;
git clone https://github.com/VirtualEvan/BeWaterMelon.git;
cd BeWaterMelon;
ls .;

echo "Downloading virtualhost tool"
git clone https://github.com/RoverWire/virtualhost.git;

echo "Adding execution permissions to virtualhost.sh";
chmod +x ./virtualhost/virtualhost.sh;

echo "Creating virtualhost"
./virtualhost/virtualhost.sh create bewatermelon.com /var/www/BeWaterMelon;

echo "Adding execution permissions to composer.phar";
chmod +x ./composer.phar;

echo "Installing composer"
./composer.phar install;

echo "Removing virtualhost tool"
rm -rf ./virtualhost/

echo "Loading database"
mysql -u root -p -e "source /var/www/BeWaterMelon/BeWaterMelon.sql"

echo "Changing img folders's owner"
chown -R www-data:www-data /var/www/BeWaterMelon/webroot/img/*;

echo "Editing config/app.php"
sed -i "s/'username' => 'my_app'/'username' => 'bwm'/g" /var/www/BeWaterMelon/config/app.php
sed -i "s/'password' => 'secret'/'password' => 'bwm'/g" /var/www/BeWaterMelon/config/app.php
sed -i "s/'database' => 'my_app'/'database' => 'BeWaterMelon'/g" /var/www/BeWaterMelon/config/app.php

echo "Launching BeWaterMelon in";
sleep 1;
echo "3";
sleep 1;
echo "2";
sleep 1;
echo "1";
sleep 1;

echo "tds";
xdg-open http://bewatermelon.com


