<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class ProductsController extends Controller {
  public function showHighlights(){

    $newProducts = Product::orderBy('launchdate', 'desc')->take(5)->get();
    $bestSmartphones = Product::where('categoryname', 'Smartphones')->orderBy('score', 'desc')->take(5)->get();
    $bestLaptops = Product::where('categoryname', 'Laptops')->orderBy('score', 'desc')->take(5)->get();

    return view('pages.home', ['newProducts' => $newProducts, 'bestSmartphones' => $bestSmartphones, 'bestLaptops' => $bestLaptops]);
  }
  
  public function showAllProducts() {
    $allProducts = Product::all();
    $allProducts = $allProducts->sortByDesc('launchdate');
    $allCategories = ["Smartphones", "Components", "TVs", "Laptops", "Desktops", "Others"];

    return view('pages.adminManageProducts', ['allProducts' => $allProducts, 'allCategories' => $allCategories]);
  }

  public static function destroy($id) {  
 
    $result = Product::where('id', $id)->delete();
 
    return redirect('adminManageProducts');
  }

  public static function updateProduct($id, $parameter, $newValue) {
    $result = Product::where('id', $id)->update([$parameter => $newValue]);
  }
}