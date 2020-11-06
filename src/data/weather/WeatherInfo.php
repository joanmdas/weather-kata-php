<?php


namespace Codium\CleanCode\data\weather;


interface WeatherInfo
{
    function getWeatherInfo(string $locationIdentifier);
}