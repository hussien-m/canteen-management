<?php

namespace App\Http\Controllers;

use App\Exports\OrderQueryExport;
use App\Exports\StudentQueryExport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\SchoolImport;
use App\Imports\UsersImport;
use App\Models\Order;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function dashboard()
    {
        $orders = Order::paginate(5);


        return view('dashboard',compact('orders'));
    }

    public function importExportView()
    {
        $students = Student::paginate(5);
        return view('dashboard.student.index',compact('students'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'studens.xlsx');
    }


    public function exportStudentQuery($school_id)
    {
        return Excel::download(new StudentQueryExport($school_id), 'studens.xlsx');
    }

    public function exportOrderQuery(Request $request)
    {
          
        return Excel::download(new OrderQueryExport($request->status), 'orders.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request)
    {
        $request->validate([
           'file'        => 'required|file|mimes:xsl,xlsx|max:2048',
           'school_id'   => 'required',
       ]);

       Excel::import(new UsersImport($request->school_id),$request->file);

       session()->flash('alert.success','تم اضافة الطلاب الى المدرسة');

       return redirect()->route('show-student',$request->school_id);
    }

    public function importSchool(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xsl,xlsx|max:2048',
        ]);

        Excel::import(new SchoolImport,$request->file);

        session()->flash('alert.success','تم المدارس');

        return redirect()->route('school.index');

    }
}
