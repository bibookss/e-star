<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\School;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Filters\V1\SchoolsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SchoolResource;
use App\Http\Resources\V1\SchoolCollection;
use App\Http\Requests\V1\StoreSchoolRequest;
use App\Http\Requests\V1\UpdateSchoolRequest;

class SchoolController extends Controller
{
    public function getAllSchools(Request $request)
    {
        try {
            $filter = new SchoolsFilter();
            $filterItems = $filter->transform($request);

            $includeDorms = $request->query('includeDorms');

            $schools = School::where($filterItems);

            if ($includeDorms === 'true') {
                $schools = School::with('dorms')->where($filterItems);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved schools.',
                'data' => new SchoolCollection($schools->get())
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function createSchool(StoreSchoolRequest $request)
    {
        try {
            $location = Location::findOrFail($request->locationId);

            $newSchool = School::create([
                'name' => $request->name,
                'location_id' => $location->id
            ]);

            $location->schools()->save($newSchool);

            // Associate school with dorms
            if ($request->dorms) {
                foreach($request->dorms as $dormId) {
                    $dorm = Dorm::findOrFail($dormId);
                    $dorm->schools()->attach($newSchool);
                }
            }

            return response()->json([
                'status' => 200,
                'message' => 'Successfully created school.',
                'data' => new SchoolResource($newSchool)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function getSchool($id)
    {
        try {
            $school = School::findOrFail($id);

            $includeDorms = request()->query('includeDorms');

            if ($includeDorms === 'true') {
                $school->loadMissing('dorms');
            }

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved school.',
                'data' => new SchoolResource($school)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function updateSchool(UpdateSchoolRequest $request, $id)
    {
        try {
            $school = School::findOrFail($id);

            $school->update([
                'name' => $request->name ?? $school->name,
            ]);

            if ($request->locationId) {
                $location = Location::findOrFail($request->locationId);
                $location->schools()->save($school);
            }

            // Associate school with dorms
            if ($request->dorms) {
                // Detach all dorms
                $school->dorms()->detach();

                foreach($request->dorms as $dormId) {
                    $dorm = Dorm::findOrFail($dormId);
                    $dorm->schools()->attach($school);
                }
            }

            return response()->json([
                'status' => 200,
                'message' => 'Successfully updated school.',
                'data' => new SchoolResource($school)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function deleteSchool($id)
    {
        try {
            $school = School::findOrFail($id);

            $school->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Successfully deleted school.'
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
