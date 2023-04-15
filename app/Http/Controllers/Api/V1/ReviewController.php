<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Dorm;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Filters\V1\ReviewsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ReviewResource;
use App\Http\Resources\V1\ReviewCollection;

class ReviewController extends Controller
{
    public function getAllReviews(Request $request)
    {
        $filter = new ReviewsFilter();
        $filterItems = $filter->transform($request);

        // $includeRating = $request->query('includeRating');

        $reviews = Review::where($filterItems);

        return new ReviewCollection($reviews->paginate()->appends($request->query()));
    }

    public function createReview(StoreReviewRequest $request)
    {
        $user = User::findOrFail($request->userId);
        $dorm = Dorm::findOrFail($request->dormId);

        $newReview = $user->reviews()->create([
            'dorm_id' => $dorm->id,
            'review_body' => $request->reviewBody,
        ]);

        return response()->json($newReview);
    }

    public function getReview(Review $review)
    {
        return new ReviewResource($review);
    }

    public function updateReview(StoreReviewRequest $request, Review $review)
    {   
        $review->update([
            'review_body' => $request->reviewBody
        ]);
        return new ReviewResource($review);
    }

    public function deleteReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return new ReviewCollection(Review::all());
    }
}
