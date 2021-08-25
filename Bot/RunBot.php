<?php
/**
 * user: javaci
 * date: 23.08.2021
 * project: turkey-earthquake-api
 */

include __DIR__ . "/../Helpers/include.php";
include "class.Bot.php";

$bot = new Bot();
$xmlRaw = file_get_contents(__DIR__ . "/links.xml");
try {
    $xml = new SimpleXMLElement($xmlRaw);
    foreach ($xml as $earthQuake) {
        $attributes = $earthQuake->attributes();
        if ($attributes != null) {
            $bot->runBot("http://udim.koeri.boun.edu.tr/zeqmap/xmlt/" . (string)$attributes->VALUE . ".xml");
        }
    }

} catch (Exception $e) {
}


