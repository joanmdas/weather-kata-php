<?php


namespace Codium\CleanCode\data;


use GuzzleHttp\Client;

class WeatherRepository implements WeatherRepositoryInterface
{
    function sendData(string $url)
    {
        $client = new Client();
        return $client->get($url)->getBody()->getContents();
    }
}