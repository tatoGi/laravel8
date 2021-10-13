<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\SosftDelete;




class categoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AllCat(){
        // $categories = DB::table('categories')
        //         ->join('users', 'categories.user_id' , 'users.id')
        //         ->select('categories.*','users.name')
        //         ->latest()->paginate(3);

        $categories = Category::latest()->paginate(5);
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);

        //  $categories = DB::table('categories')->latest()->paginate(3);
        return view('admin.category.index', compact('categories','trachCat'));
    }

    public function AddCat(request $request){
        $validatedData = $request->validate([
            'Category_name' => 'required|unique:categories|max:255',
        ],
        [
            'Category_name' => 'Please Input Category Name',
            'Category_max' => 'Category less Then 255Chars',
        ]);

        Category::insert([

            'category_name' => $request->Category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()

        ]);

            $category = new Category;
            $category->Category_name = $request->Category_name;
            $category->user_id =  Auth::user()->id;
            $category->save();


            $data = array();
            $data['category_name'] = $request->Category_name;
            $data['user_id'] = Auth::user()->id;
            DB::table('categories')->insert($data);

        return Redirect()->back()->with('success','Category Inserted Successfull');

    }

    public function Edit($id){
        $categories = Category::find($id);
        return view('admin.category.edit', compact('categories'));
    }

    
    public function Update(Request $request ,$id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success','Category  Update Successfull');
    }


    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category Soft Delete Successfully');

    }
    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restore Successfully');

    }
    public function Pdelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanetly Delete');
    }








}
