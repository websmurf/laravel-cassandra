<?php

namespace Websmurf\LaravelCassandra;

use Illuminate\Support\ServiceProvider;

class CassandraServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register cassandra
        $this->app->singleton(\Cassandra\Connection::class);
    }
}