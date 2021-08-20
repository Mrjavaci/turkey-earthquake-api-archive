<?php
/**
 * user: javaci
 * date: 20.08.2021
 * project: turkey-earthquake-api
 */


class Database
{
    public PDO $db;

    public function __construct()
    {
        try {
            $db = new PDO("mysql:host=" . DB_host . ";dbname=" . DB_name, DB_user, DB_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->exec("SET CHARSET UTF8");
            $db->exec("SET NAMES UTF8");
        } catch (PDOException $e) {
            die ("error -> " . $e);
        }
        $this->db = $db;
    }
}