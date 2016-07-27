<?php

namespace Websmurf\LaravelCassandra;

class Cassandra
{
    /** @var \Cassandra\Cluster cassandra cluster instance */
    protected $connection;

    /**
     * Make connection to connection pool
     */
    public function __construct()
    {
        #set up connection details
        $builder = \Cassandra::cluster()
          ->withPort(9042)
          ->withDefaultPageSize(24)
          ->withDefaultConsistency(\Cassandra::CONSISTENCY_ALL);

        $builder->withContactPoints('192.168.100.11');

        # connect to cluster
        $this->connection = $builder->build();

        var_dump(config('cassandra'));
    }

    public static function query()
    {
        var_dump('boe');
    }
}