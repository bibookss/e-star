<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Filters\V1\DormsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DormResource;
use App\Http\Resources\V1\DormCollection;
use App\Http\Requests\V1\StoreDormRequest;

class DormController extends Controller
{
    public function getAllDorms(Request $request)
    {
        $filter = new DormsFilter();
        $filterItems = $filter->transform($request);

        $dorms = Dorm::where($filterItems);

        return new DormCollection($dorms->paginate()->appends($request->query()));
   }

    public function createDorm(StoreDormRequest $request)
    {
        $location = Location::findOrFail($request->locationId);

        $newDorm = new Dorm([
            "name" => $request->name
        ]);

        $location->dorms()->save($newDorm);
    
        return new DormResource($newDorm);
    }

    public function getDorm(Dorm $dorm)
    {
        return new DormResource($dorm);
    }

    public function updateDorm(StoreDormRequest $request, Dorm $dorm)
    {
        $dorm->update($request->all());
        return new DormResource($dorm);
    }

    public function deleteDorm(Dorm $dorm)
    {
        $dorm->delete();
        return response()->json(Dorm::all());
    }
}
