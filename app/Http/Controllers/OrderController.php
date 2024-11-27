<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            return redirect('/home');
        }
        $orders = Order::all();
        $promotion = Promotion::find(0);
        return view('order', ['orders' => $orders, 'promotion' => $promotion]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($order, $product)
    {
        if (!isset($_SESSION['user_id'])) {
            return redirect('/home');
        }
        $order_id = Order::find($order);
        $product_id = Product::find($product);
        if ($order_id == null) {
            $order = new Order();
            $order->user_id = $_SESSION['user_id'];
            $order->order_status = 0;
            $order->order_total = $product_id->price;
            $order->save();
            $order->products()->attach([$product_id->id], ['quality' => 1, 'unit_price' => $product_id->price, 'sub_total' => $product_id->price]);
            return redirect('/home');
        }
        if ($order_id->user_id != $_SESSION['user_id']) {
            return redirect()->back()->with('error','Không tồn tại giỏ hàng');
        }
        if ($product_id == []) {
            return redirect('/order')->with('error','Không tồn tại sản phẩm');
        }
        if ($order_id->order_status == 0) {
            foreach ($order_id->products()->get(['product_id']) as $order_product) {
                if ($order_product->product_id == $product) {
                    $quality = $order_id->products()->where([['product_id', $product],['order_id', $order]])->get(['quality']);
                    $newquality = $quality[0]->quality + 1;
                    DB::table('order_product')->where([['product_id', $product],['order_id', $order]])->update(
                        ['quality' => $newquality],[ 'sub_total' => $product_id->price, 'updated_at' => now()]
                    );
                    return redirect('/home');
                }
            }
            DB::table('order_product')->insert(
                ['product_id' => $product , 
                'order_id' => $order , 
                'quality' => 1 , 
                'unit_price' => $product_id->price, 
                'sub_total' => $product_id->price, 
                'created_at' => now()]
            );
            return redirect('/home');
        }
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::find($order->id);
        if ($order->user_id != $_SESSION['user_id']) {
            return redirect()->back()->with('error','Không tồn tại giỏ hàng');
        } 
        $products = $order->Products()->get();
        if ($products == '[]') {
            return redirect()->back()->with('error','Không có sản phẩm trong giỏ hàng');
        }
        $total = 0;
        $subtotal = 0;
        foreach ($products as $product) {
            $product_id = "id_".$product->id;
            $product_price = $product->price;
            $quality = $request->$product_id;
            // $total += $product_price * $quality;
            if (is_numeric($quality) == 0 || $quality <= 0) {
                return redirect()->back()->with('error','Số lượng sản phẩm ko được bằng 0');
            }
            $subtotal = $product_price * $quality;
            DB::table('order_product')->where([['product_id', $product->id],['order_id', $order->id]])->update(
                ['quality' => $quality, 'sub_total' => $subtotal, 'updated_at' => now()]
            );

        }
        // echo($products);
        return redirect()->back()->with('success','Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order, $product, $csrf)
    {
        if ($csrf == 'token=' . csrf_token()) {
            $order_id = Order::find($order);
            $order_id->products()->detach($product);
        }
        return redirect()->back();
    }

    public function checkout($promotion) {
        if (!isset($_SESSION['order_id'])) {
            return redirect()->back()->with('error','Không có sản phẩm trong giỏ hàng');
        }
        if (!isset($_SESSION['user_id'])) {
            return redirect()->back();
        }
        $promotion_id = null;
        if ($promotion != "null") {
            $promotion = Promotion::where('name', $promotion)->get();
            $promotion_id = $promotion[0]->id;
        }
        $user = User::find($_SESSION['user_id']);
        $order = Order::find($_SESSION['order_id']);
        $orderDetails = DB::table('order_product')->where(['order_id' => $_SESSION['order_id']])->get();
        if ($orderDetails == '[]') {
            return redirect()->back()->with('error','Không có sản phẩm trong giỏ hàng');
        }
        $total = 0;
        foreach ($orderDetails as $orderDetail) {
            $total += $orderDetail->sub_total;
        }
        // dd($order);
        $order->update(['promotion_id' => $promotion_id, 'order_total' => $total]);
        $products = $order->Products()->get();
        return view('checkout', ['user' => $user , 'orderDetails' => $orderDetails , 'products' => $products , 'promotion' => $promotion]);
    }

    public function purchase()
    {
        $orders = Order::where(['user_id' => $_SESSION['user_id']])->get();
        $user = User::find($_SESSION['user_id']);
        return view('purchase', ['orders' => $orders, 'user' => $user]);
    }

    public function purchaseDetail($order_id)
    {
        $order = Order::find($order_id);
        if ($order->user_id == $_SESSION['user_id'] && $order->order_status == 1) {
            $order_product = $order->products()->get();
            return view('purchaseDetail', ['products' => $order_product, 'order_id' => $order_id]);
        }
        return redirect('home');
    }
}
