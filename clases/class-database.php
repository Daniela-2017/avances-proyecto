<?php

  //  header('Content-Type: application/json'); averiguar si es importante
require_once $_SERVER['DOCUMENT_ROOT'] .'/proyecto1/vendor/autoload.php';

use Kreait\Firebase\Factory;

class Database{
    private $keyFile = __DIR__ .'/../secret/fir-proyect-8f565-653f2a333a0c.json';
    

    private $URI='https://fir-proyect-8f565.firebaseio.com/';
    private $db;
    public function __construct(){


    $firebase = (new Factory)
    ->withServiceAccount($this->keyFile)
    ->withDatabaseUri($this->URI)
    ->create();
    $this->db = $firebase->getDatabase();


        }

    public function getDB(){

        return $this->db;
    }

}

?>