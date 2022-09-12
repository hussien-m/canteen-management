<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Facades\Excel;

class OrderQueryExport implements FromCollection,WithHeadings,WithMapping
{
    use Exportable;


    public function __construct($status)
    {
        $this->status = $status;
    }

    public function collection()
    {
        //dd($this->status);
        //return Order::select('id','student_id','meal_id','price','quantity','total','status')->where('status',$this->status)->get();

        return Order::with(['student','meal','canteen','school'])->where('status',$this->status)->get();

    }

    public function map($order) : array {
        return [

            $order->id,

            $order->student->first_name.' '.$order->student->last_name,

            $order->meal->name,

            $order->price,

            $order->quantity,

            $order->total,

            $order->status,

            $order->canteen->school->name,

            $order->canteen->name,

            Carbon::parse($order->created_at)->toFormattedDateString()
        ] ;


    }

    public function headings(): array
    {
        return [
            'رقم الطلب',

            'اسم الطالب',

            'الوجبة',

            'السعر',
            'الكمية',
            'المجموع',
            'الحالة',
            'المقصف',
            'المدرسة',
            'التاريخ'
        ];
    }


}
