## Демо проект 
проект разработанный на курсах loftschool
для запуска проекта необходимо скопировать его к себе:
```terminal
git clone git@github.com:evd1ser/loftschool_laravel.git
cd loftschool_laravel
composer install
```

Необходимо исправить настроки в .env (скопировав его из .env.example) после запустить:
```terminal
php artisan migrate --seed
php artisan serve
```
