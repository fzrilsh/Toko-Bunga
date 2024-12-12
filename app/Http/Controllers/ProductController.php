<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public Collection $defaultProducts;

    public function __construct()
    {
        $this->defaultProducts = Cache::remember('products', 60 * 10 * 3, function(){
            return Product::all();
        });
    }

    public function index(Request $request){
        $search = $request->input('search') ?? '';

        $products = $this->defaultProducts->groupBy('category');
        if($search) $products = $this->defaultProducts->toQuery()->where('keyword', 'LIKE', "%{$search}%")->get()->groupBy('category');

        return view('products')->with(['pageTitle' => 'Products', 'search' => $search, 'products' => $products]);
    }

    public function show(Product $product){
        $type = ProductType::query()->find(request()->input('type'));
        $products = $this->defaultProducts->toQuery()->where('slug', '!=', $product->slug)->orderBy(DB::raw('RAND()'))->get()->take(10);

        $product->update([
            'viewers' => $product->viewers++
        ]);

        return view('product-detail')->with(['pageTitle' => "{$product->name}", 'product' => $product, 'products' => $products, 'selectedType' => $type]);
    }
}
