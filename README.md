Requisitos

Git
Composer
PHP 7.4
MySQL

Instalación

1. git clone https://github.com/albertopinilla/test.git
2. cd prueba
3. composer install
4. cp .env.example .env
5. php artisan key:generate
6. configurar base de datos en .env

    DB_CONNECTION=mysql
    DB_HOST=direccion_ip
    DB_PORT=3306
    DB_DATABASE=nombre_base_de_datos
    DB_USERNAME=usuario
    DB_PASSWORD=contraseña
    
7. php artisan config:cache
8. php artisan migrate
9. php artisan serve


Consultas solicitadas

Realizar una consulta que permita conocer cuál es el producto que más stock tiene.
SELECT nombre_de_producto, stock FROM productos GROUP BY nombre_de_producto, stock ORDER BY stock DESC LIMIT 1

Realizar una consulta que permita conocer cuál es el producto más vendido.
SELECT productos.nombre_de_producto, SUM(ventas.cantidad) as cantidad FROM ventas INNER JOIN productos ON ventas.producto_id = productos.id GROUP BY productos.nombre_de_producto ORDER BY cantidad DESC LIMIT 1
