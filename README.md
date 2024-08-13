Proyecto Laravel - Gestión de Notas y API

Descripción
Este proyecto consiste en una aplicación web desarrollada en Laravel que permite gestionar las notas de un colegio. Incluye un CRUD para administrar Notas, Cursos y Materias. La aplicación tiene la siguiente estructura:

Notas: Tabla para gestionar las notas de los estudiantes.
Cursos: Tabla para gestionar los cursos disponibles.
Materias: Tabla para gestionar las materias disponibles.
La tabla Notas tiene una relación de muchos a muchos con Cursos y Materias. Esto permite asignar múltiples cursos y materias a una nota y viceversa.

Además, el proyecto incluye un endpoint API que obtiene datos de RandomUser.me y calcula la letra más utilizada en los nombres completos de cinco personas.


Requisitos
Composer
MySQL

Instalación Local
1. Clonar el Repositorio
https://github.com/LauraAcostaV/EduNote.git

2. Instalar Dependencias de PHP
composer install

3. Configurar el Archivo de Entorno (.env)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=edunote
DB_USERNAME=root
DB_PASSWORD=

4. Ejecutar las Migraciones
php artisan migrate

5. Iniciar el Servidor de Desarrollo
php artisan serve

Endpoint API
El endpoint API se encuentra en http://127.0.0.1:8000/api/random-users. Este endpoint obtiene 5 personas de RandomUser.me y calcula la letra más utilizada en los nombres completos.
