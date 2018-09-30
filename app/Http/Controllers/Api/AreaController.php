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
        return response()->json($prefList);
    }
}
