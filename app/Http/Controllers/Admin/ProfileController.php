<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected function rules()
    {
        return [
            'username' => 'required|string',
            'password' => 'nullable|string|min:8',
        ];
    }

    protected function messages()
    {
        return [
            'username.required' => 'Username wajib diisi.',
            'password.min' => 'Password harus memiliki minimal 8 karakter',
        ];
    }

    public function index()
    {
        return view('admin.profile', ['user' => auth()->guard('web')->user()]);
    }

    public function store(Request $request)
    {
        $params = $request->validate($this->rules(), $this->messages());

        if (isset($params['password'])) {
            $params['password'] = Hash::make($params['password']);
        } else {
            unset($params['password']);
        }

        auth()->guard('web')->user()->update($params);

        return redirect()->route('logout');
    }
}
