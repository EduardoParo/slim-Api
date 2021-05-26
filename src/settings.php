<?php

//RETORNA UM ARRAY COM AS CONFIGURAÇÕES PARA INFORMAR NO APP
return [
    'aSettings' => [
        'displayErrorDetails' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings GERAÇÃO DE LOG
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],
        //ILLUMINATE DB CONFIGURA~ÇÕES
        'aDb' => [
                'driver'                => 'mysql',
                'host'                  => 'localhost',
                'database'              => 'slim',
                'username'              => 'root',
                'password'              => '',
                'charset'               => 'utf8',  
                'collation'             => 'utf8_unicode_ci',
                'prefix'                => '',  
        ],
        'cSecretKey'=>'Eduardo123456'
    ],

];
