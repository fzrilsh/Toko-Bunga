<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    protected function rules(){
        return [
            'title' => ['required', request()->routeIs('admin.pages.store') ? 'unique:pages,title' : ''],
            'content' => 'required|min:10',
            'featured_image' => ['file', 'mimes:png,jpeg,jpg,webp'],
            'status' => 'required|in:published,draft'
        ];
    }

    protected function messages(){
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.unique' => 'Judul telah dipakai.',
            'content.required' => 'Konten wajib diisi.',
            'content.min' => 'Konten harus memiliki lebih dari 10 karakter',
            'featured_image.required' => 'Gambar unggulan wajib diisi.',
            'featured_image.file' => 'Gambar unggulan harus berupa file.',
            'featured_image.mimes' => 'Gambar unggulan harus memiliki extensi: png, jpeg, jpg, atau webp.',
            'status.required' => 'Status wajib diisi.',
        ];
    }

    public function index()
    {
        $search = request()->input('search');

        $pages = Page::query()->paginate(10);
        if ($search) {
            $pages = Page::query()->where('title', 'LIKE', "%{$search}%")->paginate();
        }

        return view('admin.pages', ['pages' => $pages]);
    }

    public function create()
    {
        return view('admin.add-page', ['page' => null]);
    }

    public function store(Request $request)
    {
        $params = $request->validate($this->rules(), $this->messages());
        $params['slug'] = Str::slug($params['title']);

        if (isset($params['featured_image'])) {
            $params['featured_image'] = $request->file('featured_image')->storePubliclyAs('pages', $params['slug'].'.png');
        }

        $page = Page::query()->create($params);
        return redirect()->route('admin.pages.edit', $page);
    }

    public function edit(Page $page)
    {
        return view('admin.add-page', ['page' => $page]);
    }

    public function update(Request $request, Page $page)
    {
        $params = $request->validate($this->rules(), $this->messages());
        $params['slug'] = Str::slug($params['title']);

        if (isset($params['featured_image'])) {
            if ($page?->featured_image) {
                Storage::disk('public')->delete($page?->featured_image);
            }

            $params['featured_image'] = $request->file('featured_image')->storePubliclyAs('pages', $params['slug'].'.png');
        }

        $page->update($params);
        return back();
    }

    public function destroy(Page $page)
    {
        Storage::disk('public')->delete($page->featured_image);
        $page->delete();

        return back();
    }
}
