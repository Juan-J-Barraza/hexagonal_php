FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN a2enmod rewrite

WORKDIR /var/www/html/

COPY . /var/www/html/

# DocumentRoot apuntando al entry point de tu arquitectura
RUN sed -i \
    's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/crud-users/Infraestructure/Entrypoints/Web|g' \
    /etc/apache2/sites-available/000-default.conf

# AllowOverride para que .htaccess funcione (rutas, front controller)
RUN echo '<Directory /var/www/html/crud-users/Infraestructure/Entrypoints/Web>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80