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
        $res = $this->client->request('GET', $this->url);
        return (string)$res->getBody();
    }
}