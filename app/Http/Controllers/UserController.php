<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException; //find or fail error exception class (findOrFail())
use Illuminate\Support\Facades\Input;

class UserController extends Controller {
  public function showProfile($id) {
      $user = User::findOrFail($id); // get the user

      return view('pages.profile', ['user' => $user]);
  }

  public function showHighlights() {

    $newProducts = Product::orderBy('launchdate', 'desc')->take(5)->get();
    $bestSmartphones = Product::where('categoryname', 'Smartphones')->orderBy('score', 'desc')->take(5)->get();
    $bestLaptops = Product::where('categoryname', 'Laptops')->orderBy('score', 'desc')->take(5)->get();

    return view('pages.home', ['newProducts' => $newProducts, 'bestSmartphones' => $bestSmartphones, 'bestLaptops' => $bestLaptops]);
  }

  public function showAllUsers() {
    $allUsers = User::all();
    $allUsers = $allUsers->sortBy('name');

    return view('pages.adminManageUsers', ['allUsers' => $allUsers]);
  }

  public static function destroy(Request $request) {  
    User::where('id', $request->id)->delete();
  }

  public static function updateProfileData($id, Request $request) {
    if ($request->phonenumber == "") {
      User::where('id', $id)->update(['name'=> $request->username, 'password' => $request->password , 'email' => $request->email]);
    }
    else {
      User::where('id', $id)->update(['name'=> $request->username, 'password' => $request->password , 'email' => $request->email, 'phonenumber' => $request->phonenumber]);
    }

    return redirect('profile/' . $id);
  }
  
}