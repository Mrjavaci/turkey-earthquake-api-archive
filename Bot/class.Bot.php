<?php
/**
 * user: javaci
 * date: 23.08.2021
 * project: turkey-earthquake-api
 */


class Bot
{
    private $db;
    private $parse;

    public function __construct()
    {
        $this->db = new Database();
        $this->parse = new Parse();


    }

    /**
     * @throws Exception
     */
    public function runBot($url)
    {
        $connection = new Connection($url);
        $body = $connection->getBodyOfPage();
        $body = iconv("windows-1254", "UTF-8", $body);
        $eqList = new SimpleXMLElement($body);
        $modelsArray = array();
        foreach ($eqList as $earthQuake) {
            $name = (string)$earthQuake->attributes()->name;
            $ex = explode(" ", $name);
            $location = $this->parse->findLocation(explode(" ", (string)$earthQuake->attributes()->lokasyon), true);

            $model = new QuakeModel(
                $ex[0],
                $ex[1],
                (float)$earthQuake->attributes()->lat,
                (float)$earthQuake->attributes()->lng,
                (float)$earthQuake->attributes()->Depth,
                0,
                (float)$earthQuake->attributes()->mag,
                0,
                $location,
            );
            if (!$this->db->ifHashUsed($model->hash)) {
                array_push($modelsArray, $model);
            } else {
                echo $ex[0] . " - " . $ex[1] . "using.";
            }
        }
        $this->db->insertArray($modelsArray);

    }
}