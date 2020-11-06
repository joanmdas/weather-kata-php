<?php


namespace Codium\CleanCode\model\useCase;


use Codium\CleanCode\data\weather\WeatherInfoFactory;
use DateTime;

class GetWindSpeed
{
    public function getWindSpeed($cityIdentifier, DateTime $datetime) {
        $weatherInfoFactory = new WeatherInfoFactory();
        $dataConnector = $weatherInfoFactory->create("META_WEATHER");
        var_dump($dataConnector);
        $weatherInfoList = $dataConnector->getWeatherInfo($cityIdentifier);
        $formattedDate = $datetime->format('Y-m-d');
        $windSpeed = "";
        foreach ($weatherInfoList as $weatherInfo) {
            if ($weatherInfo["applicable_date"] == $formattedDate) {
                $windSpeed = $weatherInfo['wind_speed'];
                break;
            }
        }
        return $windSpeed;
    }
}