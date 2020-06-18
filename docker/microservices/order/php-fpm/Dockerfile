FROM php:7.4-fpm
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
RUN set -xe \
    && apt-get update \
    && apt-get upgrade -y \
    && apt-get -y install git g++ libzip-dev libjpeg62-turbo-dev libpng-dev libfreetype6-dev libcurl4-gnutls-dev libicu-dev libmcrypt-dev libpq-dev libxml2-dev unzip zlib1g-dev \
    && docker-php-ext-install curl intl zip exif pcntl pdo pdo_mysql xml \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get -y autoremove \
    && apt-get -y clean \
    && rm -rf /var/lib/apt/lists/*

RUN pecl install mcrypt-1.0.3 && docker-php-ext-enable mcrypt
RUN pecl install redis-5.1.1 \
    && pecl install xdebug-2.8.1 \
    && docker-php-ext-enable redis xdebug \
    && rm -rf /tmp/pear \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9000\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.profiler_enable=on\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.profiler_output_dir=/var/www/html/tmp\n" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.profiler_enable_trigger=on\n" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN echo 'date.timezone="Europe/Madrid"' >>  /usr/local/etc/php/conf.d/date.ini
RUN echo 'session.save_path = "/tmp"' >>  /usr/local/etc/php/conf.d/session.ini

COPY config/custom-php-ini.ini "$PHP_INI_DIR/conf.d/"
RUN curl -sS https://getcomposer.org/installer \
| php -- --install-dir=/usr/bin/ --filename=composer

RUN composer global require phpmv/ubiquity-devtools
RUN echo export PATH="$HOME/.composer/vendor/bin:$PATH" >> ~/.bashrc

CMD [ "php-fpm", \
        "--nodaemonize"]