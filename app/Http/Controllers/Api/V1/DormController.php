<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\School;
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
    public function getAllDorms(Request $request) {
        try {
            sleep(1);
            $filter = new DormsFilter();
            $filterItems = $filter->transform($request);

            // Get pagination parameters from the request
            $perPage = $request->input('perPage', 10);
            $page = $request->input('page', 1);

            if (!$perPage && !$page) {
                $dorms = Dorm::where($filterItems)->get();

                return response()->json([
                    'status' => 200,
                    'message' => 'Successfully retrieved dorms.',
                    'total' => $dorms->total(),
                    'data' => new DormCollection($dorms)
                ]);
            }

            $dorms = Dorm::where($filterItems)->paginate($perPage, ['*'], 'page', $page);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved dorms.',
                'total' => $dorms->total(),
                'data' => new DormCollection($dorms)
            ]); 
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }


    public function getDorm($id)
    {
        try {
            $dorm = Dorm::findOrFail($id);
            $data = new DormResource($dorm);

            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved dorm.',
                'data' => $data
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => 'Dorm not found.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Something went wrong.',
                'data' => $e->getMessage()
            ]);
        }
    }

    public function createDorm(StoreDormRequest $request)
    {
        try {
            $location = Location::findOrFail($request->locationId);

            $newDorm = new Dorm([
                "name" => $request->name
            ]);

            $location->dorms()->save($newDorm);
        
            $data = new DormResource($newDorm);

            // Associate dorm with schools
            if ($request->schools) {
                foreach($request->schools as $schoolId) {
                    $school = School::findOrFail($schoolId);
                    $school->dorms()->attach($newDorm);
                }
                $data = new DormResource($newDorm->load('schools'));
            }

            return response()->json([
                'status' => 201,
                'message' => 'Successfully created dorm.',
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

    public function updateDorm(UpdateDormRequest $request, $id)
    {
        try {
            $dorm = Dorm::findOrFail($id);

            $dorm->update([
                "name" => $request->name ?? $dorm->name,
                "schools" => $request->schools ?? $dorm->schools,
            ]);

            // Associate dorm with updated location
            if ($request->locationId) {
                $location = Location::findOrFail($request->locationId);
                $location->dorms()->save($dorm);
            }
            
            // Associate dorm with schools
            if ($request->schools) {
                // Detach all schools
                $dorm->schools()->detach();
                foreach($request->schools as $schoolId) {
                    $school = School::findOrFail($schoolId);
                    $school->dorms()->attach($dorm);
                }
            }

            $data = new DormResource($dorm->load('schools'));

            return response()->json([
                'status' => 200,
                'message' => 'Successfully updated dorm.',
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

    public function deleteDorm($id)
    {
        try {
            $dorm = Dorm::findOrFail($id);

            $dorm->delete();

            return response()->json([
                'status' => 204,
                'message' => 'Successfully deleted dorm.',
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
