<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'key',
        'type',
        'value',
    ];

    public function getRouteKeyName()
    {
        return 'key';
    }
}
