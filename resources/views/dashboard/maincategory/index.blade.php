
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
            <form action="{{ route('maincategory.create') }}" method='get'>
                <input type='submit' class="btn btn-primary" value="أضف تصنيف" />
            </form>
        </div>

        <div class='col-md-12'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                    التصنيفات
                </div>
                <div class="card-body">

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم التصنيف</th>
                                <th>الصورة</th>
                                <th>عملية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $categories as $category )
                                <tr>
                                    <td> {{$category->id}} </td>
                                    <td> {{$category->name}}</td>
                                    <td> <img src="{{asset($category->image)}}" width=75 style="border:1px solid #333" /></td>
                                    <td>
                                        <form action="{{route('maincategory.destroy' , $category->id)}}" method="post">
                                            <a href="{{route('maincategory.edit' , $category->id)}}" class="btn btn-primary btn-xs "><i class="la la-edit"></i></a>
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs del"><i class="la la-remove"></i></button>

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
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>اسم التصنيف</th>
                                <th>الصورة</th>
                                <th>عملية</th>
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
                            columns: [ 0,1 ]
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


