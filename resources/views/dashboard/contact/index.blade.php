
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

                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>

                            <th>صاحب الطلب</th>
                            <th>الرسالة</th>
                            <th>تارريخ الارسال</th>
                            <th>حدث</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact )
                            <tr>

                                <td> {{ $contact->name }} </td>
                                <td> {{ $contact->title }} </td>
                                <td> {{ $contact->created_at }} </td>
                                <td>
                                    <form action="{{route('contact.delete', $contact->id )}}" method="post">
                                        <a href="{{route('contact.show',$contact->id)}}" class="btn btn-success">عرض</a>
                                        @csrf
                                        <button type="submit" class="btn btn-danger del" >حذف</button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach

                        <script>
                            $('.del').click(function(event){
                                var del = confirm('هل تريد حذف التصنيف');
                                if(!del){
                                    event.preventDefault();
                                }
                            })
                        </script>

                    </tbody>
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
                        columns: [ 0,1,2,3,4,5,6,7,8 ]
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
