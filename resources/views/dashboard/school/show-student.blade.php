
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
                <b>                     اضف الطلاب </b>
            </div>
            <div class="card-body">

                <form  action="{{route('admin.store.student')}}" method="post" >
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <fieldset class="form-group">
                                <label for="name" id="">اسم الطالب الاول</label>
                                <input type="text" name="first_name" class="form-control" id="basicInput">
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset class="form-group">
                                <label for="name" id="">اسم الطالب الاخير</label>
                                <input type="text" name="last_name" class="form-control" id="basicInput">
                            </fieldset>
                        </div>

                        <div class="col-md-3">
                            <fieldset class="form-group">
                                <label for="name" id="">رقم الجوال</label>
                                <input type="text" name="phone" class="form-control" id="basicInput">
                            </fieldset>
                        </div>

                        <div class="col-md-3">
                            <fieldset class="form-group">
                                <label for="name" id="">المدرسة</label>
                                <select class="form-control" name="school_id">
                                    @foreach ( App\Models\School::get() as $school)
                                            <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>



                    </div>

                    <fieldset class="form-group">
                        <button class="btn btn-primary" type="submit">اضف طالب</button>
                    </fieldset>

                </form>

            </div>
        </div>
    </div>
</div>
    <div class="row">

        <div class='col-md-12'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                    <b>                     بيانات الطلاب </b>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <form class="" action="{{route('all-student')}}" method="get">
                                <label>عرض حسب مدرسة</label>
                                <select class="form-control" name="school_id" onchange="this.form.submit()">
                                    <option selected disabled>اختر</option>
                                    @foreach (App\Models\School::get() as $school )
                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                        <div class="col-md-6">

                            <?php

                              if( isset($_GET['school_id'])){?>
                              <p> </p>
                              <a href="{{route('export.stu', $sch_id)}}" class="btn btn-primary">تصدير اكسل</a>

                              <?php } ?>

                        </div>

                    </div>




                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>اسم المدرسة</th>
                                <th>رقم الهاتف</th>
                                <th>تم انشائه في</th>
                                <th>حدث</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{ $student->first_name . ' '. $student->last_name }}</td>
                                    <td>{{ $student->school->name }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td>{{ $student->created_at }}</td>
                                    <td>


                                        <form action="{{route('admin.delete.student' , $student->id)}}" method="post">
                                            @csrf
                                            <a class="btn btn-primary" href="{{route('admin.edit.student' , $student->id)}}">تعديل</a>
                                           <button type="submit"  class="btn btn-danger del">حذف</button>
                                        </form>
                                        <script>
                                            $('.del').click(function(event){
                                                var del = confirm('هل تريد حذف الوجبة');
                                                if(!del){
                                                    event.preventDefault();
                                                }
                                            })
                                        </script>
                                    </td>
                                </tr>
                            @empty

                            <b>لايوجد سجلات للطلاب</b>

                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>اسم الطالب</th>
                                <th>اسم المدرسة</th>
                                <th>رقم الهاتف</th>
                                <th>تم انشائه في</th>
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
                            columns: [ 0,1,2,3]
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


