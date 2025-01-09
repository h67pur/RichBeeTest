FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    iproute2 \
    zlib1g-dev \
    libzip-dev \
    libxml2-dev \
    libxslt-dev \
    postgresql-client \
    && docker-php-ext-install exif pdo pdo_pgsql pdo_mysql zip xmlwriter

RUN a2enmod rewrite ssl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www/html

COPY ./ /var/www/html

EXPOSE 80 443

CMD ["apache2-foreground"]
