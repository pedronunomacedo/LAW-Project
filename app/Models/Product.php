<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
  // Don't add create and update timestamps in database.
  public $timestamps  = false;
  protected $fillable = [
    'prodname', 
    'price', 
    'proddescription',
    'launchdate', 
    'stock', 
    'categoryname'
  ];
  protected $table = 'product';

  public function getAllProducts() {
    $allProducts = Product::all();

    return $allProducts;
  }
}