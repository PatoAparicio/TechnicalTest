<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ChessAttackService;

class ChessAttackController extends Controller
{
    //Method handles the http request to calculate the result in chess attack
    public function queensAttack(Request $request, ChessAttackService $service)
    {   //Validate the incoming request data
        $data = $request->validate([
            'n' => 'required|integer|min:1|max:100000',
            'k' => 'required|integer|min:0|max:100000',
            'rq' => 'required|integer|min:1',
            'cq' => 'required|integer|min:1',
            'obstacles' => 'nullable|array',
            'obstacles.*' => 'array|size:2'
        ]);
        //Pass the values to the service
        $result = $service->calculate(
            $data['n'],
            $data['k'],
            $data['rq'],
            $data['cq'],
            $data['obstacles'] ?? []
        );
        //Return the result as a JSON response
        return response()->json(['result' => $result]);
    }
}
