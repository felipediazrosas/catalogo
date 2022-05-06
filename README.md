Pasos para desplegar aplicación
1. Descargar o clonar repositorio con el comando git clone git@github.com:felipediazrosas/catalogo.git
2. composer install
3. composer dump-autoload
4. npm i
5. npm run dev
6. copiar el archivo .env.example a .env
7. configurar base de datos en el archivo .env
8. ejecutar php artisan key:generate
9. php artisan migrate (o importar archivo catalogo.sql de la carpeta database)
10. php artisan db:seed
11. crear enlace para acceso a adjuntos php artisan link:storage
12. El usuario por defecto es admin@admin.com con contraseña admin
