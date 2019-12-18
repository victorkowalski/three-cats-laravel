<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'unique_name',
        'price'
    ];

    public function images()
    {
        return $this->hasMany('App\Models\ProductProperties');
    }
}
