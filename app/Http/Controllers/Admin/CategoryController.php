<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected function rules(){
        return [
            'text' => ['required', request()->routeIs('admin.categories.store') ? 'unique:categories,text' : '']
        ];
    }

    protected function messages(){
        return [
            'text.required' => 'Nama kategori wajib diisi.',
            'text.unique' => 'Nama kategori telah dipakai.'
        ];
    }

    public function index()
    {
        $search = request()->input('search');

        $categories = Category::query()->paginate(10);
        if ($search) {
            $categories = Category::query()->where('text', 'LIKE', "%{$search}%")->paginate();
        }

        return view('admin.categories', ['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.add-category', ['category' => null]);
    }

    public function store(Request $request)
    {
        $params = $request->validate($this->rules(), $this->messages());
        $params['slug'] = Str::slug($params['text']);

        Category::query()->create($params);
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.add-category', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
        $params = $request->validate([
            'text' => ['required', function($attr, $value, $fail) use($category){
                if($category->text !== $value && Category::query()->where('text', $value)->first()) $fail('Nama kategori telah dipakai.');
            }]
        ], $this->messages());
        $params['slug'] = Str::slug($params['text']);

        $category->update($params);
        return redirect()->route('admin.categories.edit', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
