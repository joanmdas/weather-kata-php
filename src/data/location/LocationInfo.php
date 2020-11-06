<?php


namespace Codium\CleanCode\data\location;


interface LocationInfo
{
    function getCityIdentifier(string $cityName);
}