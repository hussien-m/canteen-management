
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
                    اضافة وجبة
                </div>
                <div class="card-body">

                    <form  action="{{route('category.store')}}" method="post">
                        @csrf

                        <fieldset class="form-group">
                            <label for="main_category_id" id="">التصنيف الاساسي</label>
                            <select name="main_category_id" class="form-control">
                                <option selected disabled>اختار التصنيف الاساسي</option>
                                @foreach($main_category as $main_cat)
                                    <option value="{{$main_cat->id}}">{{$main_cat->name}}</option>
                                @endforeach
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="name" id="">اسم التصنيف</label>
                            <input type="text" name="name" class="form-control" id="basicInput">
                        </fieldset>


                        <fieldset class="form-group">

                            <input type="submit" class="btn btn-primary"  value="حفظ التصنيف">

                        </fieldset>

                    </form>



                </div>
            </div>
        </div>
    </div>

@endsection


