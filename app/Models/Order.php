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
        return $this->belongsTo('App\Models\User');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function scopeNames($orders, $query)
    {
        if (trim($query)) {
            $orders->where('delivery_address', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->orWhereHas('user', function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('phone', 'LIKE', '%' . $query . '%');
            })
            ->orWhereHas('product', function ($q) use ($query) {
                $q->where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('price', 'LIKE', '%' . $query . '%');
            });
        }
    }

}
