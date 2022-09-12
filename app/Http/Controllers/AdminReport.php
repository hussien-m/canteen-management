<?php

namespace App\Http\Controllers;

use App\Models\Canteen;
use App\Models\Order;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValue;

class AdminReport extends Controller
{
    public function orderDaily()
    {
        $orders = Order::whereDate('created_at', Carbon::today() )->latest()->get();
        $orders->load(['student','canteen','school','meal']);
        return view('dashboard.report.order' , compact('orders'));
    }

    public function orderStudent(Request $request)
    {
        $first_name = $request->first_name;

        $last_name  = $request->last_name;

        $phone      = $request->phone;


        $orders = Student::has('orders')->when($first_name , function($query , $first_name){

            return $query->where('first_name','=',$first_name);

            })->when($last_name , function($query , $last_name){

                return $query->where('last_name','=',$last_name);

            })->when($phone , function($query , $phone){

                return $query->where('phone','=',$phone);

            })->get();


        return view('dashboard.report.student' , compact('orders'));
    }


    public function orderCanteen(Request $request)
    {





        if($request->name and $request->date)
        {
            $name = $request->name;

            $canteen_name = Canteen::whereName($name)->first();
            if($canteen_name){

                $orders = Order::whereDate('created_at', Carbon::parse($request->date) )->whereCanteenId($canteen_name->id)->latest()->get();

                return view('dashboard.report.canteen',compact('orders'));

            }else{

                $orders = Order::whereId('10101010101010')->get();
                return view('dashboard.report.canteen',compact('orders'));

            }



        } else {
            $orders = Order::whereId('10101010101010')->get();
            return view('dashboard.report.canteen',compact('orders'));
        }


        /*

            $orders = Order::whereDate('created_at', Carbon::parse($request->date) )->whereCanteenId($canteen_name->id)->latest()->get();

            if($canteen_name){
                return view('dashboard.report.canteen',compact('orders'));
            }else {

                $orders = Order::whereId('10101010101010')->get();
                return view('dashboard.report.canteen',compact('orders'));

            }
        */

    }
}
