<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function scopeKey(Builder $query, string $key)
    {
        return $query->where('key', $key)->first();
    }
}
