<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShopCart;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopCartController extends Controller
{
    public function showShopCart(Request $request)
    {

        if (Auth::check()) {

            $user = Auth::user();
            //$this->authorize('edit', $user);
            $products = $user->shopcart()->join(DB::raw('(select distinct on (idproduct) * from productimages order by idproduct asc) as img'), function ($join) {
                $join->on('product.id', '=', 'img.idproduct');})->get();
        }
        return view('pages.shopcart', ['products' => $products]);
    }

    public function addShopCartProduct(Request $request)
    {   
        $product = Product::findOrFail($request->id);
        if ($product != NULL) {

            if (Auth::check()) {
                $user = Auth::user();
                if($user->wishlist()->where('idproduct', $request->id)->count() > 0){
                    return response(json_encode("You already have this product in your Shopcart"), 401);
                }
                Auth::user()->shopcart()->attach($product, array('quantity' => 1));
                return response(json_encode("Product added to Shopcart"), 200);

            } else {
                return response(json_encode("You need to Login first"), 401);
            }
        }
    }
}
