# laravel-jwt
Laravel wrapper for the lcobucci/jwt package

## Instalation
Require this package with composer:
> composer require ammadeuss/laravel-jwt

You need to add the service provider in app.php
``` php
Ammadeuss\LaravelJwt\ServiceProvider::class,
```

If you want to use the facade, add these to your facades in app.php
``` php
'Jwt' => Ammadeuss\LaravelJwt\JwtFacade::class,
'JwtValidation' => Ammadeuss\LaravelJwt\JwtValidationFacade:class,
```

## Usage
```php
$token = Jwt::createBuilder()->with('uid', 1);
```
