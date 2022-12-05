<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function showWishlist(Request $request)
    {

        if (Auth::check()) {

            $user = Auth::user();
            //$this->authorize('edit', $user);
            $products = $user->wishlist()->get();
        }
        return view('pages.wishlist', ['products' => $products]);

    }

    public function addWishlistProduct(Request $request)
    {
        $product = Product::findOrFail($request->id);
        if ($product != NULL) {

            if (Auth::check()) {
                $user = Auth::user();
                error_log('0');
                error_log($user->wishlist()->get());
                error_log('1');
                Auth::user()->wishlist()->attach($product);
                return $wishlist;

            } else {
                return route('login');  //not working
            }
        }
    }
}
