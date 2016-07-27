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
        // Set up connection details
        $builder = \Cassandra::cluster();

        // Fetch configured port and set it, if it's provided
        $port = config('cassandra.port');
        if(!empty($port))
        {
            $builder->withPort($port);
        }

        // Fetch configured default page size and set it, if it's provided
        $defaultPageSize = config('cassandra.defaultPageSize');
        if(!empty($defaultPageSize))
        {
            $builder->withDefaultPageSize($defaultPageSize);
        }
        
        // Fetch configured default consistency level and set it, if it's provided
        $defaultConsistency = config('cassandra.withDefaultConsistency');
        if(!empty($defaultConsistency))
        {
            $builder->withDefaultConsistency($defaultConsistency);
        }

        // Set contact end points
        call_user_func_array(array($builder, "withContactPoints"), config('cassandra.contactpoints'));

        // Connect to cluster
        $this->connection = $builder->build();
    }

    public static function query()
    {
        var_dump('boe');
    }
}