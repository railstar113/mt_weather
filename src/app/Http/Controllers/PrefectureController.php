<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use App\Models\Mountain;

class PrefectureController extends Controller
{
    public function index()
    {
        $regions = [
            '北海道・東北' => Prefecture::where('region', '北海道・東北')->get(),
            '関東' => Prefecture::where('region', '関東')->get(),
            '中部' => Prefecture::where('region', '中部')->get(),
            '近畿' => Prefecture::where('region', '近畿')->get(),
            '中国' => Prefecture::where('region', '中国')->get(),
            '四国' => Prefecture::where('region', '四国')->get(),
            '九州・沖縄' => Prefecture::where('region', '九州・沖縄')->get(),
        ];

        return view('prefectures.index', compact('regions'));
        // return view('prefectures.index')->with(['regions' => $regions]);
    }

    public function show($code)
    {
        $prefecture = Prefecture::findOrFail($code)->name;
        $mountains = Mountain::where('prefecture_code', $code)->get();

        return view('prefectures.show', compact('prefecture', 'mountains'));
    }
}
