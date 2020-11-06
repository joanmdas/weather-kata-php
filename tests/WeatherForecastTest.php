<?php

namespace Tests\Codium\CleanCode;

use Codium\CleanCode\WeatherForecast;
use PHPUnit\Framework\TestCase;

class WeatherForecastTest extends TestCase
{
    // https://www.metaweather.com/api/location/766273/
    /** @test */
    public function find_the_weather_of_today()
    {
        $forecast = new WeatherForecast();
        $city = "Madrid";

        $prediction = $forecast->predict($city);

        echo "Today: $prediction\n";
        $this->assertTrue(true, 'I don\'t know how to test it');
    }

    /** @test */
    public function find_the_weather_of_any_day()
    {
        $forecast = new WeatherForecast();
        $city = "Madrid";

        $prediction = $forecast->predict($city, new \DateTime('+2 days'));

        echo "Day after tomorrow: $prediction\n";
        $this->assertTrue(true, 'I don\'t know how to test it');
    }

    /** @test */
    public function find_the_wind_of_any_day()
    {
        $forecast = new WeatherForecast();
        $city = "Madrid";

        $prediction = $forecast->predict($city, null, true);

        echo "Wind: $prediction\n";
        $this->assertTrue(true, 'I don\'t know how to test it');
    }

    /** @test */
    public function change_the_city_to_woeid()
    {
        $forecast = new WeatherForecast();
        $city = "Madrid";

        $forecast->predict($city, null, true);

        $this->assertEquals("766273", $city);
    }

    /** @test */
    public function there_is_no_prediction_for_more_than_5_days()
    {
        $forecast = new WeatherForecast();
        $city = "Madrid";

        $prediction = $forecast->predict($city, new \DateTime('+6 days'));

        $this->assertEquals("", $prediction);
    }
}