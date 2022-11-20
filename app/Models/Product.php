<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $table = 'product';

  public function getAllProducts() {
    $allProducts = Product::all();

    return $allProducts;
  }

  public static function destroy($product){

    $report = $product;      
 
    $rsltDelRec = Product::find($report->id);
 
    $rsltDelRec->delete();        
    $request->session()->flash('alert-success', ' Report is deleted successfully.');
 
    return redirect()->route('/adminManageProducts');
 }
}