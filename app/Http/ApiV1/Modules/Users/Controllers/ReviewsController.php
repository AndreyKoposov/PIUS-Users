<?php

namespace App\Http\ApiV1\Modules\Users\Controllers;

use Illuminate\Http\Request;
use App\Domain\Users\Models\Review;

class ReviewsController
{
    public function add(Request $request) {
        $enrollmentId = $request->request->get('enrollment_id');
        $reviewId = $request->request->get('review_id');
        $isLiked = $request->request->get('is_liked');

        $review = Review::create([
            'enrollment_id' => $enrollmentId,
            'review_id' => $reviewId,
            'is_liked' => $isLiked,
        ]);

        return response()->json(['id' => $review->id]);
    }

    public function get(Request $request) {
        $id = $request->route('id');

        $review = Review::find($id);

        return response()->json(['data' => $review]);
    }

    public function delete(Request $request) {
        $id = $request->route('id');

        Review::find($id)->delete();

        return response()->json(['data' => 'success']);
    }
}
