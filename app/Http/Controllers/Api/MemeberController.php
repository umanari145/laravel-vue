<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Persons;
use Log;

class MemberController extends Controller
{


    public function list(Request $request)
    {
        $memberList = Persons::get()->toArray();
        return response()->json($memberList, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function regist(Request $request)
    {
        $data = $request->all();
        Log::info(print_r($data));
        return response()->json([
            'res' => true
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
