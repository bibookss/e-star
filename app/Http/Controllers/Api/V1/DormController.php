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
use App\Http\Requests\V1\UpdateDormRequest;

class DormController extends Controller
{
    public function getAllDorms(Request $request)
    {
        $filter = new DormsFilter();
        $filterItems = $filter->transform($request);

        $includeReviews = $request->query('includeReviews');
        
        $dorms = Dorm::where($filterItems);

        if ($includeReviews === 'true') {
            $dorms = Dorm::with('reviews')->where($filterItems);
        } 
        
        // without paginate 
        //         return new DormCollection($dorms->get()); 
        return new DormCollection($dorms->paginate()->appends($request->query()));
   }

    public function getDorm(Dorm $dorm)
    {
        $includeReviews = request()->query('includeReviews');

        if ($includeReviews === 'true') {
            return new DormResource($dorm->loadMissing('reviews'));
        }

        return new DormResource($dorm);
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

    public function updateDorm(UpdateDormRequest $request, Dorm $dorm)
    {
        $dorm->update([
            "name" => $request->name
        ]);
        return new DormResource($dorm);
    }

    public function deleteDorm(Dorm $dorm)
    {
        $dorm->delete();
        return response()->json(Dorm::all());
    }
}
