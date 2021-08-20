<?php
/**
 * user: javaci
 * date: 20.08.2021
 * project: turkey-earthquake-api
 */


class Parse
{
    public string $page;

    public function __construct($page)
    {
        $this->page = iconv("windows-1254", "UTF-8", $page);
    }

    public function normalize()
    {
        preg_match_all("/<pre>(.*)<\/pre>/sm", $this->page, $matches, PREG_SET_ORDER, 0);
        $continue = false;
        $allLines = explode(PHP_EOL, $matches[0][1]);
        foreach ($allLines as $key => $val) {
            if ($continue) {
                echo $val . "\n ";
                //
            } else {
                if (str_contains($val, "----------")) {
                    $continue = true;
                }
            }
        }

    }

}