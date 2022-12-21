<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Faq;
use App\Models\User;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller {
    public function showOrders() {
        if (Auth::check()) {
            // $this->authorize('show', Auth::id());
            $user = Auth::user();
            $userOrders = Order::where('idusers', Auth::id())
                                ->join('productorder', function ($join) {
                                    $join->on('id', '=', 'productorder.idorders');
                                })
                                ->get();
        }

        return view('pages.orders', ['userOrders' => $userOrders]);
    }

    public function addOrdersProduct(Request $request) {
        
        if (Auth::check()) {
            $user = Auth::user();
            $order = new Order;
            $order->idaddress = $request->id;
            $order->idusers = $user->id;
            $order->save();
            $products = $user->shopcart()->get();
        
            $purchase_products = [];
            foreach ($products as $product) {
                $product_info = array('quantity' => $product->pivot->quantity, 'totalprice' => number_format($product->price, 2, '.', ''));
                $purchase_products[$product->id] = $product_info;
            }
            error_log('0');
            $order->productOrder()->sync($purchase_products, false);
            error_log('1');

            return response(json_encode("Added new Order"), 200);
        } else {
            return response(json_encode("Something went wrong with the order"), 401);
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
