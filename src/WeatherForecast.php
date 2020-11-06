<?php

namespace Codium\CleanCode;

use Codium\CleanCode\model\useCase\GetCityIdentifier;
use Codium\CleanCode\model\useCase\GetWeatherStatus;
use Codium\CleanCode\model\useCase\GetWindSpeed;
use GuzzleHttp\Client;

class WeatherForecast
{
    private const DATE_TIME = "+6 days 00:00:00";

    //TODO: bool wind extract 
    public function predict(string &$city, \DateTime $datetime = null, bool $wind = false): string
    {
        // When date is not provided we look for the current prediction
        if (!$datetime) {
            $datetime = new \DateTime();
        }

        // If there are predictions
        $is_date_valid = $datetime >= new \DateTime(self::DATE_TIME);
        if ($is_date_valid) {
            return "";
        }

        // Get city identifier
        $cityIdentifierClass = new GetCityIdentifier();
        $cityIdentifier = $cityIdentifierClass->getCityIdentifier($city);

        $returnData = "";

        if ($wind) {
            $windSpeedClass = new GetWindSpeed();
            $returnData = $windSpeedClass->getWindSpeed($cityIdentifier, $datetime);
        }
        else {
            $weatherStatusClass = new GetWeatherStatus();
            $returnData = $weatherStatusClass->getWeatherStatus($cityIdentifier, $datetime);
        }

        return $returnData;
    }
}