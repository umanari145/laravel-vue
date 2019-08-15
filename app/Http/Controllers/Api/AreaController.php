<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Mjuusho;

class AreaController extends Controller
{
    public function getPref(Request $request)
    {
        $prefList = Mjuusho::getPrefList();
        return response()->json($prefList, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getCity(Request $request)
    {
        $prefCd = $request->input('pref_cd');
        $cityList = Mjuusho::getCityList($prefCd);
        return response()->json($cityList, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getTown(Request $request)
    {
        $prefCd = $request->input('pref_cd');
        $cityCdStr = $request->input('city_cd');
        $cityCds = explode(",", $cityCdStr);
        $townList = Mjuusho::getTownList($prefCd, $cityCds);
        return response()->json($townList, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
