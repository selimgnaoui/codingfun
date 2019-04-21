FROM php:7.2.2-apache

#RUN pecl install mongodb \
    #&& docker-php-ext-enable mongodb

# install git
RUN apt-get update && apt-get install git git-core -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN apt-get install curl
RUN apt-get update  && apt-get install -y zlib1g-dev \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php \
        && mv composer.phar /usr/local/bin/ \
        && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev
RUN echo "deb http://repo.mongodb.org/apt/debian jessie/mongodb-org/3.4 main" | tee /etc/apt/sources.list.d/mongodb-org-3.4.list
RUN apt-get update
RUN apt-get install -y mongodb

#   **WARNING (Windows & OS X):*** from https://hub.docker.com/_/mongo/
#
#   The default Docker setup on Windows and OS X uses a VirtualBox VM to host the Docker daemon.
#   Unfortunately, the mechanism VirtualBox uses to share folders between the host system and the Docker container is not compatible with the memory mapped files used by MongoDB
#   (see vbox bug, docs.mongodb.org and related jira.mongodb.org bug).
#   This means that it is not possible to run a MongoDB container with the data directory mapped to the host.
#
#   The Docker documentation is a good starting point for understanding the different storage options and variations,
#   and there are multiple blogs and forum postings that discuss and give advice in this area.
#   We will simply show the basic procedure here for the latter option above:
#   Create a data directory on a suitable volume on your host system, e.g. /my/own/datadir.
#   Start your mongo container like this:
#
#   $  docker run --name some-mongo -v /my/own/datadir:/data/db -d mongo:tag
#   The -v /my/own/datadir:/data/db part of the command mounts the /my/own/datadir directory from the underlying host system as /data/db inside the container,
#   where MongoDB by default will write its data files.

RUN mkdir -p /data/db /data/configdb \
	&& chown -R mongodb:mongodb /data/db /data/configdb
VOLUME /data/db /data/configdb


###############
# Nano
###############

# We want to have a simple editor by default
RUN apt-get install nano


###############
#  Apache
###############

# Enable apache mods.
RUN a2enmod rewrite

################
#   PHP
################


#  NOTES https://hub.docker.com/_/php/
#
#  PHP Core Extensions :
#
#  For iconv, mcrypt and gd extensions, you can inherit the base image that you like, and write your own Dockerfile like this:
#
#   RUN apt-get update && apt-get install -y \
#           libfreetype6-dev \
#           libjpeg62-turbo-dev \
#           libmcrypt-dev \
#           libpng12-dev \
#      && docker-php-ext-install -j$(nproc) iconv mcrypt \
#      && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#      && docker-php-ext-install -j$(nproc) gd
#
#
#  PECL : (compiling extension)
#
#
# To install a PECL extension, use "pecl install" to download and compile it,
# then use "docker-php-ext-enable" to enable it
#
# e.g : memcached
#
#   RUN apt-get update && apt-get install -y libmemcached-dev \
#       && pecl install memcached \
#       && docker-php-ext-enable memcached


# mcrypt
RUN apt-get install -y libmcrypt-dev
RUN apt-get update -y && \
    apt-get install -y libmcrypt-dev && \
    pecl install mcrypt-1.0.1 && \
    docker-php-ext-enable mcrypt

# iconv
RUN docker-php-ext-install -j$(nproc) iconv

# semaphore
RUN docker-php-ext-install -j$(nproc) sysvsem


ADD 000-default.conf /etc/apache2/sites-available/
# mongo

RUN apt-get install -y  libsasl2-dev\
                        libssl-dev

RUN pecl install mongodb &&\
    echo "extension=mongo.so" > /usr/local/etc/php/conf.d/mongo.ini  && docker-php-ext-enable mongodb
