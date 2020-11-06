<?php


namespace Codium\CleanCode\data\location;


use Codium\CleanCode\data\WeatherRepository;

class MetaWeatherLocationInfo implements LocationInfo
{
    private const META_WEATHER_CITY_LOCATION_URL = "https://www.metaweather.com/api/location/search/?query=";

    function getCityIdentifier(string $cityName)
    {
        $url = self::META_WEATHER_CITY_LOCATION_URL . $cityName;
        $repository = new WeatherRepository();
        $result = $repository->sendData($url);
        return json_decode($result,true)[0]['woeid'];
    }
}