<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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

    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';

        $products = $this->defaultProducts->groupBy('category');
        if ($search) {
            $products = $this->defaultProducts
                ->toQuery()
                ->where(function(Builder $query) use($search){
                    $query->orWhere('keyword', 'LIKE', "%{$search}%")
                        ->orWhere('name', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
                })
                ->get()
                ->groupBy('category');
        }

        return view('products')->with([
            'pageTitle' => 'Products',
            'search' => $search,
            'products' => $products,
            'options' => $this->options,
            'nama_aplikasi' => $this->options->where('key', 'nama aplikasi')->first()?->value
        ]);
    }

    public function show(Product $product)
    {
        $type = ProductType::query()->find(request()->input('type'));
        $products = $this->defaultProducts
            ->toQuery()
            ->whereNot('slug', $product->slug)
            ->orderBy(DB::raw('RAND()'))
            ->get()
            ->take(10);

        // $product->update([
        //     'viewers' => $product->viewers++,
        // ]);

        $product->filteredType = $product->types;
        if ($type) {
            $product->filteredType = collect($product->types)->filter(fn($v) => $v['id'] !== $type->id);
            $product->filteredType->push($product);
        }

        return view('product-detail')->with([
            'pageTitle' => "{$product->name}",
            'product' => $product,
            'products' => $products,
            'selectedType' => $type,
            'options' => $this->options,
            'nama_aplikasi' => $this->options->where('key', 'nama aplikasi')->first()?->value
        ]);
    }
}
