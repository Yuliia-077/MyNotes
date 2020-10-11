<?php
class Db
{
    public static function getConnection()
    {
        $params = include(ROOT.'/config/db_params.php');
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        return new PDO($dsn,$params['user'],$params['password']);
    }
}