<?php

namespace App\Http\Controllers;

use App\Models\Dorms;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get('http://localhost:8000/api/v1/dorms');
        $dorms = json_decode($response->getBody()->getContents(), true);
        return view ('dorms', compact('dorms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Dorms  $dorms
     * @return \Illuminate\Http\Response
     */
    public function show(Dorms $dorms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dorms  $dorms
     * @return \Illuminate\Http\Response
     */
    public function edit(Dorms $dorms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dorms  $dorms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dorms $dorms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dorms  $dorms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dorms $dorms)
    {
        //
    }
}
