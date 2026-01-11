FROM php:8.2-apache

# Installation des dépendances système
RUN apt-get update && apt-get install -y libssl-dev pkg-config

# Installation de l'extension MongoDB pour PHP
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Activation du module de réécriture Apache
RUN a2enmod rewrite

# On donne les droits au serveur web
RUN chown -R www-data:www-data /var/www/html