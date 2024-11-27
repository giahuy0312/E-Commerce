<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function index()
    {
        return view('admin.content.listVoucher', [
            'vouchers' => Voucher::all(),
        ]);
    }

    public function create()
    {
        return view('admin.content.addVoucher');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:vouchers',
            'discount' => 'required|numeric|min:0|max:100',
            'expiration_date' => 'required|date',
        ]);

        $voucher = new Voucher();
        $voucher->code = $request->input('code');
        $voucher->discount = $request->input('discount');
        $voucher->expiration_date = $request->input('expiration_date');
        $voucher->save();

        return redirect()->route('listvoucher');
    }

   
    public function edit(Voucher $voucher)
    {
        return view('admin.content.editVoucher', [
            'voucher' => $voucher,
        ]);
    }

    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'code' => 'required|unique:vouchers,code,' . $voucher->id,
            'discount' => 'required|numeric|min:0|max:100',
            'expiration_date' => 'required|date',
        ]);

        $voucher->code = $request->input('code');
        $voucher->discount = $request->input('discount');
        $voucher->expiration_date = $request->input('expiration_date');
        $voucher->save();

        return redirect()->route('listvoucher');
    }

    public function destroy($id)
    {
        $product = Voucher::findOrFail($id);
        $product->delete();
    
        return redirect()->route('listvoucher')->with('success', 'Product deleted successfully');
    }
    public function searchDiscount(Request $request) {
        $keyword = $request->keyword;
        $vouchers = Voucher::where('discount', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.content.listSearchVoucher', compact('vouchers'));
    }
    public function searchDate(Request $request) {
        $keyword = $request->keyword;
        $vouchers = Voucher::where('expiration_date', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.content.listSearchVoucher', compact('vouchers'));
    }
    public function listVoucher()
    {
        $vouchers = Voucher::paginate(5);

        return view('admin.content.listVoucher', [
            'vouchers' => $vouchers,
        ]);
    }
}
