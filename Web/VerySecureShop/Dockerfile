FROM ubuntu:focal
LABEL Author="PHP_FILE_UPLOAD_CTF"


# Stop dpkg-reconfigure tzdata from prompting for input
ENV DEBIAN_FRONTEND=noninteractive

# Install php7-cli
RUN apt-get update
RUN apt-get install -y apt-utils
RUN apt-get -y update && apt-get install -y apache2 php
RUN apt-get -y install php-mbstring && apt-get -y install php-json && apt-get -y install php-xmlrpc && apt-get -y install php-mime-type && apt-get -y install php-xml && apt-get -y install php-dom 
RUN a2enmod php7.4
RUN a2enmod rewrite
COPY src/ /var/www/html/
RUN chmod -R 777 /var/www/html/contact/user_feedback
COPY src/settings/start.sh /usr/local/bin/start.sh
COPY src/settings/apache2.conf /etc/apache2/apache2.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
COPY src/settings/php.ini /etc/php/7.4/apache2/php.ini
COPY src/settings/php7.4.conf /etc/apache2/mods-enabled/php7.4.conf
COPY src/settings/ffllaagg123.txt /ffllaagg123.txt
RUN rm -rf /var/www/html/index.html
RUN rm -rf /var/www/html/settings
RUN chmod +x /usr/local/bin/start.sh
RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html
RUN service apache2 restart
CMD ["/usr/local/bin/start.sh"]

USER root
ENTRYPOINT ["/bin/bash","-c"]