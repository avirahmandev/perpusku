<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function profile()
    {
        $data = [
            "title" => "profile",
            "data"  => User::find(auth()->user()->id)
        ];
        
        return view('user/profile', $data);
    }

    public function books()
    {

        $query = Book::latest();
        $sortby = request('sortby');
        $category = request('category');

        if (($sortby !== null) && ($sortby !== 'terbaru'))
        {
            $query->where($sortby, 1);
        }

        if (($category !== null) && ($category !== 'all'))
        {
            $query->category($category);
        }


        $data = [
            "title" => "Filter pencarian",
            "data"  => $query->paginate(6)->withQueryString()
        ];

        return view('user/filter_page', $data);
    }

    public function search(Request $request)
    {
        $books = Book::all();

        if($request->keyword != '') {
            $books = Book::where('judul', 'LIKE', '%'. $request->keyword. '%')->get();
        } else {
            $books = [];
        }

        return response()->json([
            'books' => $books
        ]);
    }

    public function detail(Book $book)
    {
        $data = [
            "title" => "Detail",
            "data"  => $book
        ];

        return view('user/detail', $data);
    }


    public function wishlist()
    {
        $data = [
            "title" => "Favorit",
            "data"  => Book::all()
        ];

        return view('user/wishlist', $data);
    }

    public function borrowed()
    {
        $data = [
            "title" => "Buku Dipinjam",
            "data"  => Book::all()
        ];

        return view('user/borrowed', $data);
    }

    public function register()
    {
        $data = [
            "title" => "register",
            "data"  => ""
        ];

        return view('user/register', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "nama_lengkap"  => "required|min:3|max:255",
            "email"         => "required|email:filter|unique:users",
            "slug"          => "required",
            "password"      => "required|min:6|max:255"
        ]);

        User::create($validatedData);

        return redirect('/login')->with("daftarBerhasil", "Daftar berhasil. Silahkan masuk!");
    }

    public function login()
    {
        $data = [
            "title" => "login",
            "data"  => ""
        ];

        return view('user/login', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email:filter",
            "password" => "required"
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('loginBerhasil', 'Berhasil masuk!');
        }

        return back()->with('loginError', 'Gagal masuk, coba lagi!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logoutBerhasil', 'Berhasil keluar!');
    }

}
