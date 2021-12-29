FROM php:apache

RUN  docker-php-ext-install  mysqli  \
     && pecl install xdebug \
            && docker-php-ext-enable xdebug \
     && echo "zend_extension=$(find $(php-config --extension-dir) -name xdebug.so)" \
              > /usr/local/etc/php/conf.d/xdebug.ini