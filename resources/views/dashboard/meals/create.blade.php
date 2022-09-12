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

                    <form  action="{{route('meal.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="form-group">
                            <label for="name" id="">اسم الوجبة</label>
                            <input type="text" name="name" class="form-control" id="basicInput">
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="price" id="">السعر</label>
                            <input type="number" name="price" class="form-control" id="price"  min="0" step="0.001" max="100">
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="category" id="">التصنيف</label>
                            <select name="category" id="maincategory" class="form-control">
                                <option selected disabled>اختيار التصنيف</option>
                                @foreach ($main_category  as $cat )
                                <option value="{{$cat->id}}"> {{ $cat->name }} </option>
                            @endforeach

                            </select>
                        </fieldset>


                        <fieldset class="form-group">
                            <label for="category" id="">التصنيف الفرعي</label>
                            <select class="browser-default custom-select" name="subcategory" id="subcategory">
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="price" id="">المدرسة</label>
                            <select name="school" class="form-control school" id="school">
                                <option selected disabled>اختيار مدرسة</option>
                                @foreach ($schools as $school )
                                    <option value="{{$school->id}}"> {{ $school->name }} </option>
                                @endforeach
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="price" id="">المقصف</label>
                            <select class="browser-default custom-select" name="canteen" id="canteen">
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="price" id=""> صور الوجبة (يمكن اختيار اكثر من صورة)</label>
                            <input type="file" name="images[]" class="form-control" multiple>

                        </fieldset>

                        <fieldset class="form-group">

                            <input type="submit" class="btn btn-primary"  value="حفظ الوجبة">

                        </fieldset>

                    </form>

                    <script type="text/javascript">


                        $(document).on('change','.school',function(){

                        var school_id=$(this).val();

                        var div=$(this).parent();

                        $("#canteen").html(" ");


                        $.ajax({

                            type:'get',
                            url:"{{route('meal.schools')}}",
                            data:{'id':school_id},
                            success:function(data){
                                document.getElementById('canteen').innerHTML+='<option value="0" disabled="true" selected="true">اختر المقصف</option>';

                                for(var i=0;i<data.length;i++){
                                    document.getElementById('canteen').innerHTML+='<option value="'+data[i].id+'">'+data[i]['name']+'</option>';
                                }
                            },
                            error:function(){
                            }
                        });
                        });

                    </script>



                    <script type="text/javascript">


                        $(document).on('change','#maincategory',function(){

                        var main_category_id=$(this).val();

                        var div=$(this).parent();

                        $("#subcategory").html(" ");


                        $.ajax({

                            type:'get',
                            url:"{{route('find.cat')}}",
                            data:{'id':main_category_id},
                            success:function(data){
                                document.getElementById('subcategory').innerHTML+='<option value="0" disabled="true" selected="true">اختر التصنيف الفرعي</option>';

                                for(var i=0;i<data.length;i++){

                                        document.getElementById('subcategory').innerHTML+='<option value="'+data[i].id+'">'+data[i]['name']+'</option>';

                                }
                            },
                            error:function(){
                            }
                        });
                        });

                    </script>



                </div>
            </div>
        </div>
    </div>

@endsection


