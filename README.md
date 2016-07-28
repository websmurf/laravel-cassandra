Laravel/Lumen wrapper for Cassandra
=========

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/websmurf/laravel-cassandra/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/websmurf/laravel-cassandra/?branch=master)

Installation
----

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