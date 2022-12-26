<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException; //find or fail error exception class (findOrFail())
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
  public function showProfile($id) {
      $user = User::findOrFail($id); // get the user

      $this->authorize('show', $user);

      return view('pages.profile', ['user' => $user]);
  }

  public function showAllUsers() {
    $this->authorize('admin', Auth::user());

    $allUsers = User::orderBy('name')->paginate(20);

    return view('pages.adminManageUsers', ['allUsers' => $allUsers]);
  }

  public static function destroy(Request $request) {
    $this->authorize('admin', Auth::user());

    User::where('id', $request->id)->delete();
  }

  public function updateProfileData($id, Request $request) {
    $user = User::findOrFail($id); // get the user

    $this->authorize('editProfile', $user);

    if ($request->phonenumber == "") {
      User::where('id', $id)->update(['name'=> $request->username, 'email' => $request->email]);
    }
    else {
      User::where('id', $id)->update(['name'=> $request->username, 'email' => $request->email, 'phonenumber' => $request->phonenumber]);
    }

    return redirect('profile/' . $id);
  }

  public function searchUsers(Request $search_request) {
    $this->authorize('admin', Auth::user());

    $searchUsers = User::where('name','LIKE','%' . $search_request->search . '%')->orderBy('name')->paginate(20);

    return view('pages.search', ['searchUsers' => $searchUsers, 'searchStr' => $search_request->search] );
  }
}