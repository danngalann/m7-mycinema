# m7-mycinema
Basic CRUD app for a school project.

## Run locally
To run this app locally, you'll need to go to your XAMPP or WAMP web directory and execute the following commands
```
git clone https://github.com/danngalann/m7-mycinema
cd m7-mycinema
composer install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

Make sure to set your root directory to the `public/` folder and create a "my_cinema" database.

You can register users from the `/register` route. An admin user has already been added with `admin/admin1234`.
