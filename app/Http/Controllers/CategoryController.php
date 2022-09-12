<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = MainCategory::with('category')->get();

        return view('dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        $main_category = MainCategory::get();
        return view('dashboard.category.create' , compact('main_category'));
    }

    public function store(Request $request)
    {
        $data =$request->validate([
           'main_category_id' => 'required',
           'name' => 'required',
        ]);

        if ($data) {

            Category::create([
                'name' => $request->name,
                'main_category_id' => $request->main_category_id,
            ]);

            session()->flash('alert.success' , 'تم اضافة التصنيف');
            return back();
        }

    }

    public function edit($id)
    {
        $main_category = Category::get();
        $m_cat = Category::findOrFail($id);

        return view('dashboard.category.edit',compact('m_cat','main_category'));
    }

    public function update(Request $request , $id)
    {
        $data =$request->validate([
            'quantity' => 'required',
            'status'   => 'required',
         ]);

         Category::whereId($id)->update($data);
         session()->flash('alert.success' , 'تم تعديل التصنيف');
         return redirect()->route('category.index');

    }

    public function destroy($id)
    {
        $m_cat = Category::findOrFail($id);
        $m_cat->delete();
        session()->flash('alert.success' , 'تم حذف التصنيف');
        return back();
    }
}
