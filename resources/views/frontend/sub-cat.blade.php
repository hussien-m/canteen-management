@extends('frontend.meal.home')

@section('content')

<section class="py-5 bg-light">
    <div class="container">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">الوجبات المدرسية</h1>
        </div>
        <div class="col-lg-6 text-lg-end">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
              <li class="breadcrumb-item"><a class="text-dark" href="{{url('/')}}">الصفحة الرئيسية</a></li>
              <li class="breadcrumb-item active" aria-current="pages">تصفح الوجبات</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

@include('frontend.testMeal')


@endsection
