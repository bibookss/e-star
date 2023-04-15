<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Filters\V1\LocationsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\LocationResource;
use App\Http\Resources\V1\LocationCollection;

class LocationController extends Controller
{
    public function getAllLocations(Request $request)
    {
        $filter = new LocationsFilter();
        $filterItems = $filter->transform($request);

        $locations = Location::where($filterItems);

        return new LocationCollection($locations->paginate()->appends($request->query()));
    }

    public function createLocation(StoreLocationRequest $request)
    {
        $newLocation = new Location($request->all());
        $newLocation->save();
        return new LocationResource($newLocation);
    }

    public function getLocation(Location $location)
    {
        return new LocationResource($location);
    }

    public function updateLocation(StoreLocationRequest $request, Location $location)
    {
        $location->update($request->all());
        return new LocationResource($location);
    }

    public function deleteLocation(Location $location)
    {
        $location->delete();

        $locations = Location::all();

        return new LocationCollection($locations);
    }
}
