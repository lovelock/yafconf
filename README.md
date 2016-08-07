# A config wrapper for Yaf

**Notice**
This is designed for Yaf, if you're using other framework, leave it.

## Feautures

1. Global environment setting support.
2. Simple API.

## Usage

### 1. Using composer

#### 1. Add a method in `Bootstrap`

```php
class Bootstrap extends Yaf\Bootstrap_Abstract
{

    public function _initLoader(Dispatcher $dispatcher)
    {
        require __DIR__ . '/../vendor/autoload.php';
    }
}
```

#### 2. Download it via composer

`composer require lovelock/konf`

### 2. Classic way

If you don't like composer, you can require it from your local directory as well. You may put it in your library path as you wish.

## Pre-configuration


This project relies on two global constants

1. `CONF_PATH`

This tells Conf where to find the .ini files.

2. `APP_ENV`

This tells Conf what directives to find in .ini files.

### Api

1. `Conf::get($key)`

`$key` **MUST** be `.` seperated. I.E, a dot is used as a seperator of the configuration path and its real key. e.g:

```php
Conf::get('database.database.host')
```
will find the `database.ini` in `CONF_PATH` and fetch the value of the key `database.host` in the configuration.

It supports array as well, which means, if your configuration file is like this:

```ini
; database.ini
[product]
database.dbtype=mysql
database.host=127.0.0.1
database.port=3306
database.dbname=ttlive
database.user=root
database.password=root
database.charset=utf8

[dev : product]
database.host=192.168.1.103

```
`Conf::get('database.database')` will give you an array

```
array (
    'dbtype'   => 'mysql',
    'host'     => '127.0.0.1',
    'port'     => '3306',
    'dbname'   => 'ttlive',
    'user'     => 'root',
    'password' => 'root',
    'charset'  => 'utf8',
)
```

Further more, if you set the constant `APP_ENV = dev`, and the result array would be

```
array (
    'dbtype'   => 'mysql',
    'host'     => '192.168.1.103',
    'port'     => '3306',
    'dbname'   => 'ttlive',
    'user'     => 'root',
    'password' => 'root',
    'charset'  => 'utf8',
)
```

## TODO

1. [ ] Add default value support.
