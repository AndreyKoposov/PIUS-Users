<?php

namespace App\Http\ApiV1\Modules\Users\Controllers;

use Illuminate\Http\Request;
use App\Domain\Users\Models\Step;

class StepsController
{
    public function add(Request $request) {
        $enrollmentId = $request->request->get('enrollment_id');
        $stepId = $request->request->get('step_id');
        $isComplete = $request->request->get('is_complete');

        $step = Step::create([
            'enrollment_id' => $enrollmentId,
            'step_id' => $stepId,
            'is_complete' => $isComplete,
        ]);

        return response()->json(['id' => $step->id]);
    }

    public function get(Request $request) {
        $id = $request->route('id');

        $step = Step::find($id);

        return response()->json(['data' => $step]);
    }

    public function delete(Request $request) {
        $id = $request->route('id');

        Step::find($id)->delete();

        return response()->json(['data' => 'success']);
    }
}
