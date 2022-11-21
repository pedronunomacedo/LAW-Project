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

    return view('pages.adminManageFAQs', ['allFAQs' => $allFAQs]);
  }
}