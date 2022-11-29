<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function showOrders(Request $request)
    {

        if ($product != null) {

            if (Auth::check()) {

                $user = Auth::user();
                //$this->authorize('edit', $user);
                $product = $user->orders()->get();
            }
            return view('pages.orders', ['products' => $products]);
        }
    }

    public function addOrdersProduct(Request $request)
    {
        error_log('00');
        error_log(Auth::user()->orders()->get());
        error_log('11');
        if (1) {

            if (Auth::check()) {
                error_log('0');
                $order = new Order;
                error_log('1');
                $order->idusers = Auth::user()->id;
                error_log('2');
                //$order-> missing order parameters !;
                //$wishlist = Wishlist::create(['idusers' => '1', 'idproduct' => '2']);
                error_log($order);
                $order->save();  //not working
                return $order;

            } else {
                return route('login');  //not working
            }
        }
    }
}
