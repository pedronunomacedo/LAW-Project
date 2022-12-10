<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Faq;

use \Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
  public function showAllOrders() {
    $allOrderStates = ["In process", "Preparing", "Dispatched", "Delivered", "Cancelled"];

    $allOrders = Order::paginate(20);

    $allOrders = $allOrders->sortBy('id');

    $allOrderWithUser = DB::table('orders')
                            ->join('users', function ($join) {
                                $join->on('orders.idusers', '=', 'users.id');
                            })
                            ->join('address', function ($join) {
                                $join->on('orders.idaddress', '=', 'address.id');
                            })
                            ->orderBy('orderdate', 'DESC')
                            ->get();
    
    $data = $this->paginate($allOrderWithUser);

    return view('pages.adminManageOrders', ['allOrders' => $data, 'allOrderStates' => $allOrderStates]);
  }

  public function paginate($items, $perPage = 20, $page = null, $options = []) {
      $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
      $items = $items instanceof Collection ? $items : Collection::make($items);
      
      return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
        'path' => Paginator::resolveCurrentPath()
      ]);
  }

  public function showAllFAQs() {
    $allFAQs = Faq::all();

    $allFAQs = $allFAQs->sortBy('id');

    return view('pages.adminManageFAQs', ['allFAQs' => $allFAQs]);
  }

  public function saveOrderInfo(Request $request) {
    $order = Order::findOrFail($request->id);

    $order->orderstate = $request->new_order_state;

    $order->save();

    return response('', 200);
  }

  public function updateFAQ(Request $request) {
    $faq = Faq::findOrFail($request->id);

    $faq->question = $request->new_faq_question;
    $faq->answer = $request->new_faq_answer;

    $faq->save();
  }

  public static function destroyFAQ(Request $request) {
    Faq::where('id', $request->id)->delete();
  }

  public function addFAQ(Request $request) {
    $newFAQ = new Faq;

    $newFAQ->question = $request->new_faq_question;
    $newFAQ->answer = $request->new_faq_answer;

    $newFAQ->save();
  }
}