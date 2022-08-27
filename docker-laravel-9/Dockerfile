FROM php:8.1.6

ARG USER=your-user
ARG ID=1000

RUN apt-get update \
 && apt-get install -y apt-utils locales libpq-dev libxml2-dev zlib1g-dev libpng-dev libzip4 libzip-dev unzip --no-install-recommends \
 && docker-php-ext-install pdo_pgsql pgsql gd zip \
 && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php --install-dir=/usr/bin --filename=composer \
 && php -r "unlink('composer-setup.php');"

RUN groupadd --gid ${ID} ${USER}
RUN useradd --uid ${ID} --gid ${ID} --create-home --shell "/bin/bash" ${USER}
WORKDIR $HOME
USER $USER
EXPOSE 8000
# CMD php artisan serve --host=0.0.0.0 --port=8000
# ENTRYPOINT ["tail", "-f", "/dev/null"]

# https://devopscube.com/keep-docker-container-running/
# https://kossy0701.medium.com/what-is-tty-true-in-docker-compose-yml-47a72891aee2
# https://dev.to/kakisoft/docker-when-tty-true-is-necessary-in-docker-composeyml-568l
# https://adamtheautomator.com/docker-compose-environment-variables/

# Enlaces sobre los permisos
# https://stackoverflow.com/questions/44716612/docker-php-permissions
# https://stackoverflow.com/questions/54028878/permission-for-volumes-in-docker-compose

# Group add
# https://superuser.com/questions/1038208/useradd-user-with-group-with-same-uid-and-gid
# https://stackoverflow.com/questions/23601844/how-to-create-user-in-linux-by-providing-uid-and-gid-options
# https://www.redhat.com/sysadmin/user-account-gid-uid
# https://www.thegeekdiary.com/how-to-correctly-change-the-uid-and-gid-of-a-user-group-in-linux/
