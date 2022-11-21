<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException; //find or fail error exception class (findOrFail())

class UserController extends Controller
{
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

  public static function destroy($id) {  
 
    $result = User::where('id', $id)->delete();
 
    return redirect('adminManageUsers');
  }
  
}