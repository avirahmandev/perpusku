<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterRequest $request)
    {

        User::create([
            "nama_lengkap"  => request('nama_lengkap'),
            "email"  => request('email'),
            "slug"  => request('slug'),
            "password"  => request('password')
        ]);

        return response("Daftar Berhasil!");
    }
}
