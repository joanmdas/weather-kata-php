<?php


namespace Codium\CleanCode\model\useCase;


use Codium\CleanCode\data\weather\WeatherInfoFactory;
use DateTime;

class GetWeatherStatus
{
    public function getWeatherStatus($cityIdentifier, DateTime $datetime) {
        $weatherInfoFactory = new WeatherInfoFactory();
        $dataConnector = $weatherInfoFactory->create("META_WEATHER");
        var_dump($dataConnector);
        $weatherInfoList = $dataConnector->getWeatherInfo($cityIdentifier);
        $formattedDate = $datetime->format('Y-m-d');
        $weatherStatus = "";
        foreach ($weatherInfoList as $weatherInfo) {
            if ($weatherInfo["applicable_date"] == $formattedDate) {
                $weatherStatus = $weatherInfo['weather_state_name'];
                break;
            }
        }
        return $weatherStatus;
    }
}