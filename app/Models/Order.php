<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
       'delivery_address',
       'description',
       'total'
    ];

    public function user(){
        return $this->hasMany('App\Models\User');
    }

    public function product(){
        return $this->hasMany('App\Models\Product');
    }

}
