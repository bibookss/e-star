<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DormCollection;

class SearchController extends Controller
{
    public function searchDorms(Request $request)
    {
        $searchParams = [
            'barangay' => $request->input('barangay'),
            'city' => $request->input('city'),
            'street' => $request->input('street'),
            'price' => $request->input('price'),
            'location' => $request->input('locationRating'),
            'security' => $request->input('securityRating'),
            'bathroom' => $request->input('bathroomRating'),
            'internet' => $request->input('internetRating'),
            'overall' => $request->input('overallRating'),
        ];
    
        $query = Dorm::with(['location', 'ratings', 'reviews']);
    
        foreach ($searchParams as $param => $value) {
            if (!empty($value)) {
                if (in_array($param, ['barangay', 'city', 'street'])) {
                    $query->whereHas('location', function ($query) use ($param, $value) {
                        $query->where($param, 'like', "%$value%");
                    });
                } else if (in_array($param, ['location', 'security', 'bathroom', 'internet', 'overall'])) {
                    if ($param === 'overall') {
                        $query->whereHas('ratings', function ($query) use ($value) {
                            $query->whereRaw('(SELECT AVG((location + security + bathroom + internet) / 4) FROM `ratings` WHERE `dorm_id` = `dorms`.`id`) >= ?', [$value]);
                        });
                    } else {
                        $query->whereHas('ratings', function ($query) use ($param, $value) {
                            $query->where($param, '>=', $value);
                        });
                        $query->whereHas('ratings', function ($query) use ($param, $value) {
                            $query->whereRaw('(SELECT AVG(`'.$param.'`) FROM `ratings` WHERE `dorm_id` = `dorms`.`id`) >= ?', [$value]);
                        });
                    }
                } else {
                    $query->where($param, 'like', "%$value%");
                }
            }
        }
    
        $dorms = $query->get();
        return new DormCollection($query->paginate());
    }
}

