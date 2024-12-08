FROM drupal:10-php8.3

RUN apt-get update -y && apt-get install vim -y
RUN ln -s /opt/drupal/vendor/bin/drush /usr/bin/drush
COPY ./settings.local.php /opt/drupal/web/sites/default
COPY ./settings.php /opt/drupal/web/sites/default
COPY ./composer.json ./composer.lock /opt/drupal/
RUN composer install

# CMD ["/usr/bin/drush", "config:import", "-y"]
