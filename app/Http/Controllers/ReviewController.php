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
    if (Auth::check()) {
      $review = New Review;
      $review->idusers = Auth::user()->id;
      $review->idproduct = $request->product_id;
      $review->content = $request->new_review_content;
      $review->rating = $request->new_rating;  
      $review->save();

      return response(200);
    }
    
    return response(401);  
  }

  public function destroy(Request $request) { 
    // $this->authorize('user', Auth::user());
    error_log("review_id: " . $request->userID);
    error_log("review_id: " . $request->productID);

    $review = Review::where('idusers', $request->userID)
                    ->where('idproduct', $request->productID)
                    ->get()
                    ->first();
    
    error_log("review_before : " . $review);

    $review->delete();

    return response(200);
  }

  public function updateReview(Request $request) { 
    // $this->authorize('user', Auth::user());
    error_log("review_id: " . $request->userID);
    error_log("review_id: " . $request->productID);

    $review = Review::where('idusers', $request->userID)
                    ->where('idproduct', $request->productID)
                    ->get()
                    ->first();

    $review->content = $request->newContent;
    $review->save();

    return response(200);
  }
}