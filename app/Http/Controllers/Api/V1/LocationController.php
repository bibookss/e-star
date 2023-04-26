<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Filters\V1\LocationsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\LocationResource;
use App\Http\Resources\V1\LocationCollection;
use App\Http\Requests\V1\StoreLocationRequest;
use App\Http\Requests\V1\UpdateLocationRequest;

class LocationController extends Controller
{
    public function getAllLocations(Request $request)
    {
        try {
            $filter = new LocationsFilter();
            $filterItems = $filter->transform($request);

            $includedDorms = $request->query('includeDorms');

            $locations = Location::where($filterItems);

            if ($includedDorms === 'true') {
                $locations = Location::with('dorms')->where($filterItems);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved locations.',
                'data' => new LocationCollection($locations->paginate()->appends($request->query()))
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function createLocation(StoreLocationRequest $request)
    {
        try {
            $newLocation = new Location($request->all());
            $newLocation->save();
            
            return response()->json([
                'status' => 200,
                'message' => 'Successfully created location.',
                'data' => new LocationResource($newLocation)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function getLocation($id)
    {
        try {
            $location = Location::findOrFail($id);
            
            $includeDorms = request()->query('includeDorms');
            if ($includeDorms === 'true') {
                $location->loadMissing('dorms');
            }

            $data = new LocationResource($location);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved location.',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function updateLocation(UpdateLocationRequest $request, $id)
    {
        try {
            $location = Location::findOrFail($id);

            $location->update([
                'barangay' => $request->barangay ?? $location->barangay,
                'city' => $request->city ?? $location->city,
                'street' => $request->street ?? $location->street
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully updated location.',
                'data' => new LocationResource($location)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function deleteLocation($id)
    {
       try {
            $location = Location::findOrFail($id);
            
            $location->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully deleted location.',
            ]);
        } catch (\Exception $e) {
           return response()->json([
               'status' => 500,
               'message' => 'Something went wrong.',
               'data' => $e->getMessage()
           ]);
       }
    }
}
