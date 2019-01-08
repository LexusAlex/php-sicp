FROM phpearth/php:7.3-apache

RUN apk update && apk add --no-cache \
        bash \
        git \
        vim \
        #php7.3-mcrypt \
        #php7.3-mysqli \
        #php7.3-pdo \
        #php7.3-pdo_mysql \
        #php7.3-pdo_pgsql \
        php7.3-xdebug \
		composer


WORKDIR /var/www/localhost/htdocs
CMD ["/usr/sbin/httpd", "-DFOREGROUND"]
