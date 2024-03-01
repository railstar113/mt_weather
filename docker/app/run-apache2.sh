#!/usr/bin/env bash

sed -ri -e "s/Listen 80/Listen ${APP_PORT:-80}/g" /etc/apache2/ports.conf
rm /etc/apache2/mods-enabled/mpm_event.conf
rm /etc/apache2/mods-enabled/mpm_event.load
apache2-foreground "$@"
