<?php

namespace App\Http\Controllers\Api\KeyRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\KeyRequest\KeyGenerationRequest;
use App\Models\KeyRequest\KeyRequest;
use Illuminate\Http\Request;

class KeyRequestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(KeyGenerationRequest $request)
    {

        $data = [
            "request_product_id" => $request->productId,
            "request_domine" => $request->domine,
            "request_ip" => $request->ip(),
            "request_username" => $request->username,
            "request_email" => $request->email,
        ];

        $is_requested = KeyRequest::updateOrCreate(
            ['request_ip' => $request->ip(), 'request_product_id' => $request->productId],
            $data
        );


        $response = ["message" => "Request For Product Activation is Sent"];
        return  $is_requested
            ? response(json_encode($response), 201)->header('Content-Type', 'application/json')
            : response(json_encode($response), 401)->header('Content-Type', 'application/json');
    }
}
