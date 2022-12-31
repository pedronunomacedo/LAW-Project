<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\ProductImages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class ReviewController extends Controller {
  public function addReview(Request $request) {
    $newReview = $request->newReview;
    $newRating = $request->review_starts_selector;
  }
}