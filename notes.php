<!-- MVC
Model : database
view: html. css, dan js
Controller: menghubungkan antara model dan view

artisan: sebuah perintah untuk emmbuat fitur2 yg ada di laravel
composer: install package yg ada di php

 php artisan make:controller LatihanController artinya membuat controller,
 harus menggunakan kata "Controller" untuk membedakan dengan
 "/" adalah default(bawaan) route
method get, post, put, delete
get : untuk melihat
post : untuk mengirim dari form
put : mengirim data dari form (update)
delete : mengirim data dari form (delete)

seeder: membuat data dummy di laravel
middleware pada laravel, digunakan saat setelah login sebelum masuk ke dashboard

//untuk menambah kolom lewat php artisan
php artisan make:migration add_total_price_to_orders --table=orders

-->