<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$firebase = (new Factory)
    ->withServiceAccount('./secret/fir-proyect-8f565-653f2a333a0c.json')
    ->withDatabaseUri('https://fir-proyect-8f565.firebaseio.com/')
    ->create();

$database = $firebase->getDatabase();//gestiona la conexion de database y firebase

$newPost = $database
    ->getReference('users')
    ->push(['firtName'==>'Daniela',
    	'lastName'==>'Perez',
    	'birthday'==>'19/10/1998'
    ]);
?>