<?php


namespace Codium\CleanCode\model\useCase;


use Codium\CleanCode\data\location\LocationInfoFactory;

class GetCityIdentifier
{
    public function getCityIdentifier($cityName) {
        $locationFactory = new LocationInfoFactory();
        $dataConnector = $locationFactory->create("META_WEATHER");
        var_dump($dataConnector);
        return $dataConnector->getCityIdentifier($cityName);
    }
}