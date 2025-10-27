<?php

namespace App\Actions\Role\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;

class DeleteTeacher extends Controller
{
    public function destroy($id)
    {
        Teacher::findOrFail($id)->delete();
        return response()->json([
            'data'=> null,
            'message'=>'Data deleted successfully!'
        ],204);
    }
}