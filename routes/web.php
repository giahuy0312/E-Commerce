<?php


use App\Models\Users;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgetpasswordManager;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Product


//change language
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'vi'])) {
        abort(404);
    }
    session()->put('locale', $locale);
    return redirect()->back();
});

// Home
session_start();
if (isset($_SESSION['user_id'])) {
    //Hien thi san pham trang index
    Route::get('/index', [ProductController::class, 'getAllProducts'])->name('index');
}
Route::get('/home', [ProductController::class, 'getAllProducts'])->name('index');
Route::get('/', [ProductController::class, 'getAllProducts'])->name('index');

// Login, logout, registration
Route::get('/admin', [AdminController::class, 'showFormLog'])->name('showFormLog');
// Route::get('/admin', [AdminController::class, 'login'])->name('login');
Route::post('/admin', [AdminController::class, 'postLogin'])->name('postLogin');
Route::get('/regis', [AdminController::class, 'regis'])->name('regis');
Route::post('/regis', [AdminController::class, 'postRegis'])->name('postRegis');

//signout
Route::get('signOut', [AdminController::class, 'signOut'])->name('signout');

//auth
Route::middleware('admin')->group(function () {
    
//listUser
Route::get('/listUser', [UserController::class, 'listUser'])->name('listUser');
Route::get('/deleteUserAD/{id}', [UserController::class, 'deleteUserAD'])->name('deleteUserAD');
//search User
Route::get('/listSearchUser', [UserController::class, 'searchUser'])->name('listSearchUser');

//dasboard
Route::get('showDasboard', [AdminController::class, 'showDasboard'])->name('showDasboard');
//product
Route::get('listproduct', [ProductController::class, 'listProduct'])->name('listproduct');
Route::get('addproduct', [ProductController::class, 'registrationProduct'])->name('addproduct');
Route::post('customproduct', [ProductController::class, 'customProduct'])->name('registerproduct.custom');
Route::get('getdataedt/id{id}', [ProductController::class, 'getDataEdit'])->name('getdataedt');
Route::post('editproduct', [ProductController::class, 'updateProduct'])->name('editproduct');
Route::get('deleteproduct/id{id}', [ProductController::class, 'deleteProduct'])->name('deleteproduct');
Route::get('getProducts', [ProductController::class, 'index'])->name('getProducts');
Route::get('/product/search/name',[ProductController::class,'searchName'])->name('product.search.name');
Route::get('/product/search/category',[ProductController::class,'searchCategory'])->name('product.search.category');
// Category
Route::get('listcategory', [CategoryController::class, 'listCategory'])->name('listcategory');
Route::get('addcategory', [CategoryController::class, 'addCategory'])->name('addcategory');
Route::post('customcategory', [CategoryController::class, 'customCategory'])->name('customcategory.custom');
Route::get('getdataedtcategory/id{id}', [CategoryController::class, 'getDataEditCategory'])->name('getdataedtcategory');
Route::post('editcategory', [CategoryController::class, 'updateCategory'])->name('editcategory');
Route::get('deletecategory/id{id}', [CategoryController::class, 'deleteCategory'])->name('deletecategory');

//Voucher
Route::get('/vouchers', [VoucherController::class, 'listVoucher'])->name('listvoucher');
Route::get('/vouchers/create', [VoucherController::class, 'create'])->name('voucher.create');
Route::post('/vouchers', [VoucherController::class, 'store'])->name('voucher.store');
Route::get('/vouchers/{voucher}/edit', [VoucherController::class, 'edit'])->name('voucher.edit');
Route::put('/vouchers/{voucher}', [VoucherController::class, 'update'])->name('voucher.update');
Route::get('deletevoucher/id{id}', [VoucherController::class, 'destroy'])->name('voucher.dele');
Route::get('vouchers/search/discount',[VoucherController::class,'searchDiscount'])->name('voucher.search.discount');
Route::get('vouchers/search/date',[VoucherController::class,'searchDate'])->name('voucher.search.date');
});

route::group(['middleware' => 'guest'], function () {
    //lấy dũ liệu từ login
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginpost'])->name('loginpost');
    //lấy dữ liệu từ register
    Route::get('/register', [UserController::class, 'register'])->name('register');
    Route::post('/register', [UserController::class, 'registerpost'])->name('registerpost');
});

// Logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Order
Route::group(['middleware' => 'auth'], function () {
    Route::resource('order', OrderController::class);
    Route::resource('wishlist', WishlistController::class);
    Route::get('purchase', [OrderController::class, 'purchase']);
});
// Checkout
Route::post('/checkout/promotion={promotion}', [OrderController::class, 'checkout'])->name('order.checkout');

// Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/addwishlist/{user}/product/{product}', [WishlistController::class, 'addwishlist'])->name('addwishlist');
Route::get('/addwishlist/product/{product}/{csrf?}', [WishlistController::class, 'destroy']);
Route::get('/order/{order}/product/{product}', [OrderController::class, 'store'])->name('order.add');
Route::get('/order/{order}/product/{product}/{csrf?}', [OrderController::class, 'destroy']);
Route::get('/purchase/{order}', [OrderController::class, 'purchaseDetail'])->name('purchase.detail');


// Promotion
Route::get('promotion', [PromotionController::class, 'search'])->name('promotion.search');

// Payment
Route::get('payment', [UserController::class, 'payment'])->name('order.payment');

//route User
Route::resource('user', UserController::class);
Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
//Hien thi san pham trang index
Route::get('/index', [ProductController::class, 'getAllProducts'])->name('index');
Route::get('/', [ProductController::class, 'getAllProducts'])->name('index');
route::get('/logout', [UserController::class, 'logout'])->name('logout');
//change pass
Route::get('/changepass/{user}', [UserController::class, 'changePass'])->name('user.changePass');
Route::post('/updatepass/{user}', [UserController::class, 'updatePass'])->name('user.updatePass');

//forget password
route::get('/forgetpassword', [ForgetpasswordManager::class, 'forgetpassword'])
    ->name('forget.password');
route::post('/forgetpassword', [ForgetpasswordManager::class, 'forgetpasswordpost'])
    ->name('forget.password.post');
//reset password
Route::get('/resetpasssword/{token}', [ForgetpasswordManager::class, 'resetPasssword'])
    ->name('reset.passsword');
// Route::get('/resetpassword', [ForgetpasswordManager::class, 'resetPassswordPost'])->name('reset.passsword.post');
Route::post('/resetpassword', [ForgetpasswordManager::class, 'resetPassswordPost'])
    ->name('reset.passsword.post');


//contact

route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
// shop (trang nhan cuoi)
Route::get('/shop', [ShopController::class, 'getAllShopProducts'])->name('shop');
//shopproducta(trang nhan cau hon)
Route::get('/shopproducts', [ShopController::class, 'getAllShop'])->name('shopproducts');
//Search
Route::get('/searchProduct', [ProductController::class, 'searchProduct'])->name('searchProduct');

Route::get('/productDetails/{product}', [ProductController::class, 'productDetails'])->name('productDetails');