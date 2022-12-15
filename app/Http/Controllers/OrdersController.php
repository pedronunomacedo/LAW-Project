<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller {
    public function showOrders() {

        if (Auth::check()) {

            $user = Auth::user();
            $userOrders = Order::where('idusers', Auth::id())->get();
        }

        return view('pages.orders', ['userOrders' => $userOrders]);
    }

    public function addOrdersProduct(Request $request) {
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

    public function searchOrders(Request $search_request) {
        $this->authorize('admin', Auth::user());

        $allOrdersWithUsername = ($this)->getAllOrdersWithUsername();
        $searchProducts = Order::where('idusers','LIKE','%' . $search_request->search . '%')->orderBy('prodname')->paginate(20);
        
        return view('pages.searchProducts', ['searchProducts' => $searchProducts, 'searchStr' => $search_request->search] );
    }

    public static function getAllOrdersWithUsername () {
        $this->authorize('admin', Auth::user());
        
        $allOrdersWithUsername = DB::table('orders')
                                ->join('users', function ($join) {
                                    $join->on('orders.idusers', '=', 'users.id');
                                })
                                ->join('address', function ($join) {
                                    $join->on('orders.idaddress', '=', 'address.id');
                                })
                                ->orderBy('orderdate', 'DESC')
                                ->get();

        return $allOrdersWithUsername;
    }
}
