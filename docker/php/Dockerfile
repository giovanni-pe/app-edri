FROM php:7.4-apache

# Configuraciones adicionales de PHP y Apache
# Copia tu aplicación PHP al contenedor
COPY ./app /var/www/html

# Instala extensiones y dependencias necesarias
RUN docker-php-ext-install mysqli pdo_mysql
