
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
                        ادخال طلاب الى مدرسة ( {{ $school->name}})
                    </b>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class='p-2'><b>{{$error}}</b></div>
                        @endforeach
                    @endif
                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <input type="hidden" name='school_id' value="{{ $school->id }}" />
                        <br>
                        <button class="btn btn-success">تحميل الى النظام</button>
                        <a class="btn btn-warning" href="{{ route('export') }}">تحميل على الحاسب</a>
                    </form>
                </div>
            </div>
        </div>
        {{-- sadsd
        <div class='col-md-12'>
            <div class="card bg-light mt-3">
                <div class="card-header">
                    <b>                     بيانات الطلاب </b>
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>الاسم الاول</th>
                                <th>الاسم الاخير</th>
                                <th>رقم الهاتف</th>
                                <th>تم انشائه في</th>
                                <th>تم تحديثه في</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                                <tr>
                                    <td>{{$student->first_name}}</td>
                                    <td>{{$student->last_name}}</td>
                                    <td>{{$student->phone}}</td>
                                    <td>{{$student->created_at}}</td>
                                    <td>{{$student->updated_at}}</td>
                                </tr>
                            @empty

                            <b>لايوجد سجلات للطلاب</b>

                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>الاسم الاول</th>
                                <th>الاسم الاخير</th>
                                <th>رقم الهاتف</th>
                                <th>تم انشائه في</th>
                                <th>تم تحديثه في</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        --}}
    </div>

@endsection


