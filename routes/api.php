<?php

use Illuminate\Support\Facades\Route;

Route::get('/get-majors/{facultyId}', [\App\Http\Controllers\Api\MajorController::class, 'getMajors']);
