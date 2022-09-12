<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index()
    {
        return view('dashboard.roles.index',[
            'roles' => Role::paginate(10),
        ]);
    }

    public function show(){}
    public function create()
    {
        return view('dashboard.roles.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string'
        ]);
        DB::beginTransaction();
        try{
            $role = Role::forceCreate([
                'name' => $request->post('name'),
            ]);

            $permission = $request->post('permissions');
            foreach ($permission as $code){
                DB::table('roles_permissions')->insert([
                    'role_id' => $role->id,
                    'permission' => $code,
                ]);
            }
            DB::commit();
        }catch (\Throwable $ex){
            DB::rollback();
            throw $ex;
        }

        session()->flash('success',__('تم اضافة الدور بنجاح'));
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permission = DB::table('roles_permissions')->where('role_id' , $role->id)->pluck('permission')->toArray();
        return view('dashboard.roles.edit',[
            'role' => $role,
            'role_permission' => $permission,
        ]);
    }

    public function update(Request $request , $id)
    {

        $request->validate([
            'name' => 'required|string'
        ]);
        $role = Role::findOrFail($id);
        DB::beginTransaction();
        try{
            $role->name = $request->post('name');
            $role->save();
            $permissions = $request->post('permissions');
            DB::table('roles_permissions')->where('role_id',$role->id)->delete();
            foreach ($permissions as $code){
                DB::table('roles_permissions')->insert([
                    'role_id' => $role->id,
                    'permission' =>$code,
                ]);
            }
            DB::commit();
        }catch (\Throwable $ex){
            DB::rollback();
            throw $ex;
        }

        session()->flash('success',__('تم تعديل الدور بنجاح'));
        return redirect()->route('roles.index');

    }
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        session()->flash('success',__('تم حذف الدور بنجاح'));
        return redirect()->route('roles.index');
    }
}
