<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mountain;
use Illuminate\Support\Facades\Http;

class MountainController extends Controller
{
    public function weather(Mountain $mountain)
    {
        // $mountain = Mountain::findOrFail($id);

        $lat = $mountain->latitude;
        $lon = $mountain->longitude;
        $apiKey = config('api.key');
        $lang = config('api.lang');
        $response = Http::get("https://api.openweathermap.org/data/2.5/forecast?lat=$lat&lon=$lon&exclude=minutely&appid=$apiKey&units=metric&lang=$lang");
        $weatherData = $response->json();

        $deg_ja = ['北', '北北東', '北東', '東北東', '東', '東南東', '南東', '南南東', '南', '南南西', '南西', '西南西', '西北西', '北西', '北北西', '北', '北北東'];
        $degData = [];
        foreach ($weatherData['list'] as $weather_3hours) :
            $degIndex = round($weather_3hours['wind']['deg'] / 22.5);
            $degData[] = $deg_ja[$degIndex];
        endforeach;

        return view('mountains.weather', compact('mountain', 'weatherData', 'degData'));
    }
}
