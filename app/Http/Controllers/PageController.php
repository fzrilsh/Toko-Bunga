<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public Collection $options;

    public function __construct()
    {
        $this->options = Cache::remember('options', 60, function () {
            return Option::all();
        });
    }

    public function index(){
        $pages = Cache::remember('pages', 60, function(){
            return Page::query()->where('status', 'published')->get()->sortBy([['created_at', 'desc']]);
        });

        return view('pages', ['pageTitle' => 'Pages', 'pages' => $pages]);
    }

    public function show(Page $page){
        $nama_aplikasi = $this->options->where('key', 'nama aplikasi')->first()?->value;
        return view('page-detail', ['page' => $page, 'nama_aplikasi' => $nama_aplikasi, 'options' => $this->options]);
    }
}
