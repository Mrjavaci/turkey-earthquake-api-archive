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

    public function ifHashUsed(?string $hash): bool
    {
        $sth = $this->db->prepare("select id from earthquake where hash = :hash");
        $sth->execute(array(
            "hash" => $hash
        ));
        $fth = $sth->fetchAll(PDO::FETCH_ASSOC);

        if (count($fth) != 0) {
            return true;
        } else {
            return false;
        }

    }

    public function insertArray(array $modelsArray)
    {
        foreach ($modelsArray as $model) {
            $sth = $this->db->prepare("INSERT INTO `earthquake`
            ( `date`, `time`, `latitude`, `longitude`, `depth`, `location`, `scale_MD`, `scale_ML`, `scale_Mw`, `hash`)
            VALUES 
             ( :date_s, :time_s, :latitude, :longitude, :depth_, :location, :scale_MD, :scale_ML, :scale_Mw, :hash);");
            $sth->execute(array(
                "date_s" => $model->date,
                "time_s" => $model->time,
                "latitude" => $model->latitude,
                "longitude" => $model->longitude,
                "depth_" => $model->depth,
                "location" => $model->location,
                "scale_MD" => $model->scale_MD,
                "scale_ML" => $model->scale_ML,
                "scale_Mw" => $model->scale_Mw,
                "hash" => $model->hash
            ));
            $sth->fetch();
            echo $model->date . " -- " . $model->time . " eklendi!";
        }
    }
}