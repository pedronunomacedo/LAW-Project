<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopCartController extends Controller
{
    public function showShopCart(Request $request)
    {

        if ($product != null) {

            if (Auth::check()) {

                $user = Auth::user();
                //$this->authorize('edit', $user);
                $product = $user->shopcart()->get();
            }
            return view('pages.shopcart', ['products' => $products]);
        }
    }

    public function addShopCartProduct(Request $request)
    {   
        if (1) {
            if (Auth::check()) {
                error_log('0');
                $shopcart = new ShopCart;
                error_log('1');
                $shopcart->idusers = Auth::user()->id;
                error_log('2');
                $shopcart->idproduct = $request->id;
                //$wishlist = Wishlist::create(['idusers' => '1', 'idproduct' => '2']);
                error_log($shopcart);
                //$shopcart->save(); //---- error mass assignement on save, maybe cause no PK in DB table
                return $shopcart;

            } else {
                error_log('redirect to login');
                return route('login'); //not working !
            }
        }
    }
}
