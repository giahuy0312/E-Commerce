<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


//Unknow
class ProductController extends Controller
{
    public function registrationProduct()
    { 
        $categories = DB::table('categories')->select('*')->get();
        return view('admin.content.addproduct', ['categories' => $categories]);
    }

    public function customProduct(Request $request)
    {
       $requied = [
        'name' => ['required', 'regex:"/^[0-9a-zA-Z\s]+$/"', 'min:10', 'max:50'],
        'description' => ['required', 'min:1', 'max:255'],
        'price' => ['required', 'numeric', 'min:1', 'max:9999999.99'],
        'size' => ['required', 'numeric', 'min:1', 'max:100'],
        'material' => ['required', Rule::in(['14k', '18k', 'Platinum'])],
        'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'], 
        'category_id' => 'required',
        ];
        
        $messages = [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có ít nhất 10 ký tự',
            'name.max' => 'Tên sản phẩm không được vượt quá 50 ký tự',
            'name.regex'=>'Tên không được chứa ký tự đặc biệt',

            'description.required' => 'Vui lòng nhập mô tả sản phẩm',
            'description.min' => 'Mô tả sản phẩm phải có ít nhất 1 ký tự',
            'description.max' => 'Mô tả sản phẩm không được vượt quá 255 ký tự',
        
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá sản phẩm phải là một số hợp lệ',
            'price.min' => 'Giá sản phẩm phải ít nhất là 1',
            'price.max' => 'Giá sản phẩm không được vượt quá 9,999,999.99',
        
            'size.required' => 'Vui lòng nhập kích thước sản phẩm',
            'size.numeric' => 'Kích thước sản phẩm phải là một số hợp lệ',
            'size.min' => 'Kích thước sản phẩm phải ít nhất là 1',
            'size.max' => 'Kích thước sản phẩm không được vượt quá 100',
        
            'material.required' => 'Vui lòng chọn chất liệu sản phẩm',
            'material.in' => 'Chất liệu sản phẩm phải là một trong những lựa chọn sau: 14k, 18k, Platinum',
        
            'image.required' => 'Vui lòng tải lên hình ảnh sản phẩm',
            'image.image' => 'Tệp được tải lên phải là hình ảnh',
            'image.mimes' => 'Hình ảnh sản phẩm phải ở một trong các định dạng sau: jpeg, png, jpg, gif',
        
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm',
        ];
        $attribute = [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'price' => 'Giá sản phẩm',
            'size' => 'Kích thước sản phẩm',
            'material' => 'Chất liệu sản phẩm',
            'image' => 'Ảnh sản phẩm',
            'category_id' => 'Danh mục sản phẩm', 
        ];
        $validator = Validator::make($request->all(), $requied, $messages,$attribute);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $file = $request->file('image');
        $path = 'images/image-products';
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);
        $product = new Product($request->all());
        $product->image = $fileName;
        $product->save();
        return redirect("listproduct");
    }

    public function createProduct(array $data)
    {
        return Product::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'size' => $data['size'],
            'material' => $data['material'],
            'category_id' => $data['category_id'],
            'image' => $data['image'],
        ]);
    }

    public function getDataEdit($id)
    {
        $getData = DB::table('products')->select('*')->where('id', $id)->get();
        $categories = DB::table('categories')->select('*')->get();
        return view('admin.content.editproduct', ['getDataProductById' => $getData, 'categories' => $categories]);
    }

    public function updateProduct(Request $request)
    {
        $file = $request->file('image');
        $path = 'uploads';
        $fileName = $file->getClientOriginalName();
        $file->move($path, $fileName);
        $updateData = DB::table('products')->where('id', $request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'size' => $request->size,
            'material' => $request->material,
            'category_id' => $request->category_id,
            'image' => $fileName,
            
        ]);
        
        //Thực hiện chuyển trang
        return redirect('listproduct');
    }
    public function deleteProduct($id)
    {
        $deleteData = DB::table('products')->where('id', '=', $id)->delete();
        return redirect('listproduct');
    }


    public function listProduct()
    {
        $categories = Category::all();
        $products = DB::table('products')->paginate(4);
        return view('admin.content.listproduct', ['products' => $products,'categories' => $categories]);


    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
    }
    //Hien thi san pham
    public function getAllProducts()
    {
        $products = Product::all();
        $orders = Order::all();
        return view('index', ['products' => $products, 'orders' => $orders]);
      
    }
    public function searchName(Request $request) {
        $keyword = $request->keyword;
        $categories = Category::all();
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.content.listSearchProduct', ['products' => $products,'categories' => $categories]);
    }
    public function searchCategory(Request $request) {
        $keyword = $request->keyword;
        $categories = Category::all();
        $products = Product::where('category_id', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.content.listSearchProduct', ['products' => $products,'categories' => $categories]);
    }
    //Tim kiem san pham
    public function searchProduct(Request $request)
    {
        $keyword = $request->keyword;
        
        $products = Product::where('name','LIKE', '%' . $keyword . '%')->paginate(8);
        return view('searchProduct', ['products' => $products]);
        

    }
   public function productDetails($product)
   {
    $product = Product::find($product);
    return view('productDetails', ['product' => $product]);
   }
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
}
