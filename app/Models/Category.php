<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'text',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
