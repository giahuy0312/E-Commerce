<?php


namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    }
    public function listUser(){
        $users = DB::table('users')->paginate(5);
        return view('admin.content.listUser', ['users' => $users]);
    }
    public function searchUser(Request $request) {
        $search = $request->search;
                $users = User::where('name', 'like', '%' . htmlspecialchars($search) . '%')
                    ->orWhere('email', 'like', '%' . htmlspecialchars($search) . '%')
                    ->paginate(5);
    
        return view('admin.content.listSearchUser', ['users' => $users]);
    }
    
    // delete userAd
    public function deleteUserAD($id){
        $deleteData = DB::table('users')->where('id', '=', $id)->delete();
        return redirect('listUser');
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

    public function show($id)
    {
        // session_start();
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] == $id) {
                $user = User::find($_SESSION['user_id']);
                if(!$user){
                    abort(404);  
                }
                return view('user.show', ['user' => $user]);
            }
        }
     
        abort(404);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // session_start();
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] == $user->id) {
                $user = User::find($_SESSION['user_id']);
                if(!$user){
                    abort(404);  
                }
                return view('user.edit', ['user' => $user]);
            }
        }
       
            abort(404);
        
        // return view('user.edit', ['user' => $user]);
    }
    //change pass
    public function changePass($id){
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] == $id) {
                $user = User::find($_SESSION['user_id']);
                if(!$user){
                    abort(404);  
                }
                return view('user.changePass' ,['user' => $user]);
            }
        }
     
        abort(404);
       
    }


    public function updatePass(Request $request, User $user){
       $user;
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] == $user->id) {
                $user = User::find($_SESSION['user_id']);
            }
        }
       
        else  {
            abort(404);
        }
        $request ->validate([
            'oldPass' =>'required|min:1|max:100',
              'newPass' => 'required|regex:/^(?=.*[A-Z])(?=.*[@!#&])[A-Za-z0-9@!#&]{8,50}$/',
            'comfirmPass' =>'required|same:newPass'
        ]);
        if(Hash::check($request->oldPass,$user->password)){
            $user->update([
               'password' => \bcrypt($request->newPass)
            ]);
           
            return back()->with('success' ,'Change password success.'); 
        }
        else{
            return back()->with('error' ,'Old Password not matched.');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  User $user)
    {
        // session_start();
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['user_id'] == $user->id) {
                $user = User::find($_SESSION['user_id']);
                // return view('user.show', ['user' => $user]);
            }
        }
       
        else  {
            abort(404);
        }
        // abort(404);
      
        $request->validate([
            'name' => 'required|min:5|max:50',
            'phone' =>'nullable|min:10|max:10|regex:/^0\d{9}$/',
            'email' => 'required|min:10|max:50|regex:/^([a-zA-Z0-9]+)([\_\.\-{1}])?([a-zA-Z0-9]+)\@([a-zA-Z0-9]+)([\.])([a-zA-Z\.]+)$/',
            'DOB' => 'nullable|date'
        ]);
     
        $user->username = ($request-> username);
        $user->name = ($request->name);
        $user->phone = ($request->phone);
        $user->email = ($request->email);
        $user->DOB = ($request->DOB);

        if($request->gender == "Male" || $request->gender == "Female" || $request->gender =="Other"){
            $user->gender = $request->gender;
        };
        $user->save();
        return redirect()->route('user.show', ['user' => $user->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login(User $user)
    {
        return view("login");
    }
    public function logout(Request $request)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        if (Auth::logout()) {
            return redirect('/login');
        }
        return redirect('/home');
    }

    //xử lý đăng nhập
    public function loginpost(Request $request)
    {
        $rules = [

            'email' => 'required|min:10|max:50|regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
            'password' => 'required|regex:/^(?=.*[A-Z])(?=.*[@!#&])[A-Za-z0-9@!#&]{8,50}$/',
        ];
        $message = [

            'required' => ':attribute bắt buộc phải nhập.',
            'min:10' => ':attribute không được nhập dưới 10 ký tự.',
            'max:50' => ':attribute không được nhập trên 50 ký tự.',

            'email' => [
                'regex' => ':attribute sai định đạng email'
            ],
            'password' => [
                'regex' => [
                    'message' => ':attribute phải có ít nhất một ký đặc biệt(!,#,@) và 1 chữ in Hoa(A-Z), tối thiểu 8 ký tự và tối đa 50 ký tự '
                ]
            ]
        ];
        $attribute = [
            'email' => 'Email',
            'password' => 'Mật khẩu',

        ];

        $validator = Validator::make($request->all(), $rules, $message, $attribute);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $credetail = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (filled($credetail)) {
            // Kiểm tra xem người dùng có hợp lệ hay không
            if (Auth::attempt($credetail)) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                $user = Auth::user();
                $_SESSION['user_id'] =  $user->id;
                return redirect('/home')->with('success', 'Login successfully');
            } else {
                return back()->with('error', 'Email or Password incorrect');
            }
        } else {
            // Báo lỗi nếu dữ liệu chưa được nhập đầy đủ
            return back()->with('error', 'Please fill in all required fields');
        }
    }



    public function register(Request $request)
    {
        return view("register");
    }
    //xử lý đăng ký
    public function registerpost(Request $request)
    {
        $rules = [
            'name' => 'required|min:5|max:50',
            'email' => 'required|min:10|max:50|regex:/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
            'password' => 'required|regex:/^(?=.*[A-Z])(?=.*[@!#&])[A-Za-z0-9@!#&]{8,50}$/',
            'password_confirmation' => 'required|same:password',
        ];
        $message = [

            'required' => ':attribute bắt buộc phải nhập.',
            'min:10' => ':attribute không được nhập dưới 5 ký tự.',
            'max:50' => ':attribute không được nhập trên 50 ký tự.',
            'same' => 'Mật khẩu không khớp',
            'email' => [
                'regex' => ':attribute sai định đạng email'
            ],
            'password' => [
                'regex' => [
                    'message' => ':attribute phải có ít nhất một ký đặc biệt(!,#,@) và 1 chữ in Hoa(A-Z), tối thiểu 8 ký tự và tối đa 50 ký tự '
                ]
            ]
        ];
        $attribute = [
            'email' => 'Email',
            'name' => 'Tên người dùng',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Mật khẩu',
        ];
        $validator = Validator::make($request->all(), $rules, $message, $attribute);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = Auth::user();
        $user = new User();
        // Kiểm tra xem email đã có trong dữ liệu hay chưa
        if (User::where('email', $request->email)->exists()) {
            // Email đã có trong dữ liệu
            return back()->with('error', 'Email đã tồn tại');
        } else {
            // Email chưa có trong dữ liệu
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            if ($user->save()) {
                return redirect()->route('login');
            } else {
                return back()->withErrors($user->getErrors());
            }
        }
    }
    
    public function payment(Request $request) {
        if (!isset($_SESSION['user_id'])) {
            return redirect('login');
        }
        if ($request->checkout_read_terms == null) {
            return redirect('order')->with('error','Có lỗi xãy ra vui lòng thanh toán lại!');
        }
        // dd($request);
        // unset($_SESSION['order_id']);
        $user = User::find($_SESSION['user_id']);
     
        $user->username = ($request-> username);
        $user->name = ($request->name);
        $user->phone = ($request->phone);
        $user->address = ($request->address);
        $user->save();

        DB::table('orders')->where('id', $_SESSION['order_id'])->update(['order_date' => date("Y-m-d"), 'order_status' => 1]);
        unset($_SESSION['order_id']);

        return redirect('home');
    }
}
