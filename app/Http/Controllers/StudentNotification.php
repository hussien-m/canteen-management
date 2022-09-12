<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Carbon\Carbon;

class StudentNotification extends Controller
{
    public function index()
    {
        $stu_all_noti_no = Student::find(Auth::guard('students')->user()->id);
        $noti_stu = $stu_all_noti_no->notifications;

        return view('frontend.notification.index' , compact('noti_stu'));
    }

    public function show($id)
    {
       $noti_show = Notification::findOrFail($id)->where('notifiable_id',Auth::guard('students')->user()->id)->get();

       DB::table('notifications')->where('id',$id)->update(['read_at'=>Carbon::now()]);


       return view('frontend.notification.show' , compact('noti_show'));
    }
}
