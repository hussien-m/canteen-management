<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNotifaction extends Controller
{

    public function showOrder($id,$noti_id)
    {
        $order  = Order::findOrFail($id);

        $update = DB::table('notifications')->where('id',$noti_id)->get();

        if($update){
            DB::table('notifications')->where('id',$noti_id)->update(['read_at'=>Carbon::now()]);
            return view("dashboard.order.show",compact('order'));
        }
        return view("dashboard.order.show",compact('order'));
    }

    public function showOrderWtihoutNoti($id)
    {
        $order  = Order::findOrFail($id);
        return view("dashboard.order.show",compact('order'));
    }


}
