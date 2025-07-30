FROM php:8.1-apache

# Copiar archivos al servidor
COPY . /var/www/html/

# Permitir usar la variable de puerto (como 8080 en Railway)
ENV PORT=8080

# Ejecutar PHP embebido en el puerto que proporciona la plataforma
CMD ["sh", "-c", "php -S 0.0.0.0:$PORT -t /var/www/html"]

EXPOSE 8080