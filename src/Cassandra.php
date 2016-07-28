<?php

namespace Websmurf\LaravelCassandra;

class Cassandra
{

    /** @var \Cassandra\Cluster */
    protected $cluster;

    /** @var  /Cassandra\Session */
    protected $session;


    /**
     * Create a new connection instance with the provided configuration
     */
    public function __construct()
    {
        // Set up connection details
        $builder = \Cassandra::cluster();

        // Fetch configured port and set it, if it's provided
        $port = config('cassandra.port');
        if ( ! empty( $port )) {
            $builder->withPort($port);
        }

        // Fetch configured default page size and set it, if it's provided
        $defaultPageSize = config('cassandra.defaultPageSize');
        if ( ! empty( $defaultPageSize )) {
            $builder->withDefaultPageSize($defaultPageSize);
        }

        // Fetch configured default consistency level and set it, if it's provided
        $defaultConsistency = config('cassandra.withDefaultConsistency');
        if ( ! empty( $defaultConsistency )) {
            $builder->withDefaultConsistency($defaultConsistency);
        }

        // Set contact end points
        call_user_func_array([ $builder, "withContactPoints" ], config('cassandra.contactpoints'));

        // Connect to cluster
        $this->cluster = $builder->build();

        // Create a connect to the keyspace on cluster
        $this->session = $this->cluster->connect(config('cassandra.keyspace'));
    }

    /**
     * Create a prepared statement
     *
     * @param string                           $cql
     * @param \Cassandra\ExecutionOptions|null $options
     *
     * @return \Cassandra\PreparedStatement
     */
    public function prepare($cql, \Cassandra\ExecutionOptions $options = null)
    {
        // Crazy fall back due to checks in the datastax php library
        if(is_null($options))
        {
            $statement = $this->session->prepare($cql);
        } else {
            $statement = $this->session->prepare($cql, $options);
        }

        return $statement;
    }


    /**
     * Execute a cassandra query statement
     *
     * @param \Cassandra\Statement             $statement
     * @param \Cassandra\ExecutionOptions|null $options
     *
     * @return \Cassandra\Rows
     */
    public function execute(\Cassandra\Statement $statement, \Cassandra\ExecutionOptions $options = null)
    {
        // Crazy fall back due to checks in the datastax php library
        if(is_null($options))
        {
            $rows = $this->session->execute($statement);
        } else {
            $rows = $this->session->execute($statement, $options);
        }

        return $rows;
    }
}