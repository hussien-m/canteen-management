<?php

namespace App\Http\Controllers;
use App\Models\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function index()
    {
        $categories = MainCategory::get();

        return view('dashboard.maincategory.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.maincategory.create');
    }

    public function store(Request $request)
    {


        $request->validate([
            'name' => 'required',
        ]);


        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png',
            ]);

            $path = $request->image->store('/images/category', ['disk' =>   'my_files']);
            $mainCat = new MainCategory([
                "name" => $request->name,
                "image" => $path,
            ]);

            $mainCat->save();
        }
        session()->flash('alert.success' , 'تم اضافة التصنيف');
        return redirect()->route('maincategory.index');

    }

    public function edit($id)
    {
        $m_cat = MainCategory::findOrFail($id);

        return view('dashboard.maincategory.edit',compact('m_cat'));
    }

    public function update(Request $request , $id)
    {

        $mainCat = MainCategory::findOrfail($id);
        $request->validate([
            'name' => 'required',
        ]);


        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png',
            ]);

            $path = $request->image->store('/images/category', ['disk' =>   'my_files']);

            $mainCat->name = $request->name;
            $mainCat->image = $path;


            $mainCat->save();
        }
        session()->flash('alert.success' , 'تم تعديل التصنيف');
        return redirect()->route('maincategory.index');
    }

    public function destroy($id)
    {
        $m_cat = MainCategory::findOrFail($id);
        $m_cat->delete();
        session()->flash('alert.success' , 'تم حذف التصنيف');
        return back();
    }
}
