{{ csrf_field() }}
{{ method_field('put') }}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-block alert-success">
        <i class=" fa fa-check cool-green "></i>
        {{ nl2br(Session::get('success')) }}
    </div>
@endif

<div class="form-body">
    <h4 class="form-section"><i class="ft-user"></i> المعلومات الشخصية</h4>
    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput1">الاسم الاول</label>
            <input type="text" id="projectinput1" class="form-control" placeholder="First Name" name="first_name" value="{{$user[0]->first_name}}">
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput2">الاسم الاخير</label>
            <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" name="last_name" value="{{$user[0]->last_name}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput3">البريد الالكتروني</label>
            <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email" value="{{$user[0]->email}}">
        </div>
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput4">رقم المحمول</label>
            <input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone" value="{{$user[0]->phone}}">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6 mb-2">
            <label for="projectinput4">اسم المسنخدم</label>
            <input type="text" id="projectinput4" class="form-control" placeholder="User Name" name="user_name" value="{{$user[0]->user_name}}">
        </div>
    </div>
    <h4 class="form-section"><i class="ft-clipboard"></i> بيانات المستخدم</h4>
    <div class="row">
        <div class="form-group col-6 mb-2">
            <label for="projectinput5">تاريخ الميلاد</label>
            <input type="date" id="projectinput5" class="form-control" placeholder="Company Name" name="date_birth" value="{{$user[0]->date_birth}}">
        </div>
    </div>

</div>
<div class="form-actions">
    <button type="button" class="btn btn-warning mr-1">
        <i class="ft-x"></i> Cancel
    </button>
    <button type="submit" class="btn btn-primary">
        <i class="la la-check-square-o"></i> Save
    </button>
</div>
