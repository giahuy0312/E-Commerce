<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetpasswordManager extends Controller
{

    public function forgetpassword()
    {
        return view("forgetpassword");
    }
    //xử lý quên email bị quên mật khẩu
    public function forgetpasswordpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);

        // Chèn bản ghi mới vào bảng
        if (DB::table('password_reset_tokens')->where('email', $request->email)->exists()) {
            // Có dữ liệu
            return back()->with('error', 'Đã có mã đặt lại mật khẩu cho email này');
        } else {
            // Không có dữ liệu
            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
        }


        Mail::send('emails.forgetpassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email)->subject('Reset Password');
        });
        return redirect()->to(route('forget.password'))->with('success', 'Chúng tôi đã gửi mail để lấy lại mật khẩu.');
    }
    // tạo mật khẩu mới 
    function resetPasssword($token)
    {
        return view('newpassword', ['token' => $token]);
    }

    function resetPassswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|regex:/^(?=.*[A-Z])(?=.*[@!#&])[A-Za-z0-9@!#&]{8,50}$/',
            'password_confirmation' => 'required|same:password',
        ]);
        $updatePassword = DB::table('password_reset_tokens')
            ->where([

                'email' => $request->email,
                'token' => $request->token,

            ])->first();
        if (!$updatePassword) {
            return redirect()->back()->with('error', 'email không khớp');
        }
        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->to(route('login'))->with('success', 'Password resset sucess');
    }
}
