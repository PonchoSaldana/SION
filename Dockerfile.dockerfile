FROM php:8.1-cli

WORKDIR /var/www/html

COPY . /var/www/html

ENV PORT=8080
EXPOSE 8080

CMD ["sh", "-c", "php -S 0.0.0.0:$PORT"]