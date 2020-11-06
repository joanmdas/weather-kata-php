<?php


namespace Codium\CleanCode\data\weather;


use Codium\CleanCode\data\WeatherRepository;

class MetaWeatherWeatherInfo implements WeatherInfo
{

    private const META_WEATHER_SEARCH_HTTP = "https://www.metaweather.com/api/location/search/?query=";

    function getWeatherInfo(string $locationIdentifier)
    {
        $url = self::META_WEATHER_SEARCH_HTTP . $locationIdentifier;
        $repository = new WeatherRepository();
        $result = $repository->sendData($url);
        return json_decode($result,true)['consolidated_weather'];
    }
}