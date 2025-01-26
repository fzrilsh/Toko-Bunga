<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function showConfigurationForm()
    {
        $options = Option::all();

        return view('admin.configuration', ['options' => $options]);
    }

    public function showPages()
    {
        $search = request()->input('search');

        $pages = Page::query()->paginate(10);
        if ($search) {
            $pages = Page::query()->where('title', 'LIKE', "%{$search}%")->paginate();
        }

        return view('admin.pages', ['pages' => $pages]);
    }

    public function updateConfiguration(Request $request)
    {
        $params = $request->validate([
            'options' => 'required|array',
        ]);

        foreach ($params['options'] as $key => $option) {
            Option::query()->updateOrCreate(['key' => strtolower($key)], [
                'key' => strtolower($key),
                ...$option,
            ]);

            unset($params['options'][$key]);
            $params['options'][strtolower($key)] = $option;
        }

        $options = $params['options'];
        Option::all()->each(function ($option) use ($options) {
            if (! isset($options[$option->key])) {
                $option->delete();
            }
        });

        return back();
    }

    public function showUpdatePageForm(?Page $page = null)
    {
        return view('admin.add-page');
    }
}
