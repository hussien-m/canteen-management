
@extends('layouts.site')
@section('content')
<style>
.card-body{
    background-color:#f2f2f2;
    border:0 0 1px solid #000;

}

</style>
@include('dashboard._alert')



<div class="row">


    <div class='col-md-12'>
        <div class="card bg-light mt-3">
            <div class="card-header">
                الطلبات
            </div>
            <div class="card-body table-responsive">

                <form action="{{route('admin.orders')}}" method="get" class="col-md-6 mt-1 mb-2">

                    <label>عرض حسب</label>
                    <select name="status" class="form-control" onchange="this.form.submit()">
                        <option selected disabled>اختر</option>
                        <option value="انتظار">
                        انتظار
                    </option>
                        <option value="مكتمل">
                            مكتمل
                        </option>
                        <option value="ملغي">
                            ملغي
                        </option>
                    </select>
                </form>
               <?php if( isset($_GET['status'])){?>
                <a class="col-md-1 ml-1  btn btn-primary" href="{{route('export.order',$status)}}">تصدير اكسل</a>

                <?php }?>

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>صاحب الطلب</th>
                            <th>الوجبة</th>
                            <th>تاريخ الحجز</th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>المجموع</th>
                            <th>المقصف</th>
                            <th>حالة الطلب</th>

                            <th>تاريخ الطلب</th>
                            <th>اخر تحديث</th>
                            <th>تغيير حالة الطلب</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $orders as $key=>$order )
                        <tr>
                            <td>{{$key+1}}</td>
                            <td> {{ $order->student->first_name }} </td>
                            <td> {{ $order->meal->name }} </td>
                            <td> {{ $order->reservation_date->diffForHumans() }} </td>
                            <td> {{ number_format((float)$order->meal->price,3)}} ر.ع </td>
                            <td> {{ $order->quantity }} </td>
                            <td> {{ number_format((float)$order->total,3)}} ر.ع </td>
                            <td> {{ $order->canteen->name }} </td>
                            <td> {{ $order->status }} </td>
                            <td> {{$order->created_at->diffForHumans() }}</td>
                            <td> {{$order->updated_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{route('admin.order.change', $order->id )}}" method="post">
                                    @csrf
                                    <select name="status" class="form-control" onchange="this.form.submit()">
                                        <option selected disabled>اختر</option>
                                        <option value="انتظار">
                                        انتظار
                                    </option>
                                        <option value="مكتمل">
                                            مكتمل
                                        </option>
                                        <option value="ملغي">
                                            ملغي
                                        </option>
                                    </select>
                                </form>
                            </td>
                            <td><a href="{{route('admin.order.edit',$order->id)}}">تعديل</a></td>
                            <td>
                                <form action="{{route('admin.order.delete',$order->id)}}">
                                   @csrf
                                   @method('delete')
                                   <button type="submit" class="del_order">حذف</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                        <script>
                            $('.del_order').click(function(event){
                                var del = confirm('هل تريد حذف التصنيف');
                                    if(!del){
                                        event.preventDefault();
                                    }
                            });
                        </script>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>صاحب الطلب</th>
                            <th>الوجبة</th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>المجموع</th>
                            <th>المقصف</th>
                            <th>حالة الطلب</th>
                            <th>تغيير حالة الطلب</th>
                            <th>تاريخ الطلب</th>
                            <th>اخر تحديث</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [

                {
                    extend: 'excelHtml5',
                    text:"تصدير اكسل",
                    class:"btn btn-primary",
                    exportOptions: {
                        columns: [ 0,1,2,3,4,5,6,7,8,9 ]
                    }
                },

                'colvis'
            ],
            "oLanguage": {

                "sSearch": " إبحث "
                }
        } );
    } );
    </script>

@endsection
