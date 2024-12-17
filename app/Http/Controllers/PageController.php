<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function index(){
        $pages = Cache::remember('pages', 60, function(){
            return Page::query()->where('status', 'published')->get()->sortBy([['created_at', 'desc']]);
        });

        return view('pages', ['pageTitle' => 'Pages', 'pages' => $pages]);
    }

    public function show(Page $page){
        return view('page-detail', ['page' => $page]);
    }
}
