FROM php:7.3-apache

# Install Packages
RUN apt-get update && apt-get install -y libldap2-dev npm libmcrypt-dev git zip unzip libpng-dev libzip-dev libxml2-dev libmemcached-dev unixodbc-dev libonig-dev\
    && docker-php-ext-install pdo_mysql  && docker-php-ext-install gd && docker-php-ext-install mysqli && docker-php-ext-enable mysqli \
    && docker-php-ext-install mbstring && docker-php-ext-install bcmath && docker-php-ext-install zip
# Install Packages XDEBUG
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=VSCODE" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_host=host.docker.internal"  >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_enable=On"  >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_autostart=On"  >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini 
# Download Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
# Install Composer
RUN php composer-setup.php --install-dir=/bin --filename=composer \
  php -r "unlink('composer-setup.php');"
# Run Services
RUN a2enmod rewrite
RUN service apache2 restart
# Directory Work
WORKDIR /var/www/html
# Expose Port
EXPOSE 80
EXPOSE 443
