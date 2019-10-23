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
        $search_params = $request->all();

        if (!empty($search_params)){
            $memberList = Persons::where($search_params)->get()->toArray();
        } else {
            $memberList = Persons::get()->toArray();
        }

        return response()->json($memberList, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function regist(Request $request)
    {
        $data = $request->all();
        Log::info(print_r($data, true));
        return response()->json([
            'res' => true
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function detail($memberId)
    {
        Log::info("memberId:${memberId}");
        $member = Persons::find($memberId);
        $member->traffic = (!empty($member->traffic)) ? json_decode($member->traffic):[];

        return response()->json([
            'res' => true,
            'member' => $member
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function edit(Request $request, $memberId)
    {
        Log::info("memberId:${memberId}");
        dd($request->all());

        return response()->json([
            'res' => true
        ], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
