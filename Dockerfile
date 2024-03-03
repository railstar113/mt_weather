FROM php:8.1-apache

ENV WORKDIR /var/www/html
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
ENV WWWGROUP 1000

WORKDIR $WORKDIR

COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./src .

RUN groupadd --force -g $WWWGROUP sail
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

RUN apt-get update && apt-get install -y \
    git zip unzip libpng-dev libpq-dev cron vim less \
    && docker-php-ext-install pdo_mysql

COPY --from=composer:2.2.23 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN a2enmod rewrite
RUN sed -ri -e "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/*.conf
RUN sed -ri -e "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# HerokuのApache2エラー対応
COPY ./docker/app/run-apache2.sh /usr/local/bin/
RUN chmod 755 /usr/local/bin/run-apache2.sh
CMD [ "run-apache2.sh" ]
