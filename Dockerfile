FROM php:8.1-fpm-buster

ARG DEBIAN_FRONTEND=noninteractive

RUN apt update &&\
    apt install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql pgsql

WORKDIR /app