<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Faq;
use App\Models\User;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller {
    public function showOrders() {
        if (Auth::check()) {
            // $this->authorize('show', Auth::id());
            $user = Auth::user();
            $userOrders = Order::where('idusers', '=', $user->id)->get();
            //error_log($userOrders);
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

            foreach ($products as $product) {
                $order->products()->attach($product, array('quantity' => $product->pivot->quantity, 'totalprice' => $product->pivot->quantity * $product->price));
            }

            return response(json_encode("Added new Order"), 200);
        } else {
            return response(json_encode("Something went wrong with the order"), 401);
        }
        
    }

    public function searchOrders(Request $search_request) {
        $this->authorize('admin', Auth::user());

        $allOrdersWithUsername = ($this)->getAllOrdersWithUsername();
        

        $searchOrders = $allOrdersWithUsername->filter(function($item) use ($search_request) {
            return str_contains($item->name, $search_request->search);
        });

        // dd($searchOrders);

        // $searchOrders = Order::where('name','LIKE','%' . $search_request->search . '%')->orderBy('prodname')->paginate(20);
        $allOrderStates = ["In process", "Preparing", "Dispatched", "Delivered", "Cancelled"];
        
        return view('pages.searchOrders', ['searchOrders' => $searchOrders, 'searchStr' => $search_request->search, 'allOrderStates' => $allOrderStates] );
    }

    public static function getAllOrdersWithUsername () {
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
