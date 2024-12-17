<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected function rules(){
        return [
            'name' => ['required', request()->routeIs('admin.products.store') ? 'unique:products,name' : ''],
            'description' => 'required|min:100',
            'price' => 'required|numeric|min:0|max:9999999999',
            'discount' => 'required|numeric',
            'image' => [request()->routeIs('admin.products.store') ? 'required' : '', 'file', 'mimes:png,jpeg,jpg,webp'],
            'keyword' => 'required',
            'category_id' => 'required|exists:categories,id',
            'types' => 'nullable|array',
        ];
    }

    protected function messages(){
        return [
            'name.required' => 'Nama produk wajib diisi.',
            'name.unique' => 'Nama produk telah dipakai.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'description.min' => 'Deskripsi produk harus memiliki minimal 100 karakter.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga produk harus berupa angka.',
            'price.max' => 'Harga produk maximal Rp. 9.999.999.999',
            'discount.required' => 'Diskon produk wajib diisi.',
            'discount.numeric' => 'Diskon produk harus berupa angka.',
            'image.required' => 'Gambar produk wajib diisi.',
            'image.file' => 'Gambar produk harus berupa file.',
            'image.mimes' => 'Gambar produk harus memiliki extensi file png, jpeg, jpg, atau webp.',
            'keyword.required' => 'Kata kunci wajib diisi.',
            'category_id' => 'Kategori produk wajib diisi.',
        ];
    }

    public function index()
    {
        $search = request()->input('search');

        $products = Product::query()->paginate(10);
        if ($search) {
            $products = Product::query()->where('name', 'LIKE', "%{$search}%")->paginate();
        }

        return view('admin.products', ['products' => $products]);
    }

    public function create()
    {
        return view('admin.add-products', ['product' => null, 'categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $params = $request->validate($this->rules(), $this->messages());
        $params['slug'] = Str::slug($params['name']);

        if (isset($params['image'])) {
            $params['image'] = $request->file('image')->storePubliclyAs('products', $params['slug'].'.png');
        }

        $product = Product::query()->create($params);
        if (isset($params['discount'])) {
            $product->Discount()->create($params);
        }

        foreach($params['types'] ?? [] as $key => $type){
            if (isset($type['image'])) {
                $type['image'] = $request->file("types.$key.image")->storePubliclyAs('products', "{$product->name} - {$type['name']}.png");
            }

            $product->Types()->create($type);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        return view('admin.add-products', ['product' => $product, 'categories' => Category::all()]);
    }

    public function update(Request $request, Product $product)
    {
        $params = $request->validate($this->rules(), $this->messages());
        $params['slug'] = Str::slug(request()->input('name'));
        $params['types'] = isset($params['types']) ? $params['types'] : [];

        if (isset($params['image'])) {
            if ($product?->image) {
                Storage::disk('public')->delete($product?->image);
            }
            
            $params['image'] = $request->file('image')->storePubliclyAs('products', $params['slug'].'.png');
        }

        $product->update($params);
        if (isset($params['discount']) && $params['discount'] > 0) {
            $product->Discount()->updateOrCreate(['id' => $product->discount['id']], $params);
        } else {
            $product->Discount()->delete();
        }

        foreach ($params['types'] as $key => $type) {
            $typeId = isset($type['id']) ? $type['id'] : null;
            $oldType = $product->Types()->getQuery()->find($typeId);

            if (isset($type['image'])) {
                if ($oldType?->image) {
                    Storage::disk('public')->delete($oldType->image);
                }
                
                $type['image'] = $request->file("types.$key.image")->storePubliclyAs('products', "{$product->name} - {$type['name']}.png");
            }
            
            $newProduct = $product->Types()->updateOrCreate(['id' => $typeId], $type);
            $params['types'][$key]['id'] = $newProduct->id;
        }

        $types = collect($params['types']);
        $product->Types()->get()->each(function ($type) use ($types) {
            if (! $types->where('id', $type->id)->first()) {
                Storage::disk('public')->delete($type->image);
                $type->delete();
            }
        });

        return back();
    }

    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);
        $product->Types()->get()->each(function ($type) {
            Storage::disk('public')->delete($type->image);
        });

        $product->delete();
        return back();
    }
}
