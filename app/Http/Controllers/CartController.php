<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Food; // Giả sử model của sản phẩm là 'Food'
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Drink; // Giả sử model của sản phẩm là 'Food'

class CartController extends Controller{
    public function addToCart(Request $request)
    {
        // Kiểm tra người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $userId = Auth::id();
        $foodId = $request->input('food_id');
        $quantity = $request->input('quantity', 1);

        // Kiểm tra sản phẩm có tồn tại
        $food = Food::find($foodId);
        if (!$food) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cartItem = Cart::where('user_id', $userId)->where('food_id', $foodId)->first();

        if ($cartItem) {
            // Nếu đã có, cập nhật số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu chưa, tạo mới
            Cart::create([
                'user_id' => $userId,
                'food_id' => $foodId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    // Phương thức hiển thị giỏ hàng
    public function viewCart()
{
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
    }

    // Lấy ID của người dùng hiện tại
    $userId = Auth::id();

    // Truy vấn các mục giỏ hàng của người dùng
    $cartItems = Cart::where('user_id', $userId)->with('drink')->get();

    // Tính tổng tiền
    $total = $cartItems->sum(function($item) {
        return $item->food->price * $item->quantity;
    });

    // Truyền dữ liệu giỏ hàng và tổng tiền tới view
    return view('giohang', compact('cartItems', 'total'));
}

    // Xóa món ăn khỏi giỏ hàng
    public function removeFromCart(Request $request)
    {
        // Kiểm tra người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này.');
        }

        $userId = Auth::id();
        $foodId = $request->input('food_id');

        // Tìm mục giỏ hàng tương ứng
        $cartItem = Cart::where('user_id', $userId)->where('food_id', $foodId)->first();

        if ($cartItem) {
            // Xóa mục khỏi giỏ hàng
            $cartItem->delete();
            return redirect()->route('cart.view')->with('success', 'Món ăn đã được xóa khỏi giỏ hàng.');
        } else {
            return redirect()->route('cart.view')->with('error', 'Món ăn không tồn tại trong giỏ hàng.');
        }
    }

    public function addToCartdrink(Request $request)
    {
        // Kiểm tra người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $userId = Auth::id();
        $drinkId = $request->input('drink_id');
        $quantity = $request->input('quantity', 1);

        // Kiểm tra sản phẩm có tồn tại
        $drink = Drink::find($drinkId);
        if (!$drink) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cartItem = Cart::where('user_id', $userId)->where('id', $drinkId)->first();

        if ($cartItem) {
            // Nếu đã có, cập nhật số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu chưa, tạo mới
            Cart::create([
                'user_id' => $userId,
                'food_id' => $drinkId,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    // Phương thức hiển thị giỏ hàng
    public function viewCartdrink()
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng.');
        }

        // Lấy ID của người dùng hiện tại
        $userId = Auth::id();

        // Truy vấn các mục giỏ hàng của người dùng
        $cartItems = Cart::where('user_id', $userId)->with('drink')->get();

        // Tính tổng tiền
        $total = $cartItems->sum(function($item) {
            return $item->drink->price * $item->quantity;
        });

        // Truyền dữ liệu giỏ hàng và tổng tiền tới view
        return view('giohang', compact('cartItems', 'total'));
    }

    // Xóa món uống khỏi giỏ hàng
    public function removeFromCartđrink(Request $request)
    {
        // Kiểm tra người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thực hiện thao tác này.');
        }

        $userId = Auth::id();
        $drinkId = $request->input('drink_id');

        // Tìm mục giỏ hàng tương ứng
        $cartItem = Cart::where('user_id', $userId)->where('drink_id', $drinkId)->first();

        if ($cartItem) {
            // Xóa mục khỏi giỏ hàng
            $cartItem->delete();
            return redirect()->route('cart.view')->with('success', 'Món uống đã được xóa khỏi giỏ hàng.');
        } else {
            return redirect()->route('cart.view')->with('error', 'Món uống không tồn tại trong giỏ hàng.');
        }
    }

}

