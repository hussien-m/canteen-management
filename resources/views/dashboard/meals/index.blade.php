
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

        <div class="col-md-6">
            <form action="{{ route('meal.cretate') }}" method='get'>
                <input type='submit' class="btn btn-primary" value="أضف وجبة" />
            </form>
        </div>

        <div class='col-md-12'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                    الوجبات
                </div>
                <div class="card-body">

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>اسم الوجبة</th>
                                <th>العسر</th>
                                <th>اسم المدرسة</th>
                                <th>اسم المقصف</th>
                                <th>الصورة</th>
                                <th>تم انشائها في</th>
                                <th>حدث</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $meals as $meal )
                            <tr>
                                <td> {{$meal->name}} </td>
                                <td> {{ number_format((float)$meal->price,3)}} ر.ع </td>
                                <td> {{$meal->canteen->school->name}} </td>
                                <td> {{$meal->canteen->name}} </td>
                                <td>
                                    @foreach ($meal->images as $img )
                                       <img src="{{ asset($img->name) }}"  class="img-thumbnail" width="100" height="100" />
                                        @break
                                    @endforeach
                                </td>
                                <td> {{$meal->created_at}} </td>
                                <td>

                                    <form action="{{route('admin.meal.delete' , $meal->id)}}" method="post">
                                        @csrf
                                        <a class="btn btn-primary" href="{{route('admin.meal.edit' , $meal->id)}}">تعديل</a>
                                       <button type="submit"  class="btn btn-danger del">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <script>
                                $('.del').click(function(event){
                                    var del = confirm('هل تريد حذف الوجبة');
                                    if(!del){
                                        event.preventDefault();
                                    }
                                })
                            </script>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>اسم الوجبة</th>
                                <th>العسر</th>
                                <th>اسم المدرسة</th>
                                <th>اسم المقصف</th>
                                <th>الصورة</th>
                                <th>تم انشائها في</th>
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
                            columns: [ 0,1,2,3,4,5 ]
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


