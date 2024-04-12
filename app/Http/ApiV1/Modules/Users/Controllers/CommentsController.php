<?php

namespace App\Http\ApiV1\Modules\Users\Controllers;

use Illuminate\Http\Request;
use App\Domain\Users\Models\Comment; 

class CommentsController
{
    public function add(Request $request) {
        $stepId = $request->request->get('step_id');
        $commentId = $request->request->get('comment_id');
        $isLiked = $request->request->get('is_liked');

        $comment = Comment::create([
            'step_id' => $stepId,
            'comment_id' => $commentId,
            'is_liked' => $isLiked
        ]);

        return response()->json(['id' => $comment->id]);
    }

    public function get(Request $request) {
        $id = $request->route('id');

        $comment = Comment::find($id);

        return response()->json(['data' => $comment]);
    }

    public function delete(Request $request) {
        $id = $request->route('id');

        Comment::find($id)->delete();

        return response()->json(['data' => 'success']);
    }
}
