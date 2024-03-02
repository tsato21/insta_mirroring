<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    private $category;

    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){
        $allCategories = $this->category->withTrashed()->get();
        
        return view('admin.categories.show')->with('allCategories' , $allCategories);
    }

    public function hide($id){
        $category = $this->category->findOrFail($id);
        $category->delete();

        return redirect()->back();
    }

    public function unhide($id){
        $category = $this->category->onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->back();
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required|max:50'
        ]);
        $category = $this->category->withTrashed()->findOrFail($id);
        $category->name = $request->name;

        $category->save();

        return redirect()->back();
    }

    public function forceDelete($id){
        $category = $this->category->withTrashed()->findOrFail($id);
        $category->delete();

        return redirect()->back();
    }
}
