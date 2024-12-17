<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        $options = Option::all();
        return view('admin.configuration', ['options' => $options]);
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'options' => 'required|array'
        ]);

        foreach($params['options'] as $key => $option){
            Option::query()->updateOrCreate(['key' => strtolower($key)], [
                'key' => strtolower($key),
                ...$option
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

        return redirect()->route('admin.configuration.index');
    }
}
