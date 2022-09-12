<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function homePage()
   {
       return view('contact');
   }

   public function index()
   {
        $contacts = Contact::get();
        return view('dashboard.contact.index',compact('contacts'));
   }

   public function store(Request $request)
   {
        $data = $request->validate([

            'name'     =>'required',
            'email'    =>'required',
            'title'    =>'required',
            'message'  => 'required',

        ]);

        Contact::create($data);
        session()->flash('alert.success' , 'تم  ارسال رسالتك  بنجاح شكرا لتواصلك معنا');
        return redirect()->route('contact');
   }

   public function show($id)
   {
       $contact = Contact::findOrfail($id);

       return view('dashboard.contact.show',compact('contact'));
   }

   public function delete($id)
   {
       $contact = Contact::findOrfail($id);

       $contact->delete();

       session()->flash('alert.success','تم حذف الرسالة بنجاح');

       return redirect()->route('contact.index');
   }
}
