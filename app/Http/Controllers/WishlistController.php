<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        // dd($wishlist);
        return view('wishlist', ['wishlist' => $wishlist]);
    }
    public function addwishlist($user_id, $product)
    {

        $wishlist = Wishlist::where('product_id', $product)->where('user_id', $user_id)->exists();
        if ($wishlist) {
            return redirect()->back();
        } else {
            DB::table('wishlists')->insert(
                [
                    'product_id' => $product,
                    'user_id' => $user_id,
                    'created_at' => now()
                ]
            );
            return redirect('/wishlist');
        }
    }

    // if ($order_id->order_status == 0) {
    //     foreach ($order_id->products()->get(['product_id']) as $order_product) {
    //         if ($order_product->product_id == $product) {
    //             $quality = $order_id->products()->where([['product_id', $product], ['order_id', $order]])->get(['quality']);
    //             $newquality = $quality[0]->quality + 1;
    //             DB::table('order_product')->where([['product_id', $product], ['order_id', $order]])->update(
    //                 ['quality' => $newquality],
    //                 ['sub_total' => $product_id->price, 'updated_at' => now()]
    //             );

    // DB::table('order_product')->insert(
    //     [
    //         'product_id' => $product,
    //         'order_id' => $order,
    //         'quality' => 1,
    //         'unit_price' => $product_id->price,
    //         'sub_total' => $product_id->price,
    //         'created_at' => now()
    //     ]
    // );


    public function destroy($product_id, $csrf)
    {
        if ($csrf == 'token=' . csrf_token()) {

            Wishlist::where('product_id', $product_id)->where('user_id', $_SESSION['user_id'])->delete();
        }
        return redirect()->back();
    }
}