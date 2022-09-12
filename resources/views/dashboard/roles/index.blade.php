@extends('layouts.site')

@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"><span>الادوار والصلاحيات</span></h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">@lang('dashboard.dashboard')</a>
                        </li>
                        <li class="breadcrumb-item active"><span>الادوار والصلاحيات</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="header-styling">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                         <b style="color: #ff0000"></b>
                        <a href="{{route('roles.create')}}" class="btn btn-success menu-item">اضف دور</a>
                    </h4>


                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload" id="reload"><i class="ft-rotate-cw" id="reload2"></i></a></li>

                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action=""><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>


                <div class="card-content collapse show">

                    <div class="card-body" style="height: auto">

                        <div class="table-responsive">
                            @if(Session::has('success'))
                                <div class="alert alert-block alert-success">
                                    <i class=" fa fa-check cool-green "></i>
                                    {{ nl2br(Session::get('success')) }}
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="alert alert-block alert-danger">
                                    <i class=" fa fa-check cool-green "></i>
                                    {{ nl2br(Session::get('error')) }}
                                </div>
                            @endif
                            <table class="table">

                                <thead>
                                <th>#</th>
                                <th>الدور</th>
                                <th>انشئ في</th>
                                <th>حدث في</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach ($roles as $key=>$role)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>{{$role->created_at}}</td>
                                        <td>{{$role->updated_at}}</td>
                                        <td>

                                            <form action="{{route('roles.destroy',$role->id)}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <a href="{{route('roles.edit',$role->id)}}" class="btn btn-primary menu-item">تعديل</a>
                                                <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>



                            </table>
                        </div>


                    </div>


                </div>


            </div>
        </div>


    </div>


@endsection
