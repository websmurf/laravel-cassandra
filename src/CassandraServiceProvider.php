<?php

namespace Websmurf\LaravelCassandra;

use Illuminate\Support\ServiceProvider;

class CassandraServiceProvider extends ServiceProvider
{
    /** @inheritdoc */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Attempt to load default configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/cassandra.php', 'cassandra'
        );

        // Configure cassandra options
        $this->app->configure('cassandra');

        // Register cassandra
        $this->app->singleton('Cassandra', function($app) {
            return new Cassandra();
        });
    }
}