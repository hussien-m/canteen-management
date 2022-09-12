
@extends('layouts.site')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"><span>اضافة مستخدم</span></h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('dashboard.dashboard')</a>
                        </li>
                        <li class="breadcrumb-item active"><span>اضافة مدير</span>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard._alert')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    <form class="form" action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> المعلومات الشخصية</h4>
                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="projectinput1">الاسم كامل</label>
                                    <input type="text" id="projectinput1" class="form-control" placeholder="First Name" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="projectinput3">البريد الالكتروني</label>
                                    <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email" value="{{old('email')}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    <label for="projectinput3">كلمة المرور</label>
                                    <input type="password" id="projectinput3" class="form-control" placeholder="Password" name="password" {{old('password')}}>
                                </div>
                            </div>


                            <div class="row">

                                <div class="form-group col-md-6 mb-2">
                                    <label for="projectinput4">الدور</label>
                                   <select name="role" class="form-control">
                                       <option value="0" disabled selected>اختر دور</option>
                                       @foreach ( $roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                       @endforeach
                                   </select>
                                </div>

                            </div>

                        </div>
                        <div class="form-actions top">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                            <i class=" la la-check-square-o"></i>حفظ المستخدك</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
