<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cassandra contact point ip(s)
    |--------------------------------------------------------------------------
    */
    'contactpoints' => [
        '192.168.100.11'
    ],

    /* cassandra port number */
    'port' => 9042,

    /* default page size */
    'defaultPageSize' => 25,

    /* default consistency level */
    'withDefaultConsistency' => \Cassandra::CONSISTENCY_ALL,

    /* default connection keyspace */
    'keyspace' => 'general'
];