<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
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
         // Danh sách ảnh cho carousel
    $carouselImages = [
        'carousel2.jpg',
        'carousel1.jpg',
        'carousel3.jpg'
    ];
        return view('home',compact('foods','carouselImages'));
    }
    public function sanpham(Request $request)
    {
        $search = $request->input('search');
    
        $foods = Food::where('categories', 'food')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();
    
        $drinks = Food::where('categories', 'drink')
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();
    
        return view('sanpham', compact('foods', 'drinks', 'search'));
    }
    
    public function gioithieu()
{
    return view('gioithieu');
}
public function donhang()
{
    // Lấy danh sách đơn hàng của người dùng hiện tại
    $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    return view('donhang', compact('orders'));
}
}
