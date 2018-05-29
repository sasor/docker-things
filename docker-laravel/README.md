### Docker-con-Laravel

Estos ficheros sirven para trabajar con laravel(5.6.*) en su version
basica, algunos links de referencia estan en el fichero guides_troubles.
Para instalar laravel tienes la opcion de ingresar al container de php
e instalar laravel con el comando comoser que estara disponible,para no 
ejecutar la instalacion como usuario root utilizar el comando id.
Ver sgte ejemplo.

    docker exec -it --user $(id -u):$(id -g) container_php sh

Luego puedes ejecutar el comando de composer.
