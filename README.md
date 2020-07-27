<!-- PROJECT LOGO -->
<br />
<p align="center">
  <a href="https://github.com/bassmastaLK/srpago-test">
    <img src="https://github.com/bassmastaLK/srpago-test/blob/master/public/img/favicon.png" alt="Logo" width="80" height="80">
  </a>

  <h1 align="center">Sr. Pago Test</h1>

  <p align="center">
    Knowledge Test for the PHP Senior Developer position at Sr. Pago.
  </p>
</p>



<!-- TABLE OF CONTENTS -->
## Table of Contents

* [About the Project](#about-the-project)
  * [Built With](#built-with)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Usage](#usage)
* [Contact](#contact)



<!-- ABOUT THE PROJECT -->
## About The Project

<img src="https://github.com/bassmastaLK/srpago-test/blob/master/public/img/srpago_ss.png" alt="Preview" width="90%" height="auto">


### Built With

* Laravel 7.21.0
* PHP 7.4
* MySQL 8
* JavaScript & jQuery
* Bootstrap 3.3.5
* HTML5, CSS3



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

* You will need a Local Server to execute the PHP files (like XAMPP, MAMP).
* npm
* composer

### Installation
 
1. Clone the repo directly under the public / htdocs folder of your Local Server (otherwise, the Maps API won´t work).
```sh
git clone https://github.com/bassmastaLK/srpago-test.git
```
2. Install NPM packages.
```sh
npm install
```
3. Install Composer packages.
```sh
composer install
```
4. Allow the application to connect to your local databases:<br>
&nbsp;&nbsp;&nbsp;4.1 Create a new database in your local database manager (phpMyAdmin / Sequel Pro / TablePlus).<br>
&nbsp;&nbsp;&nbsp;4.2 Under the repo root directory, duplicate the <i>.env.example</i> file and name it <i>.env</i>.<br>
&nbsp;&nbsp;&nbsp;4.3 Change this new file's DB_DATABASE value to match your new database's name (line 12).<br>
&nbsp;&nbsp;&nbsp;4.4 If necessary, also edit the other database connection values, like username or password (lines 9 to 14).<br>

5. Generate an application encryption key.
```sh
php artisan key:generate
```
6. Run a Laravel migration to create and populate the required tables.
```sh
php artisan migrate
```


<!-- USAGE EXAMPLES -->
## Usage

If the previous steps didn't throw any error, start your server's Apache and MySQL services and the application should be working at [http://localhost/srpago-test/public/](http://localhost/srpago-test/public/).

In case of problems with the Migration / databases configuration, the dump files for manual import can be found [here](https://github.com/bassmastaLK/srpago-test/blob/master/public/db).

If the difficulties persist and local setup can't be done, the application is also available in my personal domain: [http://marruffomultimedia.com/srpago](http://marruffomultimedia.com/srpago).


<!-- CONTACT -->
## Contact

Luis Enrique Marrufo Torres - luiz.marrufo@gmail.com

Project Link: [https://github.com/bassmastaLK/srpago-test](https://github.com/bassmastaLK/srpago-test)
