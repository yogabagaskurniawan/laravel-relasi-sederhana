<?php

namespace App;

use App\User;
use App\Variant;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = ['nama', 'sku', 'warna', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function variant()
    {
        return $this->hasMany(Variant::class, 'motor_id', 'id');
    }
}
