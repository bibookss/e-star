<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DormController extends Controller
{
    /**
     * Display a listing of the dorm.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dorms = Dorm::all();
        return response()->json($dorms);
    }

    /**
     * Store a newly created dorm in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location $location
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Location $location)
    {
        $newDorm = new Dorm($request->all());
        $location->dorms()->save($newDorm);
    
        return response()->json($newDorm);
    }

    /**
     * Display the specified dorm.
     *
     * @param  \App\Models\Dorm $dorm
     * @return \Illuminate\Http\Response
     */
    public function show(Dorm $dorm)
    {
        return response()->json($dorm);
    }

    /**
     * Update the specified dorm in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dorm $dorm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dorm $dorm)
    {
        $dorm->update($request->all());
        return response()->json($dorm);
    }

    /**
     * Remove the specified dorm from storage.
     *
     * @param  \App\Models\Dorm $dorm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dorm $dorm)
    {
        $dorm->delete();
        return response()->json(Dorm::all());
    }
}
