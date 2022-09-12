
@extends('layouts.site')
@section('content')
<style>
.card-body{
    background-color:#f2f2f2;
    border:0 0 1px solid #000;

}

</style>

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">صفحة من نحن</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('dashboard.dashboard')</a>
            </li>
            <li class="breadcrumb-item active">@lang('dashboard.settings')
            </li>
          </ol>
        </div>
      </div>
    </div>
</div>

@include('dashboard._alert')
<form action="{{route('about.store')}}" method="post">
    @csrf
<div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card" style="">
            <div class="card-header">
                <h4 class="card-title">صفحة من نحن</h4>
            </div>
            <div class="card-block">
                <div class="card-body">

                    <fieldset class="form-group">
                        <label class="text-muted">اسم الموقع</label>
                        <input type="text" name="site_name" class="form-control" value="{{$about->site_name}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="text-muted">عنا</label>
                        <textarea name="site_desc" class="form-control"   rows="15" style="resize:none">{{$about->site_desc}}</textarea>
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="text-muted">رقم الهاتف</label>
                        <input type="text" name="phone" class="form-control" value="{{$about->phone}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="text-muted">البريد الالكتروني</label>
                        <input type="text" name="email" class="form-control" value="{{$about->email}}">
                    </fieldset>


                    <fieldset class="form-group">
                        <label class="text-muted">فيسبوك</label>
                        <input type="text" name="facebook" class="form-control" value="{{$about->facebook}}">
                    </fieldset>


                    <fieldset class="form-group">
                        <label class="text-muted">تويتر</label>
                        <input type="text" name="tiwtter" class="form-control" value="{{$about->tiwtter}}">
                    </fieldset>


                    <fieldset class="form-group">
                        <label class="text-muted">انستجرام</label>
                        <input type="text" name="instagram" class="form-control" value="{{$about->instagram}}">
                    </fieldset>

                </div>
            </div>
        </div>
    </div>
</div>


<fieldset class="form-group">

    <button class="btn btn-primary">حفظ الاعدادات</button>

</fieldset>

</form>





@endsection


