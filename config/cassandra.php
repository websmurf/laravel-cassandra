<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cassandra contact point ip(s)
    |--------------------------------------------------------------------------
    */
    'contactpoints'      => [
        '127.0.0.1'
    ],

    /* cassandra port number */
    'port'               => 9042,

    /* default page size */
    'defaultPageSize'    => 25,

    /* default consistency level */
    'defaultConsistency' => \Cassandra::CONSISTENCY_ALL,

    /* default connection keyspace */
    'keyspace'           => 'general'
];