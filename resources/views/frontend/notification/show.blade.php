@extends('frontend.meal.home')


@section('content')
<div class="container">
<section class="py-5 bg-light">
    <div class="container" style="direction: rtl">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">الاشعارات</h1>
        </div>
        <div class="col-lg-6 text-lg-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
              <li class="breadcrumb-item"><a class="text-dark" href="{{url('/')}}">الرئيسية</a></li>

            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>


  <section class="py-5">
    <h2 class="h5 text-uppercase mb-4">جميع الاشعارات</h2>
    <div class="row">
      <div class="col-lg-12 mb-4 mb-lg-0">
        <!-- CART TABLE-->
        <div class="table-responsive mb-4">
          <table class="table text-nowrap">
            <thead class="bg-light">
              <tr>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">الاشعار</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">الكمية</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">السعر</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">المجموع</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">حالة الطلب</strong></th>
                <th class="border-0 p-3" scope="col"> <strong class="text-sm text-uppercase">تاريخ الارسال</strong></th>
              </tr>
            </thead>
            <tbody class="border-0">

                @foreach ($noti_show as $data)

                        <tr>
                            <td class="p-3 align-middle border-light">
                            <p class="mb-0 small">
                                 تم طلب {{ $data->data['meal'] }}
                            </p>
                            </td>
                            <td class="p-3 align-middle border-light">
                            <p class="mb-0 small">{{ $data->data['quantity'] }}</p>
                            </td>
                            <td class="p-3 align-middle border-light">
                            <p class="mb-0 small">ر.ع {{ number_format((float)$data->data['price'],3)}}</p>
                            </td>
                            <td class="p-3 align-middle border-light">
                            <p class="mb-0 small">{{ number_format((float)$data->data['total'],3)}}ر.ع </p>
                            </td>

                            <td class="p-3 align-middle border-light">
                            <p class="mb-0 small">{{ $data->data['status'] }}</p>
                            </td>

                            <td class="p-3 align-middle border-light">
                                <p class="mb-0 small">
                                    {{ $data->created_at->diffForHumans() }}
                                </p>
                            </td>
                        </tr>
                @endforeach


            </tbody>
          </table>
        </div>
        <!-- CART NAV-->

      </div>
      <!-- ORDER TOTAL-->
      </div>
    </section>
</div>

@endsection
