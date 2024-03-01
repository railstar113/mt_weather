#!/usr/bin/env bash

sed -ri -e "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf
sed -ri -e "182a\DocumentRoot ${APACHE_DOCUMENT_ROOT}" /etc/apache2/apache2.conf
rm /etc/apache2/mods-enabled/mpm_event.conf
rm /etc/apache2/mods-enabled/mpm_event.load
cd $WORKDIR
composer install --no-interaction --no-scripts
chmod -R 755 vendor/
apache2-foreground "$@"
