@extends('layouts.site')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"><span>@lang('halls.order-booking')</span></h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang('halls.index')</a>
                        </li>
                        <li class="breadcrumb-item active"><a href="{{route('admin.dashboard')}}"><span>@lang('admin.dashboard')</span></a>
                        </li>
                        <li class="breadcrumb-item active"><span>@lang('admin.dashboard')</span>
                        </li>
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
                    <form class="form" action="{{route('admin.changePostPassword',$user_id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <h4 class="form-section"><i class="ft-user"></i> تغيير كلمة المرور</h4>
                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="projectinput1">كلمة المرور الجديدة</label>
                                    <input type="password"  class="form-control"  name="password" value="">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6 mb-2">
                                    <label for="projectinput1">تأكيد كلمة المرور</label>
                                    <input type="password"  class="form-control"  name="re-password" value="">
                                </div>
                            </div>

                        </div>
                        <div class="form-actions top">
                            <button type="reset" class="btn btn-danger mr-1">
                                <i class="ft-x"></i> مسح البيانات
                            </button>
                            <button type="submit" class="btn btn-success">
                                تغيير كلمة المرور
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
