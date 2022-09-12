
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



        <div class='col-md-4'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                       اضافة مدرسة
                </div>
                <div class="card-body">


                            <form action="{{ route('add-school') }}" method="post">
                                @csrf
                                <label for='school'>اسم مدرسة</label>
                                <fieldset class="form-group">
                                    <input id="school" name="name" type="text" class="form-control" id="basicInput" value="{{old('name')}}">
                                </fieldset>
                                <button class="btn btn-primary" type='submit'>اضافة</button>
                            </form>
                </div>

            </div>
        </div>

        <div class='col-md-4'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                      أضف  مقصف
                </div>
                <div class="card-body">


                            <form action="{{ route('add-canteen') }}" method="post">
                                @csrf
                                <label for='school'>اسم المقصف</label>
                                <div class="form-group">
                                    <input id="school" name="name" type="text" class="form-control" id="basicInput" value="{{old('name')}}">
                                </div>

                                <div class="form-group">
                                    <select name="school_id" class="form-control">
                                        <option selected disabled>اختار مدرسة للمقصف</option>
                                        @forelse ($schools as $school )
                                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                                        @empty
                                        <option selected disabled>لايوجد مدارس</option>
                                        @endforelse
                                    </select>
                                </div>
                                <button class="btn btn-primary" type='submit'>اضافة</button>
                            </form>
                </div>

            </div>
        </div>

        <div class='col-md-4'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                        اضافة مدارس من خلال ملف اكسل
                </div>
                <div class="card-body">


                            <form action={{route('import-school')}}  method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for='school'>ملف مدرسة</label>
                                <input type="file" name="file" class="form-control">
                                <input type='submit' class="btn btn-primary mt-1" value="استيراد ملف المدارس">
                            </form>
                </div>

            </div>
        </div>


        <div class='col-md-12'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                     معلومات المدارس
                </div>
                <div class="card-body">

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>اسم المدرسة</th>
                                <th>الطلاب</th>
                                <th>اسم المقصف</th>
                                <th>عملية</th>
                                <th>تم انشائها في</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schools as $school)
                                <tr>
                                    <td>{{ $school->name }}</td>
                                    <td><a href="{{ route('show-student', $school->id) }}">عرض الطلاب</a></td>
                                    <td>
                                        {{ $school->canteen->name ?? "لايوجد لها مقصف" }}
                                    </td>
                                    <td> <a href="{{ route('add-student', $school->id) }}">أضف طلاب </a> </td>
                                    <td>{{ $school->created_at }}</td>

                                    <td>
                                        <form action="{{route('admin.delete.school' , $school->id)}}" method="post">
                                            @csrf
                                            <a class="btn btn-primary" href="{{route('admin.edit.school' , $school->id)}}">تعديل</a>
                                           <button type="submit"  class="btn btn-danger del">حذف</button>
                                        </form>
                                    </td>


                                </tr>
                            @empty

                            <b>لايوجد سجلات للطلاب</b>

                            @endforelse

                            <script>
                                $('.del').click(function(event){


                                    var del = confirm('تنبيه عند حذف مدرسة سيتم حذف جميع المقاصف والطلاب والوجبات التي تتعلق بهذه المدرسة');


                                    if(!del){
                                        event.preventDefault();
                                    }
                                })
                            </script>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>اسم المدرسة</th>
                                <th>الطلاب</th>
                                <th>اسم المقصف</th>
                                <th>عملية</th>
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
                            columns: [ 0,1,2,3,4 ]
                        }
                    },

                    'colvis'
                ]
            } );
        } );
        </script>
@endsection


