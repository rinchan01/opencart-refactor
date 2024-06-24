<?php

return [


    'default' => env('QUEUE_CONNECTION', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection options for every queue backend
    | used by your application. An example configuration is provided for
    | each backend supported by Laravel. You're also free to add more.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_QUEUE_CONNECTION'),
            'table' => env('DB_QUEUE_TABLE', 'jobs'),
            'queue' => env('DB_QUEUE', 'default'),
            'retry_after' => (int) env('DB_QUEUE_RETRY_AFTER', 90),
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => env('BEANSTALKD_QUEUE_HOST', 'localhost'),
            'queue' => env('BEANSTALKD_QUEUE', 'default'),
            'retry_after' => (int) env('BEANSTALKD_QUEUE_RETRY_AFTER', 90),
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_QUEUE_CONNECTION', 'default'),
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => (int) env('REDIS_QUEUE_RETRY_AFTER', 90),
            'block_for' => null,
            'after_commit' => false,
        ],
        'rabbitmq' => [
            'driver' => 'rabbitmq',
            'worker' => env('RABBITMQ_WORKER', 'default'),
            'dsn' => env('RABBITMQ_DSN', null),
            // 'factory_class' => \Enqueue\AmqpBunny\AmqpConnectionFactory::class,
            'host' => env('RABBITMQ_HOST', '127.0.0.1'),
            'port' => env('RABBITMQ_PORT', 5672),
            'vhost' => env('RABBITMQ_VHOST', '/'),
            'user' => env('RABBITMQ_USER', 'guest'),
            'password' => env('RABBITMQ_PASSWORD', 'guest'),
            'queue' => env('RABBITMQ_QUEUE', 'default'),
            // 'options' => [
            //     'exchange' => [
            //         'name' => env('RABBITMQ_EXCHANGE_NAME'),
            //         'declare' => env('RABBITMQ_EXCHANGE_DECLARE', true),
            //         /*
            //         * Read more about possible values at https://www.rabbitmq.com/tutorials/amqp-concepts.html
            //         */
            //         'type' => env('RABBITMQ_EXCHANGE_TYPE', \Interop\Amqp\AmqpTopic::TYPE_DIRECT),
            //         'passive' => env('RABBITMQ_EXCHANGE_PASSIVE', false),
            //         'durable' => env('RABBITMQ_EXCHANGE_DURABLE', true),
            //         'auto_delete' => env('RABBITMQ_EXCHANGE_AUTODELETE', false),
            //         'arguments' => env('RABBITMQ_EXCHANGE_ARGUMENTS'),
            //     ],
            //     'queue' => [
            //         'declare' => env('RABBITMQ_QUEUE_DECLARE', true),
            //         'bind' => env('RABBITMQ_QUEUE_DECLARE_BIND', true),
            //         'passive' => env('RABBITMQ_QUEUE_PASSIVE', false),
            //         'durable' => env('RABBITMQ_QUEUE_DURABLE', true),
            //         'exclusive' => env('RABBITMQ_QUEUE_EXCLUSIVE', false),
            //         'auto_delete' => env('RABBITMQ_QUEUE_AUTODELETE', false),
            //         'arguments' => env('RABBITMQ_QUEUE_ARGUMENTS'),
            //     ],
            // ],
            // 'sleep_on_error' => env('RABBITMQ_ERROR_SLEEP', 5),
            // 'ssl_params' => [
            //     'ssl_on' => env('RABBITMQ_SSL', false),
            //     'cafile' => env('RABBITMQ_SSL_CAFILE', null),
            //     'local_cert' => env('RABBITMQ_SSL_LOCALCERT', null),
            //     'local_key' => env('RABBITMQ_SSL_LOCALKEY', null),
            //     'verify_peer' => env('RABBITMQ_SSL_VERIFY_PEER', true),
            //     'passphrase' => env('RABBITMQ_SSL_PASSPHRASE', null),
            // ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Job Batching
    |--------------------------------------------------------------------------
    |
    | The following options configure the database and table that store job
    | batching information. These options can be updated to any database
    | connection and table which has been defined by your application.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control how and where failed jobs are stored. Laravel ships with
    | support for storing failed jobs in a simple file or in a database.
    |
    | Supported drivers: "database-uuids", "dynamodb", "file", "null"
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'sqlite'),
        'table' => 'failed_jobs',
    ],

];
