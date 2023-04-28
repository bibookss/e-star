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
    public function searchDorms(Request $request)
    {
        $filter = new SearchFilter();
        $filterItems = $filter->transform($request);
        $dorms = $filter->apply($filterItems);

        return new DormCollection($dorms->get());
    }
}

