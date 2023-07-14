<?php

namespace App;

use App\Motor;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable = ['nama_variasi', 'motor_id'];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id', 'id');
    }
}
