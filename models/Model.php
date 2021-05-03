<?php

abstract class Model {

    private static PDO $_bdd;

    private static function setBdd(): void
    {
        $login = "m2l";
        $mdp = "m2l";
        $bd = "m2l";
        $host = "bdd.spartacube.fr";
        self::$_bdd = new PDO("mysql:host=$host;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        self::$_bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }


    protected function getBdd(): PDO
    {
        if(!isset(self::$_bdd)){
            self::setBdd();
        }
        return self::$_bdd;
    }

    protected function getAll(string $table, $obj): array
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM ' . $table . ';');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

}