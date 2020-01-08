<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Token extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'expired_at'
    ];

    public function generateToken($expire)
    {
        $this->expired_at = $expire;
        $this->token = Str::random(40);
    }
/*
    public function gallery()
    {
        return $this->belongsTo('App\Gallery');
    }*/
}