<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Mjuusho;
use App\Model\PostCode;
use Cache;

class AreaController extends Controller
{
    public function getPref(Request $request)
    {
        $prefList = Cache::get('prefList');
        if (!$prefList) {
            $prefList = Mjuusho::getPrefList();
            Cache::store('file')->put('prefList', $prefList, 60);
        }
        return response()->json($prefList, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getCity(Request $request)
    {
        $prefCd = $request->input('pref_cd');
        $cacheKey = sprintf('cityList_%s', $prefCd);
        $cityList = Cache::get($cacheKey);

        if (!$cityList) {
            $cityList = Mjuusho::getCityList($prefCd);
            Cache::store('file')->put($cacheKey, $cityList, 60);
        }

        return response()->json($cityList, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getTown(Request $request)
    {
        $prefCd = $request->input('pref_cd');
        $cityCd = $request->input('city_cd');
        $cacheKey = sprintf('townList_%s_%s', $prefCd, $cityCd);
        $townList = Cache::get($cacheKey);

        if (!$townList) {
            $townList = Mjuusho::getTownList($prefCd, $cityCd);
            Cache::store('file')->put($cacheKey, $townList, 60);
        }

        return response()->json($townList, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getAddress(Request $request)
    {
        $zip = $request->input('zip');
        $cacheKey = sprintf('zip_%s', $zip);
        $address = Cache::get($cacheKey);
        if (!$address) {
            $address = PostCode::getAddress($zip);
            $address->full_address = sprintf('%s%s%s', $address->pref, $address->city, $address->town);
            $address->zip = sprintf('%07d', $address->zip);
            Cache::store('file')->put($cacheKey, $address, 60);
        }
        return response()->json($address, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
