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
use App\Http\Requests\V1\UpdateRatingRequest;

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
        $user = auth()->user();
        $dorm = Dorm::findOrFail($request->dormId);

        $newRating = $user->ratings()->create([
            'dorm_id' => $dorm->id,
            'review_id' => $request->reviewId,
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

    public function updateRating(UpdateRatingRequest $request, Rating $rating)
    {
        if (Rating::where('id', $rating->id)->where('user_id', auth()->id())->doesntExist()) {
            return response()->json([
                'message' => 'You are not authorized to update this rating.'
            ], 403);
        }

        $rating->update([
            'location' => $request->locationRating ?? $rating->location,
            'security' => $request->securityRating ?? $rating->security,
            'internet' => $request->internetRating ?? $rating->internet,
            'bathroom' => $request->bathroomRating ?? $rating->bathroom
        ]);

        $rating->save();
        
        return new RatingResource($rating);
    }

    public function deleteRating(Rating $rating)
    {
        $rating->delete();
        return new RatingCollection(Rating::all());
    }
}
