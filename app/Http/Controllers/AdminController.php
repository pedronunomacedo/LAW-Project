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

    $allOrders = Order::all();

    return view('pages.adminManageOrders', ['allOrders' => $allOrders, 'allOrderStates' => $allOrderStates]);
  }

  public function showAllFAQs() {
    $allFAQs = Faq::all();

    $allFAQs = $allFAQs->sortBy('id');

    return view('pages.adminManageFAQs', ['allFAQs' => $allFAQs]);
  }

  public function saveOrderInfo($id) {
    $newState = $_POST['category_selector'];

    $order = Order::findOrFail($id);

    $order->orderstate = $newState;

    $order->save();

    $allOrderStates = ["In process", "Preparing", "Dispatched", "Delivered", "Cancelled"];

    $allOrders = Order::all();

    return view('pages.adminManageOrders', ['allOrders' => $allOrders, 'allOrderStates' => $allOrderStates]);
  }

  public function updateFAQ($id) {
    $newQuestion = $_POST['faq_question'];
    $newAnswer = $_POST['faq_answer'];

    $faq = Faq::findOrFail($id);

    $faq->question = $newQuestion;
    $faq->answer = $newAnswer;

    $faq->save();

    $allFAQs = Faq::all();

    $allFAQs = $allFAQs->sortBy('id');

    return view('pages.adminManageFAQs', ['allFAQs' => $allFAQs]);
  }

  public static function destroyFAQ($id) {  
    $result = Faq::where('id', $id)->delete();

    $allFAQs = Faq::all();

    $allFAQs = $allFAQs->sortBy('id');
 
    return view('pages.adminManageFAQs', ['allFAQs' => $allFAQs]);
  }
}