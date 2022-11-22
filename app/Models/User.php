<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUser($id) {
        $user = DB::table('users')
                ->where('id', '=', $id);
        
        return $user;
    }

    public function isAdmin() {
        $admin = DB::table('administrator')
                 ->where('id', '=', $this->id)
                 ->first();

        if (empty($admin)) return false;
        else return true;
    }

    public function wishlist() {
        return $this->belongsToMany('App\Models\Product', 'wishlist');
    }

    public function shopcart(){
        return $this->belongsToMany('App\Models\Product', 'shopcart')
                    ->withPivot('quantity');
    }
}
