
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
            <form action="{{ route('users.create') }}" method='get'>
                <input type='submit' class="btn btn-primary" value="أضف مستخدم" />
            </form>
        </div>

        <div class='col-md-12'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                    المستخدمين
                </div>
                <div class="card-body">

                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th>
                                <th>دور المستخدم</th>
                                <th>عملية</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $users as $user )
                                <tr>
                                    <td> {{$user->id}} </td>
                                    <td> {{$user->name}} </td>
                                    <td> {{$user->email}}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            {{$role->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{route('users.destroy' , $user->id)}}" method="post">
                                            <a href="{{route('users.edit' , $user->id)}}" class="btn btn-primary btn-xs "><i class="la la-edit"></i></a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-xs del"><i class="la la-remove"></i></button>
                                            <script>
                                                $('.del').click(function(event){
                                                    var del = confirm('هل تريد حذف المستخدم');
                                                    if(!del){
                                                        event.preventDefault();
                                                    }
                                                })
                                            </script>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th>
                                <th>دور المستخدم</th>
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
                            columns: [ 0,1,2,3 ]
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


