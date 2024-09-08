<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
Judul Project : Sistem E - Ticket Pengaduan<br/> 
Bisnis Proses : Aplikasi Pengaduan dapat melakukan proses data pengaduan yang akan di input.<br/>
Detail : Sistem E Ticket Pengaduan berguna bagi instansi Kelurahan / Pemerintahan Setempat untuk memudahkan  warga melakukan proses pengaduan.
Alur Kerja : Pengguna -> Masuk Website -> Pengguna klik navbar pengaduan -> melakukan input pengaduan -> pengaduan diterima
              Admin -> Pengaduan diterima ->

Proses Sitem berjalan Memiliki Actor Hak Akses user Admin dan User Pengguna.
</p>

<h1>FILE .evn.example hapus .examplenya, jadi .env aja</h1>
<h2>NOTE: nama dbnya etiket_pengaduan, pakai mysql jangan sqlite</h2>

<h2>INPUT COMMAND INI PAS BARU CLONE GIT:</h2>

```
        - composer install
```
```
        - php artisan key:generate
```
```
        - php artisan install:api
```
```
        - php artisan migrate --seed || php artisan migrate:fresh --seed (kalo yang kiri gabisa)
```
```
        - npm run || npm start
        - npm run dev ==> jangan di exit selama masih make
```
```
        - php artisan serve ==> Nanti buka link yang dikasih pas running ini, jangan di exit selama masih mak
```

## API TEST
- http://127.0.0.1:8000/api/tambah_tiket => buat nambah tiket pengaduan baru
- http://127.0.0.1:8000/api/update_tanggapan/{id} => ngubah tanggapan (buat admin)
- http://127.0.0.1:8000/api/cari_tiket => nyari data pake nomor tiket
- http://127.0.0.1:8000/api/cari_user => nyari user pake nik
- http://127.0.0.1:8000/api/semua_data => ambil semua data tiket, buat pagination?
- http://127.0.0.1:8000/api/ambil_data/{id} => ambil data tanggapan, buat ngedit

sisanya OTW (mungkin)
