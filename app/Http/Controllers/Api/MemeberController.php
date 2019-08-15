<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Persons;

class MemberController extends Controller
{


    public function list(Request $request)
    {
        $memberList = Persons::get()->toArray();
        return response()->json($memberList, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
