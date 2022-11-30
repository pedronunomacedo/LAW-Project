<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\ProductImages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class ProductsController extends Controller {
  public function showHighlights() {

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

  public static function destroy(Request $request) {  
 
    $result = Product::where('id', $request->id)->delete();
 
    //return redirect('adminManageProducts');
  }

  public static function updateProduct(Request $request) {
    Product::where('id', $request->product_id)->update(['prodname' => $request->product_name, 'price' => $request->product_price, 'proddescription' => $request->product_description, 'launchdate' => $request->product_launchdate, 'stock' => $request->product_stock, 'categoryname' => $request->product_category]);
  }

  public static function showProduct($id) {
    $product = Product::findOrFail($id);
    $productImages = ProductsController::getProductImages($id);
    $productReviews = Review::where('idproduct', $id)->get();
    return view('pages.product', ['product' => $product, 'productImages' => $productImages, 'productReviews' => $productReviews]);
  }

  public static function getProductImages($id) {
    $productImages = ProductImages::where('idproduct', $id)->get('imgpath');

    return $productImages;
  }
}