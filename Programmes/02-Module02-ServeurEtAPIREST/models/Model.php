<?php

abstract class Model {
    private static $pdo;

    private static function setBdd() {
        self::$pdo = new PDO("mysql:host=localhost;dbname=db_animaux_fullstack_site_front_react_back_php_mysql_mvc_poo;charset=utf8mb4","root","");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    protected function getBdd() {
        if(self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
