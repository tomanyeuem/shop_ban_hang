<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{   

    ////////Back-end

    //Add category
    public function addCategory(){
        return view('admin.add_category');
    }

    //Edit category
    public function listCategory(){
        $all_category = Category::paginate(3);
        $categories = Category::all();
        $count = $all_category->count();
        $count_all = $categories->count();
        if(isset($all_category)){
            return view('admin.list_category', compact('all_category', 'count', 'count_all'));
        }
        
    }


    //Save category
    public function saveCategory(CategoryRequest $request){
        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->cat_status = $request->cat_status;

        $query = Category::where('cat_name',$category->cat_name)->exists();
        if($query == true){
            return redirect()->back()->with('alert','Tên Danh Mục Đã Tồn Tại. Vui Lòng Nhập Danh Mục Khác.');
        }
        else{
            $result = $category->save();
            if($result){
            return redirect()->route('add_category')
            ->with('success', 'Đã thêm danh mục thành công');
            }
        }
         
    }

    //Change category status from hide to unhide
    public function unhideCategory($cat_id){
        $category = Category::find($cat_id);
        $category->cat_status = 1;
        $query = $category->save();
        if($query){
            return redirect()->route('list_category')
            ->with('message', 'Cập nhật trạng thái danh mục thành công');
        }
    }

    //Change category status from unhide to hide
    public function hideCategory($cat_id){
        $category = Category::find($cat_id);
        $category->cat_status = 0;
        $query = $category->save();
        if($query){
            return redirect()->route('list_category')
            ->with('message', 'Cập nhật trạng thái danh mục thành công');
        }
    }

    //delete category from database
    public function deleteCategory($cat_id){
        Category::where('cat_id',$cat_id)->delete();
        Product::where('cat_id',$cat_id)->delete();
        return redirect()->route('list_category')->with('message', 'Đã xoá danh mục thành công');
    }

    //edit category
    public function editCategory($cat_id){
        $all_category = Category::where('cat_id', $cat_id)->get();
        return view('admin.edit_category', compact('all_category'));
    }

    //update category
    public function updateCategory(CategoryRequest $request, $cat_id){
        $category = Category::find($cat_id);
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->cat_status = $request->cat_status;
        $result = $category->save();
        if($result){
            return redirect()->back()->with('success', 'Cập nhật danh mục thành công');
        }
    }

    ////End back-end

    ////Front-end
    public function showCatProduct($cat_id){
        $category = Category::where('cat_status','1')->orderBy('cat_id','desc')->get();
        $brand = Brand::where('brand_status','1')->orderBy('brand_id','desc')->get();
        $product = Product::with('category')->where('cat_id',$cat_id)->get();
        return view('pages.category.cat_product', compact('category', 'brand', 'product'));
    }
    
}