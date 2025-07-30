# Imagen base con PHP y Apache
FROM php:8.1-apache

# Copiar todos los archivos al servidor Apache
COPY . /var/www/html/

# Exponer el puerto 80 para acceso web
EXPOSE 80