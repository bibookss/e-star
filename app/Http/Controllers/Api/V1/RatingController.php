<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Filters\V1\RatingsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\RatingResource;
use App\Http\Resources\V1\RatingCollection;
use App\Http\Requests\V1\StoreRatingRequest;

class RatingController extends Controller
{
    public function getAllRatings(Request $request) 
    {
        $filter = new RatingsFilter();
        $filterItems = $filter->transform($request);
        
        $overallRating = $request->query('overallRating');

        $ratings = Rating::where($filterItems);
    
        return new RatingCollection($ratings->paginate()->appends($request->query()));
    }

    public function createRating(StoreRatingRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        $dorm = Dorm::findOrFail($request->dorm_id);

        $newRating = $user->ratings()->create([
            'dorm_id' => $dorm->id,
            'location' => $request->locationRating,
            'security' => $request->securityRating,
            'internet' => $request->internetRating,
            'bathroom' => $request->bathroomRating,
        ]);
        
        return response()->json($newRating);
    }

    public function getRating(Rating $rating)
    {
        return new RatingResource($rating);
    }

    public function updateRating(StoreRatingRequest $request, Rating $rating)
    {
        $rating->update($request->all());
        return new RatingResource($rating);
    }

    public function deleteRating(Rating $rating)
    {
        $rating->delete();
        return new RatingCollection(Rating::all());
    }
}
