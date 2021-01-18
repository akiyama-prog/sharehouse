# どんなdockerイメージを利用して構築をするか
FROM php:7.4-apache

RUN apt-get update
#ドキュメントルートの修正
ENV APACHE_DOCUMENT_ROOT /var/www/html/sharehouse/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# php.iniを独自で設定するときだけ
COPY ./docker/php/php.ini /etc

RUN apt-get install -y --no-install-recommends \
    libzip-dev \
    libonig-dev \
    # for gd
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    # for ImageMagick
    libmagickwand-dev \
    # for intl
    libicu-dev \
    # from zip
    zlib1g-dev && \
    pecl install imagick && \
    docker-php-ext-enable imagick && \
    docker-php-ext-install bcmath calendar exif gettext intl mbstring mysqli pdo pdo_mysql zip && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd && \
    rm -rf /var/lib/apt/lists/* && \
    apt-get clean && \
    # enable mod_rewrite
    a2enmod rewrite && \
    # install composer
    cd '/' && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"&&  \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN composer global require "laravel/installer"
