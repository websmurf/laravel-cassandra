Laravel/Lumen wrapper for Cassandra
=========

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