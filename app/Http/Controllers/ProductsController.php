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

    $newProducts = Product::orderBy('launchdate', 'desc')->take(5)->join('productimages', function ($join) {
                                                                          $join->on('productimages.idproduct', '=', 'product.id');
                                                                      })->get();
    $bestSmartphones = Product::where('categoryname', 'Smartphones')->orderBy('score', 'desc')->take(5)->get();
    $bestLaptops = Product::where('categoryname', 'Laptops')->orderBy('score', 'desc')->take(5)->get();


    error_log($newProducts);
    return view('pages.home', ['newProducts' => $newProducts, 'bestSmartphones' => $bestSmartphones, 'bestLaptops' => $bestLaptops]);
  }
  
  public function showAllProducts() {
    $allProducts = Product::orderBy('prodname', 'ASC')->paginate(20);
    $allCategories = ["Smartphones", "Components", "TVs", "Laptops", "Desktops", "Others"];

    return view('pages.adminManageProducts', ['allProducts' => $allProducts, 'allCategories' => $allCategories]);
  }

  public static function destroy(Request $request) {  
    Product::where('id', $request->id)->delete();
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

  public function searchProducts(Request $search_request){
    $searchProducts = Product::where('prodname','LIKE','%' . $search_request->search . '%')->orderBy('prodname')->paginate(20);
    return view('pages.searchProducts', ['searchProducts' => $searchProducts, 'searchStr' => $search_request->search] );
  }

  public function searchMainPageProducts(Request $search_request) {
    $searchProducts = Product::where('prodname','LIKE','%' . $search_request->search . '%')->orderBy('prodname')->paginate(20);
    return view('pages.searchMainPageProducts', ['searchProducts' => $searchProducts, 'searchStr' => $search_request->search] );
  }

  public function addProduct(Request $request) {
    $product = New Product;

    $product->prodname = $request->new_product_name;
    $product->price = $request->new_product_price;
    $product->proddescription = $request->new_product_description;
    $product->launchdate = $request->new_product_launchdate;
    $product->stock = $request->new_product_stock;
    $product->categoryname = $request->new_product_category;

    $product->save();

    return response()->json(array('product' => $product), 200);
  }

  public function showCategoryProducts(Request $request) {
    $categoryProducts = Product::where('categoryname', $request->category)->paginate(20);

    return view('pages.category', ['categoryProducts' => $categoryProducts, 'category' => $request->category]);
  }
}