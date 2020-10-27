<h1>Taller de consecionaria</h1>

Recepcion y Gestion de Vehiculos, propositos academicos

<h3>Pasos de la Instalacion</h3>

1. Iniciar el proyecto laravel 7


    laravel new atelier --auth
    
    
2. Integrar Bootstrap con AdminLTE


    composer require jeroennoten/laravel-adminlte
    composer require laravel/ui —dev
    php artisan ui vue --auth
    php artisan adminlte:install
    php artisan adminlte:update


    php artisan ui bootstrap
    php artisan ui:controllers
    php artisan adminlte:install
    php artisan adminlte:install --only=main_views --force
    php artisan adminlte:install --only=auth_views --force 
    php artisan adminlte:install --only=basic_views --force
    php artisan adminlte:install --only=config


    npm install
    npm audit fix 
    npm run dev && npm run production
    
    
La guia mejor detallada en la URL https://github.com/jeroennoten/Laravel-AdminLTE/wiki/2.-Installation
    
    
3. Copiar el repositorio completo


    git clone https://github.com/cisars/atelier
    
    
4. Recrear la de base de datos. (Postgresql)


    php artisan db:seed
    
    
Para reinstalar la base de datos con los usuarios predeterminados se puede correr el comando bat


    fresh.bat
    
    
que ejecuta lo siguiente


    php artisan config:cache
    php artisan config:clear
    php artisan migrate:fresh
    php artisan db:seed
    
    
<h3>Usuarios de prueba</h3>

Usuario/Clave<br>
admin/admin<br>
empleado/empleado<br>
cliente/cliente<br>
bootstrap/bootstrap <i>(plantillas disponibles)</i>
