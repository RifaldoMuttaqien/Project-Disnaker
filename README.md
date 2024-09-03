<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1>FILE .evn.example hapus .examplenya, jadi .env aja</h1>
<h1>NOTE: nama dbnya etiket_pengaduan, pakai mysql jangan sqlite</h1>

<h2>INPUT COMMAND INI PAS BARU CLONE GIT:</h2>

<ul>
    <li>```
        composer install
    ```</li>
    <li>```
        php artisan key:generate
    ```</li>
    <li>```
        php artisan install:api
    ```</li>
    <li>```
        php artisan migrate || php artisan migrate:fresh (kalo yang kiri gabisa)
    ```</li>
    <li>```
        npm run dev ==> jangan di exit selama masih make
    ```</li>
    <li>```
        php artisan serve ==> Nanti buka link yang dikasih pas running ini, jangan di exit selama masih make
    ```</li>
</ul>

## API TEST
http://127.0.0.1:8000/api/pengadu => /Pengadu

http://127.0.0.1:8000/api/tiket => /Tiket Pengaduan


