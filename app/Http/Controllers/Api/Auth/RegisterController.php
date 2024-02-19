<?php

namespace App\Http\Controllers\Api\Auth;

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

        $registered = User::create([
            "nama_lengkap"  => request('nama_lengkap'),
            "email"  => request('email'),
            "slug"  => request('slug'),
            "password"  => request('password')
        ]);

        $token = $registered->createToken("perpusku-api")->plainTextToken;

        return response()->json([
            "success"   => "Daftar berhasil!",
            "token"     => $token
        ]);
    }
}
