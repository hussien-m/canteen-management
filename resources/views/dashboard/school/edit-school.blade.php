
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
                    تعديل مدرسة
                </div>
                <div class="card-body">

                    <form  action="{{route('admin.update.school',$school->id)}}" method="post">

                        @csrf

                        <fieldset class="form-group">
                            <label for="name" id="">اسم المدرسة</label>
                            <input type="text" name="name" class="form-control" id="basicInput" value="{{$school->name}}">
                        </fieldset>


                        <fieldset class="form-group">

                            <input type="submit" class="btn btn-primary"  value="حفظ التعديل">

                        </fieldset>

                    </form>



                </div>
            </div>
        </div>
    </div>

@endsection


