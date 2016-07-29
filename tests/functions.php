<?php

/**
 * Mock the lumen config function
 * @param $key
 *
 * @return array|int|null|string
 */
function config($key)
{
    $return = null;
    switch ($key)
    {
        case 'cassandra.port':
            $return = 9042;
            break;
        case 'cassandra.defaultPageSize':
            $return = 24;
            break;
        case 'cassandra.withDefaultConsistency':
            $return = 0x0005;
            break;
        case 'cassandra.keyspace':
            $return = 'general';
            break;
        case 'cassandra.contactpoints':
            $return = ['127.0.0.1'];
            break;
    }

    return $return;
}