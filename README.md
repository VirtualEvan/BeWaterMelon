# BeWaterMelon

[![Build Status](https://img.shields.io/travis/cakephp/app/master.svg?style=flat-square)](https://travis-ci.org/cakephp/app)
[![License](https://img.shields.io/packagist/l/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)

## Requirements

1. HTTP Server
2. PHP 5.6.0 or greater
3. mbstring PHP extension
4. intl PHP extension
5. simplexml PHP extension

## Recomended installation

### Manual (Debian-like distros)
1. Install the required packages `sudo apt-get install apache2 php7.0 libapache2-mod-php7.0 php7.0-intl php7.0-xml php7.0-mbstring mysql-server`
2. Enable mod_rewrite `sudo server a2enmod rewrite`
3. Clone the repository inside the web server folder `git clone https://github.com/VirtualEvan/BeWaterMelon.git /var/www/html`
4. Get ownership of the folder `sudo chown -R <your-user>:<your-user> /var/www/html/BeWaterMelon`
3. Run `php composer.phar install`.

### Installation sctript
1- Execute with privileges
2- Introduce GitHub credentials
3- Set composer permissions (y)
4- Introduce MySQL password for root user
```sh
$ sh -/install.sh
```

## Configuration

Read and edit `config/app.php` and setup the `'Datasources'` and any other
configuration relevant for your application.
