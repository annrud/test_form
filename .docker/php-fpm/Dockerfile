FROM php:8.3-fpm-alpine

RUN set -ex \
    && docker-php-ext-install mysqli  \
    && docker-php-ext-enable mysqli

WORKDIR /var/www/app

EXPOSE 9000

CMD ["php-fpm"]
