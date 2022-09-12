@extends('layouts.site')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"><span>تعديل مدير</span></h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('dashboard.dashboard')</a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">@lang('dashboard.user-system')</a>
                        </li>
                        <li class="breadcrumb-item active"><span>تعديل مدير</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card" style="">
            <div class="card-header">

                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">

                    <form class="form" action="{{route('users.update',$admin->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-block alert-success">
                                <i class=" fa fa-check cool-green "></i>
                                {{ nl2br(Session::get('success')) }}
                            </div>
                        @endif

                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> المعلومات الشخصية</h4>
                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="">الاسم الاول</label>
                                    <input type="text"  class="form-control" placeholder="First Name" name="name" value="{{$admin->name}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="">البريد الالكتروني</label>
                                    <input type="text"  class="form-control" placeholder="E-mail" name="email" value="{{$admin->email}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="">كلمة المرور</label>
                                    <input type="password"  class="form-control" placeholder="password" name="password" value="{{$admin->password}}">
                                </div>
                            </div>

                            <h4 class="form-section"><i class="ft-clipboard"></i> دور المستخدم</h4>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6 col-12 mb-2">
                                <label>الدور</label>
                                <label class="file center-block">
                                    <select name="role" class="form-control">
                                        <option disabled selected>اختر الدور</option>
                                        @foreach(\App\Models\Role::get() as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> حفظ التعديلات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
