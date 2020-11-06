<?php


namespace Codium\CleanCode\data\location;


class LocationInfoFactory
{
    private const META_WEATHER_CLASSNAME = "META_WEATHER";

    public function create($className) {
        if (strcmp(self::META_WEATHER_CLASSNAME, $className) == 0) {
            return new MetaWeatherLocationInfo();
        }

        return "";
    }
}