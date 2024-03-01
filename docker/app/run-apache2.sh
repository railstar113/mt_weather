#!/usr/bin/env bash

rm /etc/apache2/mods-enabled/mpm_event.conf
rm /etc/apache2/mods-enabled/mpm_event.load
apache2-foreground "$@"
