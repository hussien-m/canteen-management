<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Meal;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public $deal;

    public function __construct()
    {
       $this->middleware('auth:students')->except('index','show','meals','cat','subCat');
       parent::__construct();
    }


    public function index(Request $request)
    {
        if($request->cat_id){
            $this->getData();
            return view('frontend.row-meal', ['deals' => $this->deals]);
        }
        return view('frontend.app', ['deals' => Meal::with(['images' , 'canteen','category'])->paginate(12)]);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $this->getData($request);
            return view("frontend.unauth._search_data", [
                'deals' => $this->deals,
            ]);
        }
    }

    public function getData()
    {
        $request = \request();
        $keyword = $request->input('q');
        $cat_id = $request->input('cat_id');

        $this->deals = Meal::with(['images' , 'canteen','category'])->where('category_id',$cat_id)->get();
    }

    public function show($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->load(['canteen','category','images']);

        return view('frontend.meal.show',compact('meal'));
    }

    public function meals()
    {
        return view('frontend.meals');
    }


    public function cat($id)
    {

        $sub_cat = Category::select('id')->where('main_category_id',$id)->first();

        $meals = Meal::where('category_id','=',$sub_cat->id)->get();
        
        if($meals){
            
                    return view('frontend.cat' , compact('meals'));

        }else{
            
            return "Notfound Any Meals";
        }
        
            

    }


    public function subCat($id)
    {

        $meals = Meal::where('category_id','=',$id)->get();

        return view('frontend.sub-cat' , compact('meals'));

    }


}
