<?php

namespace App\Http\Controllers;

use App\Models\viewDorm;
use Illuminate\Http\Request;

class ViewDormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viewDorm');
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
     * @param  \App\Models\viewDorm  $viewDorm
     * @return \Illuminate\Http\Response
     */
    public function show(viewDorm $viewDorm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\viewDorm  $viewDorm
     * @return \Illuminate\Http\Response
     */
    public function edit(viewDorm $viewDorm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\viewDorm  $viewDorm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, viewDorm $viewDorm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\viewDorm  $viewDorm
     * @return \Illuminate\Http\Response
     */
    public function destroy(viewDorm $viewDorm)
    {
        //
    }
}
