FROM php:7.4-fpm

RUN apt-get update \
    && apt-get install -y curl wget git zip unzip libxml2-dev libxml2 libssl-dev gnupg gnupg2 gzip libzip-dev vim nano libpq-dev \
    locales libjxr-tools libjxr-dev libopenjp2-7 libopenjp2-tools libopenjp2-7-dev webp \
    libwebp-dev libjpeg-dev libtiff-dev libpng-dev libxpm-dev libfreetype6-dev zlib1g-dev libicu-dev g++ \
    jpegoptim optipng imagemagick pngquant \
    && apt-get install -y --no-install-recommends \
        unixodbc-dev apt-transport-https \
    && echo "Europe/Moscow" > /etc/timezone \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
    && echo "ru_RU.UTF-8 UTF-8" >> /etc/locale.gen \
    && locale-gen \
    && echo "export LANG=ru_RU.utf8" >> /etc/bash.bashrc \
    && echo "export LANGUAGE=ru_RU.utf8" >> /etc/bash.bashrc \
    && echo "export LC_ALL=ru_RU.utf8" >> /etc/bash.bashrc

RUN docker-php-ext-configure intl \
    && docker-php-ext-install tokenizer fileinfo xml json pdo pdo_mysql bcmath ctype zip intl

RUN groupadd --gid 1001 dock \
  && useradd --uid 1001 --gid dock --shell /bin/bash --create-home dock

# https://getcomposer.org/download/
RUN cd /tmp \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer \
    && su - dock -c "composer global require laravel/installer" \
    && echo 'export PATH="$PATH:$HOME/.composer/vendor/bin:/opt/mssql-tools/bin"' > /home/dock/.bashrc

WORKDIR /var/www/web
