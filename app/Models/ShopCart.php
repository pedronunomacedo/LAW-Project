<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShopCart extends Model {
    protected $table = 'ShopCart';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    protected $guarded = [];

}