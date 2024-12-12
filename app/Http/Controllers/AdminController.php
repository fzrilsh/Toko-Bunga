<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function showProducts(){
        $search = request()->input('search');

        $products = Product::query()->paginate(10);
        if($search){
            $products = Product::query()->where('name', 'LIKE', "%{$search}%")->paginate();
        }

        return view('admin.products', ['products' => $products]);
    }

    public function showUpdateProductForm(Product $product = null){
        return view('admin.add-products', ['product' => $product, 'categories' => Category::all()]);
    }

    public function updateProduct(Request $request, Product $product){
        $params = $request->validate([
            'name' => 'required',
            'slug' => function($attr, $value, $fail){
                if(Product::query()->where('slug', Str::slug(request()->input('name')))->first()){
                    $fail("The name for product has already exists.");
                }
            },
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'file|mimes:png,jpeg,jpg,webp',
            'keyword' => 'required',
            'category_id' => 'required|exists:categories,id',
            'types' => 'array',
        ]);
        $params['slug'] = Str::slug(request()->input('name'));

        if(isset($params['image'])){
            $params['image'] = $request->file('image')->storePubliclyAs('products', $params['slug'] . '.png');
            if($product?->image) Storage::disk('public')->delete($product?->image);
        }

        $newProduct = Product::query()->updateOrCreate(['id' => $product->id], $params);
        foreach($params['types'] ?? [] as $key => $type){
            $typ = $newProduct->Types()->getQuery()->find(isset($type['id']) ? $type['id'] : null);

            if(isset($type['image'])){
                $type['image'] = $request->file("types.$key.image")->storePubliclyAs('products', "{$newProduct->name} - {$type['name']}.png");
                if($typ?->image) Storage::disk('public')->delete($typ?->image);
            }

            $newProduct->Types()->updateOrCreate(['id' => isset($type['id']) ? $type['id'] : null], $type);
        }

        return redirect()->route('admin.products');
    }
}
