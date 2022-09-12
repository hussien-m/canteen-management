<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Student;
use App\Models\User;
use App\Notifications\StudentSendOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:students');
        parent::__construct();
    }
    public function sendOrder(Request $request)
    {
        $user =User::find(1);
        $stud=Student::find(Auth::guard('students')->user()->id);
        $stu_name= $stud->first_name.' '.$stud->last_name;

       // dd($stu_name);
        $order = $request->validate([

           'price'            => 'required',
           'quantity'         => 'required',
           'student_id'       => 'required',
           'canteen_id'       => 'required',
           'meal_id'          => 'required',
           'school_id'        => 'required',
           'reservation_date' =>'required',

        ]);



       if ($order['quantity'] > 0 ) {


            $total = $order['price'] * $order['quantity'];
            $order['total'] = $total;

            DB::beginTransaction();
            try{

                //dd($order);

                $orders= new Order;

                $orders->price = $order['price'];
                $orders->quantity = $order['quantity'];
                $orders->student_id = $order['student_id'];
                $orders->canteen_id = $order['canteen_id'];
                $orders->meal_id = $order['meal_id'];
                $orders->school_id = $order['school_id'];
                $orders->reservation_date = $order['reservation_date'];
                $orders->total = $total;
                $orders->save();
                
                $order_id = $orders->id;

                Notification::send($user, new StudentSendOrder($order,$stu_name,$order_id));

                DB::commit();

                session()->flash('alert.success' , 'تم ارسال طلبك  بنجاح');
                return redirect()->route('show.meal',$order['meal_id']);
            } catch(Exception $ex){

                dd($ex->getMessage());
            }



       } else {

        return "NO";
       }

    }
    public function myOrder()
    {
        $student = \Auth::guard('students')->user()->id;

        $orders = Order::where('student_id',$student)->latest()->get();

        return view('frontend.include.order.myOrder',compact('orders'));

    }
}
