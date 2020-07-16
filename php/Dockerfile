FROM php:7.4.7-fpm

# 官方版本默认安装扩展:
# Core, ctype, curl
# date, dom
# fileinfo, filter, ftp
# hash
# iconv
# json
# libxml
# mbstring, mysqlnd
# openssl
# pcre, PDO, pdo_sqlite, Phar, posix
# readline, Reflection, session, SimpleXML, sodium, SPL, sqlite3, standard
# tokenizer
# xml, xmlreader, xmlwriter
# zlib

# 更新为国内镜像
RUN mv /etc/apt/sources.list /etc/apt/sources.list.bak \
    && echo 'deb http://mirrors.163.com/debian/ stretch main non-free contrib' > /etc/apt/sources.list \
    && echo 'deb http://mirrors.163.com/debian/ stretch-updates main non-free contrib' >> /etc/apt/sources.list \
    && echo 'deb http://mirrors.163.com/debian-security/ stretch/updates main non-free contrib' >> /etc/apt/sources.list \
    && apt-get update

# bcmath, calendar, exif, gettext, sockets, dba,

# mysqli, pcntl, pdo_mysql, shmop, sysvmsg, sysvsem, sysvshm 扩展

RUN docker-php-ext-install -j$(nproc) bcmath calendar exif gettext sockets dba mysqli pcntl pdo_mysql shmop sysvmsg sysvsem sysvshm iconv

# GD 扩展
# RUN apt-get install -y --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
# && rm -r /var/lib/apt/lists/* \
#     && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#     && docker-php-ext-install -j$(nproc) gd

# RUN apt-get update && apt-get install -y \
#         libfreetype6-dev \
#         libjpeg62-turbo-dev \
#         libpng-dev \
#     && docker-php-ext-configure gd --with-freetype --with-jpeg \
#     && docker-php-ext-install -j$(nproc) gd

# imagick 扩展
# RUN export CFLAGS="$PHP_CFLAGS" CPPFLAGS="$PHP_CPPFLAGS" LDFLAGS="$PHP_LDFLAGS" \
#     && apt-get install -y --no-install-recommends libmagickwand-dev \
# && rm -r /var/lib/apt/lists/* \
#     && pecl install imagick-3.4.4 \
#     && docker-php-ext-enable imagick

# mcrypt 扩展
# RUN apt-get install -y --no-install-recommends libmcrypt-dev \
# && rm -r /var/lib/apt/lists/* \
#     && pecl install mcrypt-1.0.2 \
#     && docker-php-ext-enable mcrypt

# Memcached 扩展
# RUN apt-get install -y --no-install-recommends libmemcached-dev zlib1g-dev \
# && rm -r /var/lib/apt/lists/* \
#     && pecl install memcached-3.1.3 \
#     && docker-php-ext-enable memcached

# redis 扩展
RUN pecl install redis-5.1.1 && docker-php-ext-enable redis

# opcache 扩展
RUN docker-php-ext-configure opcache --enable-opcache && docker-php-ext-install opcache

# xdebug 扩展
RUN pecl install xdebug-2.8.1 && docker-php-ext-enable xdebug

# swoole 扩展
#RUN pecl install swoole-4.4.0 && docker-php-ext-enable swoole

# phpunit 安装
RUN curl -O https://phar.phpunit.de/phpunit-9.2.5.phar \
    && chmod +x phpunit-9.2.5.phar \
    && mv phpunit-9.2.5.phar /usr/local/bin/phpunit
    

#放到最后面，不然配置中的zend_extension = /usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so
#会找不到文件，因为还没安装，所以这段命令要放在xdebug安装完成之后。
COPY ./config /usr/local/etc/php

# 镜像信息
LABEL Author="kaola"
LABEL Version="1.0.0"
LABEL Description="PHP 7.4.7 开发环境镜像."