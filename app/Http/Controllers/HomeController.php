<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use App\Models\Book;


class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "home",
            "data"  => Book::all()
        ];

        // dd(Book::all());

        return view('home/home', $data);
    }

    public function about()
    {
        return view('home/about');
    }

    public function contact()
    {
        return view('home/contact');
    }
    
}
