<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StringValueService;

class StringValueController extends Controller
{
    // The service responsible for string value operations
    protected $stringValueService;

    //Constructor for the controller
    public function __construct(StringValueService $stringValueService)
    {
        $this->stringValueService = $stringValueService;
    }

    //Method handles the http request to calculate the maximun string value
    public function maxStringValue(Request $request)
    {   //Validate the incoming request data
        $data = $request->validate([
            't' => 'required|string'
        ]);
        //Pass the t value to the service
        $result = $this->stringValueService->maxStringValue($data['t']);
        //Return the result as a JSON response
        return response()->json(['result' => $result]);
    }
}
