<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function showWishlist(Request $request)
    {

        if ($product != null) {

            if (Auth::check()) {

                $user = Auth::user();
                $this->authorize('edit', $user);
                $product = $user->wishlist()->get();
            }
            return view('pages.wishlist', ['products' => $products]);
        }
    }

    public function addWishlistProduct(Request $request)
    {
        return redirect('/login');
        if (1) {

            if (Auth::check()) {
                error_log('0');
                $wishlist = new Wishlist;
                error_log('1');
                $wishlist->idusers = Auth::user()->id;
                error_log('2');
                $wishlist->idproduct = $request->id;
                //$wishlist = Wishlist::create(['idusers' => '1', 'idproduct' => '2']);
                error_log($wishlist);
                $wishlist->save();  //not working
                return $wishlist;

            } else {
                return redirect('/login');  //not working
            }
        }
    }
}
