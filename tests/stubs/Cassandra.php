<?php

use Mockery as m;

/**
 * This mock class mimics the functionality provided by the datastax php driver
 *
 */
class Cassandra
{
    public function __construct()
    {
        // Create session logic that normally belongs in the datastax php driver
        $this->session = m::mock('\Cassandra\Session');
        $this->session->shouldReceive('prepare')
            ->withArgs(['SELECT * FROM general.syslog'])
            ->andReturn(m::mock('Cassandra\Statement'));
        $this->session->shouldReceive('execute')
            ->withArgs(['\Cassandra\Statement'])
            ->andReturn(m::mock('Cassandra\Rows'));

        // Create cluster logic that normally belongs in the datastax php driver
        $this->cluster = m::mock('\Cassandra\Cluster');
        $this->cluster->shouldReceive('connect')->withArgs(['general'])->andReturn($this->session);
    }


    public static function cluster()
    {
        return new Cassandra();
    }

    public function build()
    {
        return $this->cluster;
    }

    public function withPort($port)
    {

    }

    public function withDefaultPageSize($size)
    {

    }

    public function withDefaultConsistency($consistency)
    {

    }

    public function withContactPoints($points)
    {

    }
}