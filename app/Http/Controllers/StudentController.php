<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class StudentController extends Controller
{
    public  $id;

    public function showStudents()
    {

        $students = Student::where('school_id')
                        ->with('school')
                        ->get();

        if ($students->count() >= 1) {

            return view('dashboard.school.show-student' , [
                'students' => $students,
                'sch_id'   => $this->id,
            ]);

        }

        return abort('404');
    }

    public function allStudents(Request $request)
    {
        $students = Student::with('school')->get();
        $this->id = $request->school_id;
        $schools  = School::get();

        if($request->school_id){

            $students = Student::where('school_id',$request->school_id)->get();
        }

        return view('dashboard.school.show-student' , [
            'students' => $students ,
            'schools' => $schools,
            'sch_id' => $this->id,
        ]);
    }

    public function storeStuend(Request $request , Student $student)
    {
        $request->validate([

            'first_name' => "required",
            'last_name' => "required",
            'phone' => "required",
            'school_id' => "required",

        ]);

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;
        $student->password = Hash::make($request->first_name);
        $student->school_id = $request->school_id;



        $student->save();
        session()->flash('alert.success' , 'تم اضافة الطالب');
        return redirect()->route('all-student');
    }

    public function editStudent($id)
    {
        $schools = School::get();
        $student = Student::findOrFail($id);
        $student->load('school');
        return view('dashboard.school.edit-student' , compact('student','schools'));
    }

    public function updateStudent(Request $request ,$id)
    {
        $student = Student::findOrFail($id);
        $request->validate([

            'first_name' => "required",
            'last_name' => "required",
            'phone' => "required",
            'school_id' => "required",

        ]);

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;
        $student->password = Hash::make($request->first_name);
        $student->school_id = $request->school_id;



        $student->save();
        session()->flash('alert.success' , 'تم تعديل الطالب');
        return redirect()->route('all-student');


    }

    public function deleteStudent($id)
    {

        $m_cat = Student::findOrFail($id);
        $m_cat->delete();
        session()->flash('alert.success' , 'تم حذف الطالب');
        return back();

    }
}
