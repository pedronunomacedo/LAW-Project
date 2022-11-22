<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use session;

class ShopCartController extends Controller
{
    public function addShopCartProduct(Request $request)
    {

        $product = Product::findOrFail($request->id);

        if ($product != null) {

            if (Auth::check()) {

                $user = Auth::user();
                $this->authorize('edit', $user);
                $user->shopcart()->attach($product);

            } else {
                return route('login');
            }
        }
        return response(json_encode("Product added to Wishlist"), 200);
    }
}
