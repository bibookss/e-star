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
use App\Http\Requests\V1\StoreReviewRequest;
use App\Http\Requests\V1\UpdateReviewRequest;

class ReviewController extends Controller
{
    public function getAllReviews(Request $request)
    {
        $filter = new ReviewsFilter();
        $filterItems = $filter->transform($request);

        $reviews = Review::where($filterItems);

        return new ReviewCollection($reviews->paginate()->appends($request->query()));
    }

    public function createReview(StoreReviewRequest $request)
    {
        $user = auth()->user();
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

    public function updateReview(UpdateReviewRequest $request, Review $review)
    {   
        if (Review::where('id', $review->id)->where('user_id', auth()->id())->doesntExist()) {
            return response()->json([
                'message' => 'You are not authorized to update this rating.'
            ], 403);
        }


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
