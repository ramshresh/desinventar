<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=desinventar',
    'username' => 'root',
    'password' => 'password',
    'charset' => 'utf8',

    //SQLITE CONNECTION
    /*'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:'.dirname(__DIR__).'/data/db.sqlite'*/

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
