


@if($admins->count() < 1 )
<div class="alert alert-icon-left alert-arrow-left alert-danger alert-dismissible mb-2" role="alert">
    <span class="alert-icon"><i class="la la-thumbs-o-down"></i></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
    <strong>عذرا!</strong> لا يوجد <a href="#" class="alert-link">تطابق في البحث</a>
  </div>
@else
<div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الاميل</th>
                <th>الصورة</th>
                <th>الحالة</th>
                <th>الدور</th>
                <th>حدث</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $key=>$admin)
                @include('dashboard.admin.admin-row')
            @endforeach
            </tbody>

        </table>
        {{$admins->links()}}

@endif
</div>
