@extends('frontend.meal.home')

@section('content')


<section class="py-5 bg-light">
    <div class="container" style="direction: rtl">
      <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
        <div class="col-lg-6">
          <h1 class="h2 text-uppercase mb-0">اتصل بنا</h1>
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
        <div clas="row">
            <form action="{{route('contact.store')}}" method="post">
                @csrf
                <div class="form-group m-2">
                  <label for="exampleFormControlInput1" class="m-2">البريد الالكتروني</label>
                  <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{old('email')}}">
                </div>
                <div class="form-group  m-2">
                  <label for="exampleFormControlSelect1"  class="m-2">الاسم</label>
                  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="احمد محمود" value="{{old('name')}}">

                </div>
                <div class="form-group  m-2">
                  <label for="exampleFormControlSelect2"  class="m-2">عنوان الرسالة</label>

                  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="السلام عليكم" value="{{old('title')}}">

                </div>
                <div class="form-group  m-2">
                  <label for="exampleFormControlTextarea1"  class="m-2">نص الرسالة</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" value="{{old('message')}}"></textarea>
                </div>

                <div class="form-group  m-2">
                    <button class="btn btn-primary" type="submit">إرسال الرسالة</button>
                </div>
              </form>
        </div>

    </section>







@endsection
