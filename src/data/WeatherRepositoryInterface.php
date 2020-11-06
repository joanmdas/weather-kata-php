<?php


namespace Codium\CleanCode\data;


interface WeatherRepositoryInterface
{
    function sendData(string $url);
}