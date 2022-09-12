
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

                    <form  action="{{route('maincategory.store')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <fieldset class="form-group">
                            <label for="name" id="">اسم التصنيف</label>
                            <input type="text" name="name" class="form-control" id="basicInput">
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="price" id=""> صور التصنيف</label>
                            <input type="file" name="image" class="form-control">

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


