<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Authenticatable {
    use Notifiable;
    protected $table = 'orders';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    public static function getUserOrders($userID) {
        $userOrders = Order::where('idusers', $userID);
        
        return $userOrders;
    }
}
