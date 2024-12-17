<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'discount',
    ];
}
