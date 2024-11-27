<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Promotion;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        $promotion = $request->input('promotion');
        if (strlen($promotion) != 6) {
            return redirect()->back()->with('error','Mã giảm giá phải có 6 ký tự');
        }
        $orders = Order::all();
        $promotion = Promotion::query()->where('name','LIKE','%'.$promotion.'%')->get();
        if ($promotion == '[]') {
            return redirect()->back()->with('error','Bạn đã nhập sai mã ưu đãi');
        }
        if (!isset($_SESSION['user_id'])) {
            return redirect('login');
        }

        return view('order',['orders' => $orders, 'promotion' => $promotion]);
    }
}
