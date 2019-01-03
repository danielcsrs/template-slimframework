<?php
return [
    'settings' => [
        'mode' => 'production',
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // allow the web server to send the content-length header
        'determineRouteBeforeAppMiddleware' => false,
        'csrf_regenerate' => false,
        'view' => [
            'template_path' => __DIR__ . '/../resources/views/',
            'cache' => false //__DIR__ . '/../app/views/cache/'
        ],
        'db'=> [
          'driver' => 'mysql',
          'host' => 'mysql.yourhost',
          'database' => 'database',
          'username' => 'username',
          'password' => 'password',
          'charset' => 'utf8',
          'collation' => 'utf8_unicode_ci',
        ],
        'mailer'=> [
            'host' => 'smtp.yourhost',
            'mail' => 'mail@yourdomain',
            'pass' => 'password',
            'port' => 587,
            'secure' => 'tls',
        ]
    ],
];
