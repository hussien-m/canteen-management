<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        view()->composer('*', function ($view) {

            $user = User::find(1);
            $noti = $user->notifications;
            $noti_unread = $user->unreadNotifications;



            if(Auth::guard('students')->check()){


                $student_n = Student::find(Auth::guard('students')->user()->id);

                $noti_student = $student_n->notifications;

                $noti_unread_student = $student_n->unreadNotifications;

                $view->with([


                    'student_n' => $student_n,
                    'noti_student' => $noti_student,
                    'noti_unread_student' => $noti_unread_student,
                ]);


            }




            view()->share('noti',$noti);

            $view->with([
                'noti' => $noti,
                'noti_unread' => $noti_unread,
            ]);


        });
    }
}
