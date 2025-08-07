<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function getMajors($facultyId)
    {
        $majors = Major::where('faculty_id', $facultyId)
            ->orderBy('id')
            ->get(['id', 'nama_fakultas']);

        return response()->json($majors);
    }
}
