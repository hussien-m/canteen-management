<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index(Request $request)
    {
        if(Gate::authorize('users.view')){

            return view('dashboard.admin.index' ,['users' => User::with('userRoles')->get()]);
        }

        return abort('404');
    }

    public function create()
    {
        $roles = Role::get();
        return view('dashboard.admin.create' ,compact('roles'));
    }

    public function store(Request $request)
    {
       $data = $request->validate([

            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'role'     => 'required',

       ]);

       $data['password'] = Hash::make($request->password);

       $admin = User::create($data);
       $admin->roles()->sync($request->role);
       session()->flash('alert.success', __('تم اضافة المستخدم بنجاح'));
       return redirect()->route('users.index');

    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('dashboard.admin.edit' ,compact('admin'));
    }

    public function update(Request $request , $id)
    {
        $data = $request->validate([

            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'role'     => 'required',

       ]);


        try {
            DB::beginTransaction();
            $admin= User::findOrfail($id);

            if($request->password != $admin->password){
                $data['password'] = Hash::make($request->password);
            }


            $admin->update($data);
            $admin->roles()->sync($request->role);
            DB::commit();
            session()->flash('alert.success',__('تم تعديل البيانات بنجاح'));
            return redirect()->route('users.index');
        }
        catch (\Throwable $ex){
            DB::rollback();
            dd($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('alert.success' , 'تم حذف المستخدم');
        return back();
    }



}
