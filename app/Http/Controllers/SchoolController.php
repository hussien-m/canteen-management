<?php

namespace App\Http\Controllers;

use App\Models\Canteen;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
       $schools = School::with('students')->get();

       return view('dashboard.school.index',compact('schools'));
    }

    public function addSchool(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        School::create([
          'name' => $request->name,
        ]);
        session()->flash('alert.success','تم اضافة المدرسة');
        return back()->with('errors');

    }

    public function editSchool($id)
    {
        $school = School::findOrfail($id);
        return view('dashboard.school.edit-school',compact('school'));
    }

    public function updateSchool(Request $request,$id)
    {
        $school = School::findOrfail($id);

        $request->validate([
            'name' => 'required',
        ]);

        $school->name = $request->name;

        $school->save();

        session()->flash('alert.success','تم تعديل المدرسة');
        return back()->with('errors');

    }

    public function deleteSchool($id)
    {
        $m_cat = School::findOrFail($id);
        $m_cat->delete();
        session()->flash('alert.success' , 'تم حذف المدرسة');
        return back();
    }

    public function addStudent($id)
    {
        $school = School::findOrfail($id);
        return view('dashboard.school.add-student-to-school' , compact('school'));
    }

    public function addCanteen(Request $request)
    {

        $request->validate([
          'name' => 'required|unique:canteens',
          'school_id' => 'required',
        ]);

        Canteen::updateOrCreate([
           'name' => $request->name,
           'school_id' => $request->school_id,
        ]);

        session()->flash('alert.success','تم اضافة المقصف');
        return back()->with('errors');
    }

}
