
# Web Service - RESTful API - laravel

------------------------------------------------------------------------------------------------
### Model laravel
#### Migration-laravel

##### https://www.malasngoding.com/migration-laravel/
##### https://laravel-guide.readthedocs.io/en/latest/migrations/
+
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan make:migration create_userFileKepemilikan_table
+
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan migrate
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan migrate:refresh
###### { Ketika Melakukan migrate:refresh - data didalamnya hilang }
+


------------------------------------------------------------------------------------------------
### laravel-passport SetUp

##### https://ilmucoding.com/laravel-api-otentikasi-passport/ 
##### https://www.depotkode.com/laravel-passport/ 
+
###### saghri@studio:~/github$ composer create-project laravel/laravel laravel-FileKepemilikan
###### saghri@studio:~/github$ cd laravel-FileKepemilikan
###### saghri@studio:~/github/laravel-FileKepemilikan$ composer require laravel/passport
+
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan migrate
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan passport::install
+
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan make:controller Api/UserController
+
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan serve
+
+
###### http://127.0.0.1:8000/api/auth/login
###### http://127.0.0.1:8000/api/auth/login?email=adminEmpat@mail.com&password=adminEmpat
+
###### http://127.0.0.1:8000/api/auth/register
###### http://127.0.0.1:8000/api/auth/register?name=iniAdminEmpat&email=adminEmpat@mail.com&password=adminEmpat
+
+
###### .-.-.-.-..-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-..-.-.-.-..-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.
##### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan migrate:refresh
###### /* mengulangi migrate keseluruhan  --  mereset termasuk passportnya [2] */
##### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan passport:client --personal
###### /* membuat client passportnya kembali */
##### + [ENTER]
###### .-.-.-.-..-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-..-.-.-.-..-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.
##### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan serve
###### /* menyalakan Server */
###### .-.-.-.-..-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-..-.-.-.-..-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.
+
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan passport:install
###### + [ENTER]
+
###### .-.-.-.-..-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-..-.-.-.-..-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.-.


###### antara garis
------------------------------------------------------------------------------------------------

### CRUD Sederhana laravel-FileKepemilikan
#### Resource Controller Laravel 

##### https://www.laravel.web.id/2017/10/17/memanfaatkan-fitur-controller-resource-laravel/
##### Table RESTful Resource Controller :

<!-- | :--: |    :--:    | :---------------------: | :------: | :----------------: | -->
|  No  |    VERB    |              PATH             |    ACTION    |     ROUTE NAME     |                  REQUEST NAME                |            TYPE ACTION            |
| :--: |    :--:    |     ----------------------    |   :------:   | ------------------ |               ------------------             |              :------:             |
|  1   | `POST`     | /api/auth/register            |    register  | siswa.index        | [register] /api/auth/register                |                                   |
|  2   | `POST`     | /api/auth/login               |    login     | siswa.create       | [login] /api/auth/login                      |                                   |
|  3   | `POST`     | /api/auth/file-crud           |    store     | siswa.store        | [store] /api/auth/file-crud                  |                                   |
|  1   | `GET`      | /api/auth/file-crud           |    index     | siswa.index        | [index][-R-] /api/auth/file-crud             |         [ -R- Data Awal]          |
|  2   | `GET`      | /api/auth/file-crud/create    |    create    | siswa.create       | [create][-R-] /api/auth/file-crud/create     | [ -R-After store/update by table] |
|  4   | `GET`      | /api/auth/file-crud/{id}      |    show      | siswa.show         | [show][-R-id-] /api/auth/file-crud/{id}      |       [ -R-id- specifict ]        |
|  5   | `GET`      | /api/auth/file-crud/{id}/edit |    edit      | siswa.edit         | [edit][-R-id-] /api/auth/file-crud/{id}/edit |      [ -R-id-Before update ]      |
|  7   | `DELETE`   | /api/auth/file-crud/{id}      |    destroy   | siswa.destroy      | [delete] /api/auth/file-crud/{id}            |                                   |
|  6   | `PUT`      | /api/auth/file-crud/{id}      |    update    | siswa.update       | [PUT-update] /api/auth/file-crud/{id}        |                                   |
|  6   | `PATCH`    | /api/auth/file-crud/{id}      |    update    | siswa.update       | [PATCH-update] /api/auth/file-crud/{id}      |                                   |


<!-- |------|------------|-------------------------|----------|--------------------| -->
###### siswaku/routes/web.php   ---   nanti coba diuji pakai api.php
###### Route::resource('siswa','SiswaController');
###### ------------------------------------------------------------------------------------------------------------------------
###### Sumber : Buku Laravel 5 AWAN PRIBADI BASUKI
###### -+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+

#### https://www.phpcodingstuff.com/blog/laravel-8-rest-api-crud-with-passport-auth-tutorial.html
#### Step 6
##### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan make:model userFileKepemilikan -m
###### /* membuat model dan membuat migrasinya , tapi belum ke eksecute ke database */
##### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan make:controller userFileKepemilikanController --resource
###### /* membuat controller dengan resource CRUD bawaan laravel */
##### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan migrate
###### /* melakukan migrate bagi file yg belum di migrate [3]*/
##### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan migrate:rollback
###### /*mengupdate kembali migrate, ketika manual hapus migration, jangan lupa hapus di nama migraration di phpmyadmin [1]*/

------------------------------------------------------------------------------------------------
##### https://www.itsolutionstuff.com/post/laravel-8-file-upload-example-tutorialexample.html
##### https://www.nicesnippets.com/blog/laravel-8-file-upload-example
##### https://www.phpcodingstuff.com/blog/laravel-8-rest-api-crud-with-passport-auth-tutorial.html
##### --
##### https://www.malasngoding.com/membuat-upload-file-laravel/
##### https://stackoverflow.com/questions/40033879/handling-file-upload-in-laravels-controller/40033934
##### --
##### https://stackoverflow.com/questions/39037049/how-to-upload-a-file-and-json-data-in-postman
###### https://stackoverflow.com/questions/60558645/laravel-validation-based-on-a-variable
##### --
##### https://kursuswebprogramming.com/cara-menampilkan-semua-data-dengan-menggunakan-restful-api-pada-laravel/
###### saghri@studio:~/github/laravel-FileKepemilikan$ php artisan make:resource userFileKepemilikan




<!--
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Web Service - RESTful API - laravel


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

-->

