<?php
/**
 * user: javaci
 * date: 20.08.2021
 * project: turkey-earthquake-api
 */


class Connection
{
    public $url;
    public \GuzzleHttp\Client $client;

    public function __construct($url = Url)
    {
        $this->url = $url;
        $this->client = new GuzzleHttp\Client([
            'charset' => 'utf-8'
        ]);
    }

    public function getBodyOfPage(): string
    {
        try {
            echo "connecting ->" . $this->url."\n";
            $res = $this->client->request('GET', $this->url);
            echo "connected ->" . $this->url."\n";
        } catch (Exception $e) {
            echo "**************  Exception *************\n";
            $this->getBodyOfPage();
        }
        return (string)$res->getBody();
    }
}