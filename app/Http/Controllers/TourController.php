<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourCollection;
use App\Models\Tour;

class TourController extends Controller
{
    public function index() {
        return new TourCollection(Tour::all());
    }
}
