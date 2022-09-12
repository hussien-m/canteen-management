<?php

namespace App\Http\Controllers;

use App\Models\Canteen;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Meal;
use App\Models\MealImage;
use App\Models\School;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class MealController extends Controller
{

    public function index()
    {
        $meals = Meal::with(['canteen' ,'images'])->get();

        return view('dashboard.meals.index',compact('meals'));
    }


    function create()
    {
        $schools = School::get();

        $categories =  Category::get();

        $main_category =  MainCategory::get();

        return view('dashboard.meals.create',["schools" => $schools , 'categories'=>$categories , 'main_category'=>$main_category]);
    }

    function schools(Request $request)
    {

        $data = Canteen::select('name', 'id')->where('school_id', $request->id)
            ->take(100)
            ->get();
        return response()

        ->json($data); //then sent this data to ajax success
    }

    function findCat(Request $request)
    {

        $data = Category::select('name', 'id')->where('main_category_id', $request->id)
            ->take(100)
            ->get();
        return response()

        ->json($data); //then sent this data to ajax success
    }

    public function store(Request $request)
    {
       // dd($request->images);

        $request->validate([
            'name'     => 'required',
            'price'    => 'required',
            'subcategory'   => 'required',
            'canteen'  => 'required',
            'images' => 'required',
        ]);

        DB::beginTransaction();

        try {


            $meal = new Meal;
            $meal->name       = $request->name;
            $meal->price      = $request->price;
            $meal->category_id      = $request->subcategory;
            $meal->canteen_id = $request->canteen;
            $meal->created_at = Carbon::now();
            $meal->save();

            foreach ($request->file('images') as $imagefile) {

                $image = new MealImage();
                $path = $imagefile->store('/images/meals', ['disk' =>   'my_files']);
                $image->name = $path;
                $image->meal_id = $meal->id;
                $image->save();
              }

            DB::commit();

            session()->flash('alert.success','تم اضافة الوجبة');
            return back()->with('errors');

        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();

        }



    }

    public function edit($id)
    {
        $meal = Meal::findOrfail($id);
        $meal->load( ['images' , 'canteen','category']);

        return view('dashboard.meals.edit' ,compact('meal'));

    }

    public function update(Request $request, $id)
    {

        $meal = Meal::findOrfail($id);

        $request->validate([
            'name'     => 'required',
            'price'    => 'required',
            'subcategory'   => 'required',
            'canteen'  => 'required',
            'images' => 'required',
        ]);

        DB::beginTransaction();

        try {


           // $meal = new Meal;
            $meal->name       = $request->name;
            $meal->price      = $request->price;
            $meal->category_id      = $request->subcategory;
            $meal->canteen_id = $request->canteen;
            $meal->created_at = Carbon::now();
            $meal->save();

            foreach ($request->file('images') as $imagefile) {

                $image = new MealImage();
                $path = $imagefile->store('/images/meals', ['disk' =>   'my_files']);
                $image->name = $path;
                $image->meal_id = $meal->id;
                $image->save();
              }

            DB::commit();

            session()->flash('alert.success','تم اضافة الوجبة');
            return back()->with('errors');

        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();

        }




    }

    public function delete($id)
    {
        $m_cat = Meal::findOrFail($id);
        $m_cat->delete();
        session()->flash('alert.success' , 'تم حذف الوجبة');
        return back();
    }

}
