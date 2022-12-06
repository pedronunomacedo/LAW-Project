<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Model {
    protected $table = 'Orders';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public static function getUserOrders($userID) {
        $userOrders = Order::where('idusers', $userID);
        
        return $userOrders;
    }
}
