
@extends('layouts.site')

@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="info">{{$orders->count()}}</h3>
                <h6>عدد الطلبات</h6>
              </div>
              <div>
                <i class="icon-basket-loaded info font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{$orders->count()}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="warning">{{$orders->sum('total') }} د.ع</h3>
                <h6>مجموع الطلبات</h6>
              </div>
              <div>
                <i class="icon-pie-chart warning font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 5%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="success">{{$s_c = \App\Models\Student::count()}}</h3>
                <h6>عدد الطلاب</h6>
              </div>
              <div>
                <i class="icon-user-follow success font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: {{$s_c}}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="danger">{{$s_m = \App\Models\Meal::count()}}</h3>
                <h6>عدد الوجبات</h6>
              </div>
              <div>
                <i class="icon-heart danger font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: {{$s_m}}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="info">{{$s_s = App\Models\School::count()}}</h3>
                <h6>عدد المدارس</h6>
              </div>
              <div>
                <i class="icon-basket-loaded info font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: {{$s_s}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="warning">{{$s_cc = \App\Models\Canteen::count()}}</h3>
                <h6>عدد المقاصف</h6>
              </div>
              <div>
                <i class="icon-pie-chart warning font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width:{{$s_cc}}%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="success">{{$s_u = \App\Models\User::count()}}</h3>
                <h6>عدد مدراء النظام</h6>
              </div>
              <div>
                <i class="icon-user-follow success font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
      <div class="card pull-up">
        <div class="card-content">
          <div class="card-body">
            <div class="media d-flex">
              <div class="media-body text-left">
                <h3 class="danger">{{$s_cat = \App\Models\Category::count()}}</h3>
                <h6>عدد التصنيفات</h6>
              </div>
              <div>
                <i class="icon-heart danger font-large-2 float-right"></i>
              </div>
            </div>
            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
              <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: {{$s_cat}}%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div id="recent-transactions" class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">اخر الطلبات</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
        </div>
        <div class="card-content">
          <div class="table-responsive">
            <table id="recent-orders" class="table table-hover table-xl mb-0">
              <thead>
                <tr>
                  <th class="border-top-0">الحالة</th>
                  <th class="border-top-0">رقم الطلب</th>
                  <th class="border-top-0">صاحب الطلب</th>
                  <th class="border-top-0">الوجبة</th>
                  <th class="border-top-0">التصنيف</th>
                  <th class="border-top-0">السعر</th>
                  <th class="border-top-0">الكمية</th>
                  <th class="border-top-0">المجموع</th>
                </tr>
              </thead>
              <tbody>
                 @foreach($orders as $order)

                <tr>
                  <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>{{$order->status}}</td>
                  <td class="text-truncate"><a href="#">{{ $order->id }}</a></td>
                  <td class="text-truncate">
                    <span>{{$order->student->first_name .' '.$order->student->last_name}}</span>
                  </td>
                  <td class="text-truncate">
                    {{ $order->meal->name }}
                  </td>
                  <td class="text-truncate">
                    <button type="button" class="btn btn-sm btn-outline-danger round">{{$order->meal->category->name}}</button>
                  </td>
                  <td class="text-truncate">
                    {{ number_format((float)$order->meal->price,3)}} ر.ع 
                  </td>
                  <td class="text-truncate">
                      {{ $order->quantity }}
                  </td>
                  <td class="text-truncate">{{ number_format((float)$order->total,3)}} ر.ع 
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
