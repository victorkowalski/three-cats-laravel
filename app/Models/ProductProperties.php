<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProperties extends Model
{
    protected $fillable = [
        'product_id',
        'image'
    ];
/*
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }*/
}
