<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addCategory()
    {
        return view('admin.content.addcategory');
    }   
    public function customCategory(Request $request)
    {
        $required = [
            'category_name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/u', 'min:1', 'max:255'],
        ];
        $messages = [
            'category_name.required' => 'Vui lòng nhập tên danh mục',
            'category_name.min' => 'Tên danh mục phải có ít nhất 1 ký tự',
            'category_name.max' => 'Tên danh mục không được vượt quá 255 ký tự',
            'category_name.regex'=>'Tên danh mục không được chứa ký tự đặc biệt',
        ];
        $attribute = [
            'category_name' => 'Tên danh mục'
        ];
        $validator = Validator::make($request->all(), $required, $messages,$attribute);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $category = new Category($request->all());
        $category->save();
        return redirect("listcategory");
    }

    public function listCategory()
    {
        $categories = DB::table('categories')->paginate(6);
        return view('admin.content.listcategory', compact('categories'));
    }

    public function createCategory(array $data)
    {
        return Category::create([
            'category_name' => $data['category_name'],
        ]);
    }
    
    public function getDataEditCategory($id)
    {
        $getData = DB::table('categories')->select('*')->where('id', $id)->get();
        return view('admin.content.editcategory')->with('getDataCategoryById', $getData);
    }
     public function updateCategory(Request $request)
    { 
        $updateData = DB::table('categories')->where('id', $request->id)->update([
            'category_name' => $request->cate_name,
        ]);
        return redirect('listcategory');
    }


    public function deleteCategory($id)
    {
        
        $deleteData = DB::table('categories')->where('id', '=', $id)->delete();
        return redirect('listcategory');
    }


    public function searchCategory(Request $request)
    {
        $keyword = $request->keyword;
        $categories = Category::where('category_name', 'LIKE', '%' . $keyword . '%')->paginate(4);
        return view('admin.content.listsearchcategory', compact('categories'));
    }
}
