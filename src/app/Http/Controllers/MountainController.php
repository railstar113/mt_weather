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

        $apiKey = config('api.key');
        $latitude = $mountain->latitude;
        $longitude = $mountain->longitude;
        $response = Http::get("https://api.openweathermap.org/data/2.5/onecall?lat=$latitude&lon=$longitude&exclude=minutely&appid=$apiKey&units=metric");
        $weatherData = $response->json();

        return view('mountains.weather', compact('mountain', 'weatherData'));
    }
}
