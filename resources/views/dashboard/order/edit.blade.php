
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
                تعديل طلب
            </div>
            <div class="card-body">

                <form  action="{{route('admin.order.update' , $order->id)}}" method="post">
                    @csrf

                    <fieldset class="form-group">
                        <label for="main_category_id" id="">الكمية</label>
                        <input type="number" class="form-control" name="quantity" value="{{$order->quantity}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="main_category_id" id="">الوجبة</label>
                        <input type="text" class="form-control" name="quantity" value="{{$order->meal->name}}" disabled>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="main_category_id" id="">السعر</label>
                        <input type="number" class="form-control" name="prices" value="{{$order->meal->price}}" disabled>
                        <input type="hidden" class="form-control" name="price" value="{{$order->meal->price}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="main_category_id" id="">صاحب الطلب</label>
                        <input type="text" class="form-control" name="quantity" value="{{$order->student->first_name." ".$order->student->last_name}}" disabled>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="main_category_id" id="">المدرسة والمقصف</label>
                        <input type="text" class="form-control" name="quantity" value="{{$order->canteen->school->name." ".$order->canteen->name}}" disabled>
                    </fieldset>

                    <fieldset class="form-group">

                        <select name="status" class="form-control">

                            <option value="انتظار">انتظار</option>
                            <option value="ملغي">ملغي</option>
                            <option value="مكتمل">مكتمل</option>

                        </select>

                    </fieldset>

                    <fieldset class="form-group">
                        <button type="submit"  class="btn btn-primary">تعديل الطلب</button>
                    </fieldset>

                </form>



            </div>
        </div>
    </div>
</div>



@endsection
