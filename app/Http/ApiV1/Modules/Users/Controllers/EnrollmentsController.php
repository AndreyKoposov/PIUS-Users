<?php

namespace App\Http\ApiV1\Modules\Users\Controllers;

use Illuminate\Http\Request;
use App\Domain\Users\Models\Enrollment; 

class EnrollmentsController
{
    public function add(Request $request) {
        $userId = $request->request->get('user_id');
        $courseId = $request->request->get('course_id');
        $isReview = $request->request->get('is_review');
        $isFavorite = $request->request->get('is_favorite');

        $enrollment = Enrollment::create([
            'user_id' => $userId,
            'course_id' => $courseId,
            'is_review' => $isReview,
            'is_favorite' => $isFavorite
        ]);

        return response()->json(['id' => $enrollment->id]);
    }

    public function get(Request $request) {
        $id = $request->route('id');

        $enrollment = Enrollment::find($id);

        return response()->json(['data' => $enrollment]);
    }

    public function delete(Request $request) {
        $id = $request->route('id');

        Enrollment::find($id)->delete();

        return response()->json(['data' => 'success']);
    }
}
