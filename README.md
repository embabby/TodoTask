# Todo list Task


## Requirements
This project built using **VueJs 2.5.7** and **laravel 5.5**, so your php version must be >= **7.0**

## Installation
1. Clone the source code. `git clone https://github.com/embabby/TodoTask.git`
2. Go to inside the project. `cd TodoTask`
3. Run `composer install` to install all the dependencies.
4. Run `npm install`.
5. Copy configrations file. `cp .env.example .env`
6. Create a new database.
7. Open .env file and set database configrations
```php
      DB_DATABASE= YOUR_DATABASE_NAME_HERE
      DB_USERNAME= YOUR_USERNAME_HERE
      DB_PASSWORD= YOUR_PASSWORD_HERE
```
8. Migrate the tables `php artisan migrate`
9. Run the project! `php artisan serve`
10. NOTE for LOGIN insert 'user1@todo.com' for first email and 'user2@todo.com' for the second and password is '12345678' for both 
