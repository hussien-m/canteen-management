@extends('frontend.meal.home')

@section('content')

<section class="py-5 bg-light">
    <div class="container" style="direction: rtl">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">من نحن</h1>
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


  <section class="py-5 container">
    @include('dashboard._alert')

    <div class="text-right"><h3>{{$about->site_name}} :</h3></div>
    <div class="text-right">
        <p>{{$about->site_desc}}</p>
    </div>
    <div class="text-center mt-5">
        <h3><p>يمكنك  التواصل معنا من خلال</p></h3>
         <p><b>رقم الهاتف :{{$about->phone}}</b></p>
        <p><b>البريد الاالكتروني :{{$about->email}}</b></p>
    </div>


</section>



@endsection
