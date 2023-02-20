ARG PHP_BASE_IMAGE
FROM ${PHP_BASE_IMAGE}

# using the right user
USER root

# copy the code into the container
COPY ./ /var/www/html/

# setting the default directory
WORKDIR /var/www/html

# fixing permissions
RUN mv storage /tmp && ln -s /tmp/storage && chmod -R 777 /tmp/storage

# prepearing app for execution
RUN php artisan package:discover

# cleaning
RUN rm -rf /var/cache/apk/*
