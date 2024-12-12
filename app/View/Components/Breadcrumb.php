<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public function with(){
        $segments = request()->segments();

        $url = '';
        foreach ($segments as $segment) {
            $url .= '/' . $segment;
            $breadcrumbs[] = [
                'name' => ucfirst(str_replace('-', ' ', $segment)),
                'url' => $url
            ];
        }

        return [
            'breadcrumbs' => $breadcrumbs
        ];
    }

    public function render(): View|Closure|string
    {
        return view('components.breadcrumb', $this->with());
    }
}
