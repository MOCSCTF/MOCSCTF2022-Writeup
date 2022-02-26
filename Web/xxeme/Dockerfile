FROM ctftraining/base_image_nginx_mysql_php_73

COPY src /tmp/
RUN cp -rf /tmp/index.php /var/www/html \
    && cp -f /tmp/flag.sh /flag.sh \
    && chown -R www-data:www-data /var/www/html \
    && chmod 777 /flag.sh
