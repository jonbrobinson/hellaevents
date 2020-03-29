FROM jrcodes/lara72_no_xdebug

MAINTAINER Jonathan Robinson <jonrobinson.codes@gmail.com>

COPY . /var/www/hellaevents

WORKDIR /usr/local/etc/php

COPY ./vphp.ini php.ini

WORKDIR /var/www/hellaevents
