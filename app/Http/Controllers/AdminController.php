<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Faq;

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
                            ->get();

    return view('pages.adminManageOrders', ['allOrders' => $allOrderWithUser, 'allOrderStates' => $allOrderStates]);
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