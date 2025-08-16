<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'available',
        'photo'
    ];

    public function Order(){
        return $this->belongsTo('App\Models\Order');
    }
}
