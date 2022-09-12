
@extends('layouts.site')
@section('content')
<style>

</style>
@include('dashboard._alert')


<div id="app">

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block"><span>الرسائل</span></h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">الرئيسية</a>
                        </li>
                        <li class="breadcrumb-item active"><span>عرض رسالة</span>
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

                    </h4>
                </div>


                <div class="card-content collapse show">

                    <div class="card-body" style="height: auto">


                        <div clas="row">
                            <form>
                                @csrf
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">البريد الالكتروني</label>
                                  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$contact->email}}">
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlSelect1"  class="">الاسم</label>
                                  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="احمد محمود" value="{{$contact->name}}">

                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlSelect2"  class="">عنوان الرسالة</label>

                                  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="السلام عليكم" value="{{$contact->title}}">

                                </div>
                                <div class="form-group ">
                                  <label for="exampleFormControlTextarea1"  class="">نص الرسالة</label>
                                  <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" value="">{{$contact->message}}</textarea>
                                </div>
                              </form>
                        </div>

                    </div>


                </div>


            </div>
        </div>


    </div>


                </div>
@endsection
