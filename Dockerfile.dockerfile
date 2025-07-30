FROM php:8.1-apache

# Copia los archivos a la carpeta por defecto de Apache
COPY . /var/www/html/

# Habilita extensiones necesarias si usas bases de datos
RUN docker-php-ext-install mysqli

# (Opcional) Si usas .htaccess o URLs amigables
RUN a2enmod rewrite