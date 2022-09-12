@extends('layouts.site')
@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"><span>@lang('dashboard.user-system')</span></h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">

                    </ol>
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-block alert-danger">
            <i class=" fa fa-check cool-green "></i>
            {!!  implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-block alert-success">
            <i class=" fa fa-check cool-green "></i>
            {{ nl2br(Session::get('success')) }}
        </div>
    @endif
    <div class="col-md-12">
        <div class="card" style="">
            <div class="card-header">
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            </div>
            <div class="card-content collpase show">
                <div class="card-body">
                    @if ($role->name != "No Permission" and $role->name !="Super Admin")
                    <form class="form" action="{{route('roles.update', $role->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i>تعديل دور</h4>
                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="projectinput1">اسم الدور</label>
                                    <input type="text" id="projectinput1" class="form-control" placeholder="اسم الدور" name="name" value="{{$role->name}}">
                                </div>
                            </div>

                        </div>

                        <div class="form-body">

                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    @php
                                        $permissions = ['users','students','roles','schools','canteens','settings','orders'];
                                    @endphp
                                    <div class="card" style="height: 267.2px;">
                                        <div class="card-header">
                                            <h4 class="card-title">الصلاحيات</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <ul class="nav nav-tabs nav-top-border no-hover-bg">
                                                   @foreach($permissions as $index=>$permission)
                                                    <li class="nav-item">
                                                        <a class="nav-link {{$index == 0 ? 'active':''}}" id="base-tab11" data-toggle="tab" aria-controls="tab11" href="#{{$permission}}" aria-expanded="true">{{$permission}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                <div class="tab-content px-1 pt-1">
                                                    @foreach($permissions as $index=>$permission)
                                                    <div role="tabpanel" class="tab-pane {{$index == 0 ? 'active':''}}" id="{{$permission}}" aria-expanded="true" aria-labelledby="base-tab11">

                                                        @foreach(config('permissions.'.$permission) as $code => $label)
                                                            <fieldset class="checkboxsas">
                                                                <label>
                                                                    <input type="checkbox" name="permissions[]" @if(in_array($code,$role_permission)) checked @endif value="{{$code}}"> {{$label}}
                                                                </label>
                                                            </fieldset>
                                                        @endforeach



                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="form-actions top">
                            <button type="reset" class="btn btn-danger mr-1">
                                <i class="ft-x"></i> مسح البيانات
                            </button>
                            <button type="submit" class="btn btn-success">
                                تعديل
                            </button>
                        </div>
                    </form>
                    @else
                       لايمكن تعديل هذه الصلاحية
                    @endif
                </div>

            </div>
        </div>
    </div>

@endsection
