<?php

use Websmurf\LaravelCassandra\Cassandra;
use Mockery as m;

class CassandraTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test the construct and configuration of the Cassandra class
     */
    public function test_cassandra_construct()
    {
        // Initialize the cassandra class with all configuration options
        $cassandra = new Cassandra();

        // Check correct class type
        $this->assertTrue($cassandra instanceof Websmurf\LaravelCassandra\Cassandra);
    }

    /**
     * Test the cassandra prepare wrapper
     */
    public function test_cassandra_prepare()
    {
        // Initialize the cassandra class with all configuration options
        $cassandra = new Cassandra();

        // Generate cql statement and run through prepare function
        $cql = 'SELECT * FROM general.syslog';
        $statement = $cassandra->prepare($cql);

        // Assert return type
        $this->assertTrue($statement instanceof \Cassandra\Statement);
    }

    /**
     * Test the cassandra execute wrapper
     */
    public function test_cassandra_execute()
    {
        // Initialize the cassandra class with all configuration options
        $cassandra = new Cassandra();

        // Generate cql statement and run through prepare function
        $cql = 'SELECT * FROM general.syslog';
        $statement = $cassandra->prepare($cql);

        // Execute prepared statement
        $response = $cassandra->execute($statement);

        // Assert return type
        $this->assertTrue($response instanceof \Cassandra\Rows);
    }

    public function tearDown()
    {
        // Call parent teardown
        parent::tearDown();

        // Close mockery
        m::close();
    }
}