<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            "email"     => "required|email:filter",
            "password"  => "required"
        ]);

        if (Auth::attempt($credentials)) {

            return response()->json([
                "success"   => "Berhasil login!",
                "token"     => Auth::user()->createToken("perpusku-api")->plainTextToken
            ]);
        }

        return response()->json(["error" => "Login gagal."]);
    }
}
