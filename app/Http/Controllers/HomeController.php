<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Drink;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $foods = Food::limit(15)->get();
        return view('home',compact('foods'));
    }
    public function sanpham(){
        $foods = Food::where('categories', 'food')->get();
        $drinks= Food::where('categories', 'drink')->get();
        return view('sanpham',compact('foods', 'drinks'));
    }
}
