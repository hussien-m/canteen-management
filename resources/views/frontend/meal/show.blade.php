@extends('frontend.meal.home')

@section('content')



<section class="py-5" style="direction:rtl;background-color:#F1F1F1">
    @include('dashboard._alert')
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-6">
          <!-- PRODUCT SLIDER-->
          <div class="row m-sm-0">
            <div class="col-sm-2 p-sm-0 order-2 order-sm-1 mt-2 mt-sm-0 px-xl-2">
              <div class="swiper product-slider-thumbs swiper-initialized swiper-vertical swiper-pointer-events swiper-thumbs">
                <div class="swiper-wrapper" id="swiper-wrapper-74c96c0f97e725e6" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">

                    @foreach($meal->images as $image )
                        <div class="swiper-slide h-auto swiper-thumb-item mb-3 swiper-slide-visible swiper-slide-active swiper-slide-thumb-active" role="group" aria-label="1 / 4" style="height: 434px;"><img class="w-100" src="{{asset($image->name)}}" alt="..."></div>
                    @endforeach
                </div>
              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
            <div class="col-sm-10 order-1 order-sm-2">
              <div class="swiper product-slider swiper-initialized swiper-horizontal swiper-pointer-events">
                <div class="swiper-wrapper" id="swiper-wrapper-7aa8d17b3ea109df5" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                    @foreach($meal->images as $key=>$image )
                    <div class="swiper-slide h-auto swiper-slide-active" role="group" aria-label="1 / 4" style="width: 502px;"><a class="glightbox product-view" href="{{ asset($image->name)}}" data-gallery="gallery2" data-glightbox="Product item 1"><img class="img-fluid" src="{{asset($image->name)}}" alt="..."></a></div>
                    @endforeach
                </div>
              <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
            </div>
          </div>
        </div>
        <!-- PRODUCT DETAILS-->
        <div class="col-lg-6">
          <ul class="list-inline mb-2 text-sm">
            <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
            <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
            <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
            <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
            <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
          </ul>
          <h1>{{$meal->name}}</h1>
          <p class="text-muted lead">{{ number_format((float)$meal->price,3)}} ر.ع </p>
          <p class="text-sm mb-4">{{$meal->name}}.</p>
          <div class="row align-items-stretch mb-4">
            <div class="col-sm-5 pr-sm-0">
              <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white"><span class="small text-uppercase text-gray mr-4 no-select">الكمية</span>

                <form  @if (Auth::guard('students')->check()) action="{{ route('send.order',  Auth::guard('students')->user()->id) }}" method="post" @endif />
                    @csrf

                    <input type="hidden" name="student_id"   @if(Auth::guard('students')->check()) value="{{ Auth::guard('students')->user()->id  }} @endif" />
                    <input type="hidden" name="meal_id"       value="{{ $meal->id }}" />
                    <input type="hidden" name="price"         value="{{ $meal->price }}" />
                    <input type="hidden" name="canteen_id"    value="{{ $meal->canteen->id }}" />
                    <input type="hidden" name="school_id"     value="{{ $meal->canteen->school->id }}" />
                        <div class="quantity">
                            <a class="dec-btn p-0" style="cursor: pointer"><b>-</b></a>
                            <input class="form-control border-0 shadow-0 p-0" name="quantity" type="text" value="1" min="1" max="10">
                            <a class="inc-btn p-0" style="cursor: pointer"><b>+</b></i></a>
                        </div>

                    </div>
                    </div>
                    <div class="quantity3 mb-2 mt-2">
                        <div class="row mb-3">
                            <div class="col-sm-5">
                              <input class="form-control" name="reservation_date" id="inputEmail3" type="datetime-local">
                            </div>
                          </div>
                    </div>
                    <div class="col-sm-3 pl-sm-0"><button type="submit" class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0">اطلب الان</button></div>
                </form>

          </div><a class="text-dark p-0 mb-4 d-inline-block" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a><br>
          <ul class="list-unstyled small d-inline-block">
            <li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">المقصف : </strong><span class="ms-2 text-muted">{{$meal->canteen->name}}</span></li>
            <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">التصنيف : </strong><a class="reset-anchor ms-2" href="#!">{{$meal->category->name}}</a></li>
            <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">المدرسة : </strong><a class="reset-anchor ms-2" href="#!">{{$meal->canteen->school->name}}</a></li>
          </ul>
        </div>
      </div>
      <!-- DETAILS TABS-->



    </div>
  </section>




@endsection
