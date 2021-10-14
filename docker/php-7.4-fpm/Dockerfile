FROM php:7.4-fpm

LABEL MAINTAINER="<dionisvl3@gmail.com>"
LABEL RELEASEDATE="20211014"

# Setup some env
ENV \
	# Setup same composer home directory for all users
	COMPOSER_HOME="/usr/local/composer" \
	PHP_VERSION=php7.4

ARG XDEBUG_VERSION=3.1.0
ARG PHP_EXTENSIONS="ffi"

# Install dependencies
RUN \
    apt-get update && apt-get install -y \
    libffi-dev \
    locales \
    && docker-php-ext-install $PHP_EXTENSIONS

# pm.max_children = 25
ADD ./www.conf /usr/local/etc/php-fpm.d/www.conf

# tweak custom php-fpm config
ADD ./myPhp.ini /usr/local/etc/php/conf.d/05-php.ini

RUN \
    #
    # Xdebug
    pecl install xdebug-${XDEBUG_VERSION} \
    && docker-php-ext-enable xdebug
    #

#RUN wget https://getcomposer.org/installer -O - -q \
 #   | php -- --install-dir=/bin --filename=composer --quiet

# Configure XDebug.
COPY xdebug.ini /usr/local/etc/php/conf.d/20-xdebug.ini

WORKDIR /var/www


# Locale
RUN sed -i -e \
  's/# ru_RU.UTF-8 UTF-8/ru_RU.UTF-8 UTF-8/' /etc/locale.gen \
   && locale-gen

ENV LANG ru_RU.UTF-8
ENV LANGUAGE ru_RU:ru
ENV LC_LANG ru_RU.UTF-8
ENV LC_ALL ru_RU.UTF-8

# +Timezone (если надо на этапе сборки)
ENV TZ Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone