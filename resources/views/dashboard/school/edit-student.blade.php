
@extends('layouts.site')
@section('content')
<style>
.card-body{
    background-color:#f2f2f2;
    border:0 0 1px solid #000;

}

</style>
    <div class="row">
        <div class='col-md-12'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                    <b>
                       تعديل طالب
                    </b>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class='p-2'><b>{{$error}}</b></div>
                        @endforeach
                    @endif
                    <form action="{{ route('admin.update.student',$student->id) }}" method="POST">
                        @csrf
                        <fieldset class="form-group">
                            <label for="main_category_id" id="">اسم الطالب الاول</label>
                            <input type="text" name="first_name" class="form-control" value="{{$student->first_name ?? old('first_name')}}"  />
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="main_category_id" id="">اسم الطالب الثاني</label>
                            <input type="text" name="last_name" class="form-control"  value="{{$student->last_name ?? old('last_name')}}" />
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="main_category_id" id="">رثقم الهاتف</label>
                            <input type="number" name="phone" class="form-control" value="{{$student->phone ?? old('phone')}}"  />
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="name" id="">المدرسة</label>
                            <select class="form-control" name="school_id">
                                @foreach ($schools as $school)
                                    <option value="{{$school->id}}">{{$school->name}}</option>
                                @endforeach
                            </select>

                        </fieldset>


                        <fieldset class="form-group">

                            <input type="submit" class="btn btn-primary"  value="حفظ الطالب">

                        </fieldset>

                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


