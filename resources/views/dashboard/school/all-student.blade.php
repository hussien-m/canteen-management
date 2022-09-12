
@extends('layouts.site')
@section('content')
<style>
.card-body{
    background-color:#f2f2f2;
    border:0 0 1px solid #000;

}

</style>
    <div class="row">

        <div class='col-md-12'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                    <b>                     بيانات الطلاب </b>
                </div>
                <div class="card-body">
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
                            columns: [ 0,1,2,3,4,5,6,7,8,9 ]
                        },


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


