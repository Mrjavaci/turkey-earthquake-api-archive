<?php
/**
 * user: javaci
 * date: 20.08.2021
 * project: turkey-earthquake-api
 */


class Parse
{
    public string $page;
    public Database $db;

    public function __construct($page)
    {
        $this->page = iconv("windows-1254", "UTF-8", $page);
    }

    public function normalize()
    {
        preg_match_all("/<pre>(.*)<\/pre>/sm", $this->page, $matches, PREG_SET_ORDER, 0);

        $continue = false;
        $allLines = explode(PHP_EOL, $matches[0][1]);
        $modelsArray = array();
        unset($allLines[count($allLines) - 1]);
        unset($allLines[count($allLines) - 1]);
        foreach ($allLines as $key => $val) {
            if ($continue) {
                $parts = preg_split('/\s+/', $val);
                $location = $this->findLocation($parts);
                $model = new QuakeModel(
                    str_replace(".", "-", $parts[0]),
                    $parts[1],
                    floatval($parts[2]),
                    floatval($parts[3]),
                    floatval($parts[4]),
                    floatval($parts[5]),
                    floatval($parts[6]),
                    floatval($parts[7]),
                    $location
                );
                if (!$this->db->ifHashUsed($model->hash)) {
                    array_push($modelsArray, $model);
                }
            } else {
                if (str_contains($val, "----------")) {
                    $continue = true;
                }
            }
        }
        $this->db->insertArray($modelsArray);
        echo json_encode($modelsArray);

    }

    private function findLocation(array $parts): string
    {
        $newParts = array_slice($parts, 8, count($parts));
        $location = "";
        foreach ($newParts as $newPart) {
            if (str_contains($newPart, "İlksel") || str_contains($newPart, "REVIZE")) {
                return $location;
            }
            $location .= " " . $newPart;
        }
        return $location;
    }

}