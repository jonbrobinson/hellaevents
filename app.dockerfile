FROM jrcodes/laravel62-php72:v0.1.0-rc.1

MAINTAINER Jonathan Robinson <jonrobinson.codes@gmail.com>

COPY . /var/www/hellaevents

WORKDIR /usr/local/etc/php

COPY ./vphp.ini php.ini

WORKDIR /var/www/hellaevents