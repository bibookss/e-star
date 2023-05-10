<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use Illuminate\Http\Request;
use App\Filters\V1\SearchFilter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DormCollection;

class SearchController extends Controller
{
    public function filterDorms(Request $request)
    {
        $filter = new SearchFilter();
        $filterItems = $filter->transform($request);
        $dorms = $filter->apply($filterItems);

        return new DormCollection($dorms->get());
    }

    public function searchDorms(Request $request) {
        $filter = new SearchFilter();
        $searchTerms = $filter->transform($request);
        
        // Get pagination parameters from the request
        $perPage = $request->input('perPage', 12);
        $page = $request->input('page', 1);

        $query = Dorm::with(['location']);

        if (count($searchTerms) === 0) {
            return new DormCollection($query->get());
        }
        
        $words = explode(' ', $searchTerms[0][2]);
        foreach ($words as $word) {
            $operator = 'LIKE';
            $value = '%'.$word.'%';


            $query->orWhereHas('location', function ($query) use ($operator, $value) {
                $query->where('dorms.location_id', '=', 'locations.id');
                $query->orWhere('barangay', $operator, $value);
                $query->orWhere('city', $operator, $value);
                $query->orWhere('street', $operator, $value);
                $query->orWhere('name', $operator, $value);
            });

            \Log::debug($query->toSql());
        }

        $dormCount = $query->count();
        $dorms = new DormCollection($query->paginate($perPage, ['*'], 'page', $page));

        return response()->json([
            'status' => 200,
            'message' => 'Successfully retrieved dorms.',
            'total' => $dormCount,
            'data' => $dorms
        ]); 
    }
}

