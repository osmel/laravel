FROM php:7.2-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/html/estrategastest/

# Establecer area de trabajo
WORKDIR /var/www/html/estrategastest/

# Instalar dependencias adicionales
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Limpiar y eliminar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-install gd

# Instalar PHP composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www-datos
RUN useradd -u 1000 -ms /bin/bash -g www-datos www-datos

# Copie el contenido del directorio de aplicaciones existente
COPY . /var/www/html/estrategastest/

# Copiar los permisos del directorio de aplicaciones existentes
COPY --chown=www-datos:www-datos . /var/www/html/estrategastest/

# Cambiar usuario actual a www-datos
USER www-datos

# Exponga el puerto 9000 e inicie el servidor php-fpm
EXPOSE 9000
CMD ["php-fpm"]

