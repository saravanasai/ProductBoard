<?php

namespace App\Http\Controllers\Api\KeyRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\KeyRequest\KeyRequestResource;
use App\Models\KeyRequest\KeyRequest;
use Illuminate\Http\Request;

class RequestKeyMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $new_requests=KeyRequest::query()
         ->where('request_is_processed',0)
         ->with('Product')
         ->paginate(5);

         return KeyRequestResource::collection($new_requests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
