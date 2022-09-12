<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('about',compact('about'));
    }

    public function index(Request $request)
    {
        $about = About::first();
        return view('dashboard.about.index',compact('about'));
    }

    public function store(Request $request)
    {
        $settings =  $request->validate([
            'site_name'             =>'required',
            'site_desc'             =>'required',
            'phone'                 =>'required',
            'email'                 =>'required',
            'facebook'              =>'required',
            'tiwtter'               =>'required',
            'instagram'             =>'required',
        ]);

        DB::table('abouts')->update($settings);
        session()->flash('alert.success','تم حفظ الاعدادات');
        return back();
    }
}
