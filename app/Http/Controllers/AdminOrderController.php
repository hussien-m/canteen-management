<?php

namespace App\Http\Controllers;

use App\DataTables\OrdersDataTable;
use App\Models\Order;
use App\Models\User;
use App\Notifications\AdminChangeOrder;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;
class AdminOrderController extends Controller
{
    public $status;

    public function index(Request $request)
    {


        $orders = Order::with(['student','canteen','school','meal'])->latest()->get();

        if($request->status){
          $this->status = $request->status;
          $orders = Order::where('status',$request->status)->get();
        }
        return view('dashboard.order.index',[
            'status' => $this->status,
            'orders' => $orders,
        ]);
    }

    public function changeOrder(Request $request,$id)
    {


        $status = $request->status;

        $order = Order::findOrFail($id);
        $order = $order->load('student');


        DB::beginTransaction();

        try{

            $order->status = $status;

            $order->save();

            $noti = [
                'status'   => $order->status ,
                'meal'     => $order->meal->name,
                'price'    => $order->meal->price,
                'quantity' => $order->quantity,
                'total'    => $order->total,
            ];



            Notification::send($order->student, new AdminChangeOrder($noti));

            DB::commit();

            session()->flash('alert.success' , 'تم تحديث حالة الطلب');
            return redirect()->route('admin.orders');

        } catch(Exception $ex){

            dd($ex->getMessage());

        }
    }

    public function edit($id)
    {

        $order = Order::findOrFail($id);

        return view('dashboard.order.edit',compact('order'));
    }

    public function update(Request $request , $id)
    {
        $data =$request->validate([
            'quantity' => 'required',
            'status' => 'required',
            'price'  => 'required',
         ]);



         $data['total'] = $data['quantity'] * $data['price'];


        // dd($data);

         Order::whereId($id)->update($data);
         session()->flash('alert.success' , 'تم تعديل التصنيف');
         return redirect()->route('admin.orders');

    }

    public function delete($id)
    {
        $m_cat = Order::findOrFail($id);
        $m_cat->delete();
        session()->flash('alert.success' , 'تم حذف  الطلب');
        return back();
    }
}
