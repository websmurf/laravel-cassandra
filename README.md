Laravel/Lumen wrapper for Cassandra
=========

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/websmurf/laravel-cassandra/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/websmurf/laravel-cassandra/?branch=master)

Installation
----

This packages uses the cassandra functionality provided by the Datastax php driver. 
It needs to be installed before you will be able to use this package. See for more information: [http://datastax.github.io/php-driver/](http://datastax.github.io/php-driver/)

Install using composer: 

```
composer require websmurf/laravel-cassandra
```

After that, register the service provider by adding it in your app.php:

```
$app->register(Websmurf\LaravelCassandra\CassandraServiceProvider::class);
```

You can publish the configuration using the following command:

```
php artisan config:publish websmurf/laravel-cassandra
```

After that, change the configuration according to your needs