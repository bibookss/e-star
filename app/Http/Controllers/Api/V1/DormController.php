<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
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
     * Show the form for creating a new dorm.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created dorm in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dorm_name' => 'required|max:255',
            'dorm_address' => 'required|max:255',
        ]);

        $newDorm = new Dorm([
            'dorm_name' => $request->get('dorm_name'),
            'dorm_address' => $request->get('dorm_address'),
        ]);

        $newDorm->save();

        return response()->json($newDorm);
    }

    /**
     * Display the specified dorm.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dorm = Dorm::findOrFail($id);
        return response()->json($dorm);
    }

    /**
     * Show the form for editing the specified dorm.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified dorm in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dorm = Dorm::findOrFail($id);

        $request->validate([
            'dorm_name' => 'required|max:255',
            'dorm_address' => 'required|max:255',
        ]);

        $dorm->dorm_name = $request->get('dorm_name');
        $dorm->dorm_address = $request->get('dorm_address');

        $dorm->save();

        return response()->json($dorm);
    }

    /**
     * Remove the specified dorm from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dorm = Dorm::findOrFail($id);
        $dorm->delete();
      
        $dorms = Dorm::all();
        return response()->json($dorms);
    }
}
