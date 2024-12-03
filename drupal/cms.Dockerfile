FROM drupal:10-php8.3

RUN apt-get update -y && apt-get install vim
RUN composer require "drush/drush" "drupal/admin_toolbar:^3.4" 'drupal/views_field_view:^1.0@beta' 'drupal/pathauto:^1.13' 'drupal/drupal8_zymphonies_theme:^3.0'
RUN ln -s /opt/drupal/vendor/bin/drush /usr/bin/drush
COPY ./settings.local.php /opt/drupal/web/sites/default
COPY ./settings.php /opt/drupal/web/sites/default

# CMD ["/usr/bin/drush", "config:import", "-y"]
