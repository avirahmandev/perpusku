<?php

namespace App\Http\Controllers;

use App\Models;
use App\Models\Book;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "home",
            "data"  => Book::all()
        ];

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
