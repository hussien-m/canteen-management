<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('dashboard.settings.index',compact('settings'));
    }

    public function store(Request $request)
    {
       $settings =  $request->validate([
            'site_name'             =>'required',
            'site_status'           =>'required',
            'message_site_status'   =>'required',
            'meta_tags'             =>'required',
            'meta_description'      =>'required',
            'facebook'              =>'required',
            'tiwtter'               =>'required',
            'instagram'             =>'required',
        ]);

        DB::table('settings')->update($settings);
        session()->flash('alert.success','تم حفظ الاعدادات');
        return back();


    }
}
