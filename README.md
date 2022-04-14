<div id="top"></div>

# Indonesia Peduli 
<p>
Indonesia Peduli is a website that was built specifically to raise aid funds / donations online.
Built with laravel 7.x and integrated with online payments.
</p>

## Installation 
To run the application on your computer, please follow the following command : 

1. Clone the repo
   ```sh
   $ git clone https://github.com/qkohst/indonesia_peduli.git
   ```
2. Change directory in project which already clone
   ```sh
   $ cd indonesia_peduli
   ```
3. Install Composer packages
   ```sh
   $ composer install
   ```
4. Create database on your computer
5. Create a copy of your .env file 
   ```sh
   $ cp .env.example .env
   ```
6. In the .env file, add database information to allow Laravel to connect to the database
   ```sh
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE={database-name}
   DB_USERNAME={username-database}
   DB_PASSWORD={password-database}
   ```
7. Generate an app encryption key
   ```sh
   $ php artisan key:generate
   ```
8. Import ``indonesia_peduli.sql`` or run the following two commands :  
   a. Migrate the database
      ```sh
      $ php artisan migrate
      ```
   b. Seed the database
      ```sh
      $ php artisan db:seed
      ```
9. Running project
    ```sh
    $ php artisan serve
    ```
<p align="right">(<a href="#top">back to top</a>)</p>


## Credential in Seeder
Admin
> Username : indonesiapeduli@gmail.com
> Password : 123456

Member
> Username : memberpeduli@gmail.com
> Password : 123456

## Screenshoot

![Indonesia Peduli - Home](https://user-images.githubusercontent.com/57386598/159720380-cbba31b6-6bdf-4f17-81d0-8351a9117782.png)
![Indonesia Peduli - Detail Program](https://user-images.githubusercontent.com/57386598/159720430-afb66b5d-80b7-4c8c-83fd-9e701030f948.png)
![Indonesia Peduli - Pembayaran](https://user-images.githubusercontent.com/57386598/159720424-fcb1808d-e483-4fb8-a12b-5ec4d6710ff0.png)
![Indonesia Peduli - Donasi Saya](https://user-images.githubusercontent.com/57386598/159720418-2d9adf2f-4429-4df1-af68-9252283d908d.png)
![Indonesia Peduli - Transparansi Penyaluran Dana](https://user-images.githubusercontent.com/57386598/159720411-26a68985-163d-4a58-8d86-6a7a6b456e53.png)
![Indonesia Peduli - Tentang Kami](https://user-images.githubusercontent.com/57386598/159720390-430b603c-ea27-4a05-b13c-dd27ab12cc0b.png)
![Indonesia Peduli - Frequently Asked Question](https://user-images.githubusercontent.com/57386598/159720368-9b127d0b-1e75-4548-8db7-6f15011cf6a0.png)


<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

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
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
