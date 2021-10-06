<?php

use Aws\Laravel\AwsServiceProvider;

 

    /*
    |--------------------------------------------------------------------------
    | AWS SDK Configuration
    |--------------------------------------------------------------------------
    |
    | The configuration options set in this file will be passed directly to the
    | `Aws\Sdk` object, from which all client objects are created. This file
    | is published to the application config directory for modification by the
    | user. The full set of possible options are documented at:
    | http://docs.aws.amazon.com/aws-sdk-php/v3/guide/guide/configuration.html
    |
    */
return [
    'credentials' => [
        'key'    => 'AKIARIFTZRG4QTGIZQUS',
        'secret' => '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',
    ],
    'region' => 'us-east-2',
    'version' => 'latest',
    
    // You can override settings for specific services
    'Ses' => [
        'region' => 'us-east-2',
    ],
];


 