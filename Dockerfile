FROM php:8.2-apache

# Instalar extensiones de PHP necesarias para MySQL
RUN docker-php-ext-install pdo pdo_mysql
