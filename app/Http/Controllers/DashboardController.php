<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public Collection $defaultProducts;

    public Collection $options;

    public function __construct()
    {
        $this->defaultProducts = Cache::remember('products', 60, function () {
            return Product::all();
        });

        $this->options = Cache::remember('options', 60, function () {
            return Option::all();
        });
    }

    public function with()
    {
        $byCategory = $this->defaultProducts->groupBy('category');
        $diminati = $this->defaultProducts->take(5);
        if($diminati->count()){
            $diminati = $this->defaultProducts->toQuery()->orderByDesc('viewers')->get()->take(5);
        }

        return [
            'pageTitle' => 'Dashboard',
            'options' => $this->options,
            'diminati' => $diminati,
            'byCategory' => $byCategory,
        ];
    }

    public function index()
    {
        return view('dashboard', $this->with());
    }
}
