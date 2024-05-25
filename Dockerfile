# Utiliser l'image PHP officielle
FROM php:8.2-apache

# Copier le contenu de votre projet dans le dossier du serveur web
COPY . /var/www/html/

# Installer les extensions PHP nécessaires (exemple pour MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activer le module de réécriture d'URL d'Apache
RUN a2enmod rewrite
