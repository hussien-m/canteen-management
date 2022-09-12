<div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
      <div class="container px-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="{{url('/')}}"><span class="fw-bold text-uppercase text-dark">موقع زحمة</span></a>
          <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav">
                <li class="nav-item">
                  <!-- Link--><a class="nav-link active" href="{{url('/')}}">الرئيسية</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="{{route('about')}}">من نحن</a>
                </li>
                <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="{{route('contact')}}">اتصل بنا</a>
                </li>
            </ul>

            <ul class="navbar-nav me-auto">
                @if(!Auth::guard('students')->check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('student.login') }}"> <i class="fas fa-user me-1 text-gray fw-normal"></i>تسجيل الدخول</a></li>
                @endif

                @if(Auth::guard('students')->check())

                    <li class="nav-item dropdown">
                        <a class="nav-link" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow ms-3 my-auto">{{$noti_unread_student->count()}}</span>
                            <i class="fas fa-bell me-1 text-gray fw-normal"></i>

                        </a>
                        <div class="dropdown-menu mt-3 shadow-sm me-auto" aria-labelledby="pagesDropdown">
                            @forelse ($noti_unread_student as $noti_data )

                            <small><a class="dropdown-item border-0 transition-link" href="{{route('stu.show.noti',$noti_data->id)}}">

                                تم تحديث حالة طلبك {{$noti_data->data['meal'] }}  الى {{ $noti_data->data['status'] }} : {{$noti_data->created_at->diffForHumans()}}

                            </a></small>
                            <hr>

                            @empty

                            <small><a class="dropdown-item border-0 transition-link" href="#">لاتوجد اشعارات في الوقت الحالي</a></small>
                            <hr>
                            @endforelse
                            <small class="text-center"><a class="dropdown-item border-0 transition-link" href="{{route('stu.all.noti')}}">عرض كل الاشعارات</a></small>
                    </li>

                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">حسابي</a>
                        <div class="dropdown-menu mt-3 shadow-sm me-auto" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item border-0 transition-link" href="#">{{ Auth::guard('students')->user()->first_name .' '. Auth::guard('students')->user()->last_name }}</a>
                            <a class="dropdown-item border-0 transition-link" href="{{route('my.order')}}">طلباتي</a>
                            <hr>
                            <a class="dropdown-item border-0 transition-link" href="{{route('student.logout')}}">خروج</a>
                    </li>


                @endif

            </ul>


          </div>
        </nav>
      </div>
    </header>

