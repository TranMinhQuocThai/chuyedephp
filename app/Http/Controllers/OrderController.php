<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderDetail;
use App\Models\Cart;
class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        $orders = Order::with('user')->get(); // Lấy tất cả đơn hàng cùng thông tin người đặt
        return view('Order.index', compact('orders'));
    }
    

    // Form tạo đơn hàng
    public function create()
    {
        return view('orders.create');
    }

    // Lưu đơn hàng vào DB
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // 1. Thêm đơn hàng vào bảng 'orders'
            $order = Order::create([
                'user_id' => Auth::id(),
                'phone' => $request->phone,
                'payment_method' => $request->payment_method,
                'address' => $request->address,
                'total_amount' => str_replace('.', '', $request->total_amount),
                'order_status' => 'Chưa gửi',
            ]);

            // 2. Lấy các món trong giỏ hàng
            $cartItems = Cart::where('user_id', Auth::id())->get();

            // 3. Thêm từng món vào bảng 'order_details'
            foreach ($cartItems as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'food_id' => $item->food_id,
                    'quantity' => $item->quantity,
                    'price' => $item->food->price,
                ]);
            }

            // 4. Xóa giỏ hàng sau khi đặt hàng
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();
            return redirect()->route('cart.index')->with('success', 'Đặt món thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
    

    // Chi tiết đơn hàng
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Form chỉnh sửa đơn hàng
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    // Cập nhật đơn hàng
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'phone' => 'required|string',
            'payment_method' => 'required|string',
            'address' => 'required|string',
            'total_amount' => 'required|numeric',
            'order_status' => 'required|string',
        ]);

        $order->update($request->all());

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được cập nhật!');
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        // Tìm đơn hàng theo ID và kiểm tra quyền sở hữu
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    
        // Xóa đơn hàng
        $order->delete();
    
        // Chuyển hướng về trang danh sách đơn hàng
        return redirect('/donhang')->with('success', 'Đơn hàng đã được xóa thành công và giỏ hàng đã được xóa!');
    }

    public function adminDestroy($id)
{
    // Tìm đơn hàng theo ID
    $order = Order::findOrFail($id);

    // Xóa đơn hàng
    $order->delete();

    // Chuyển hướng về trang danh sách đơn hàng
    return redirect('/order')->with('success', 'Đơn hàng đã được xóa thành công.');
}


    public function markDelivered($id)
{
    $order = Order::findOrFail($id);
    $order->order_status = 'Đã gửi';
    $order->save();

    return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được cập nhật thành Đã giao.');
}

public function getOrderDetails($id)
{
    $details = DB::table('order_details')
        ->join('food', 'order_details.food_id', '=', 'food.id')
        ->where('order_id', $id)
        ->select('food.name as food_name', 'order_details.quantity', 'order_details.price')
        ->get();

    return response()->json($details);
}


}
