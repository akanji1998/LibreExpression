# Utilisation de l'image de base PHP 7.4 avec Apache
FROM php:8.2-apache

# Copie des fichiers de l'application dans le conteneur
COPY . /var/www/html/

# Configuration du serveur Apache
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

# Installation des dépendances PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Définition de la variable d'environnement pour PHP
ENV PHP_ENVIRONMENT production

# Exposition du port 80 pour le serveur Apache
EXPOSE 9000
