@if($meals->count() < 1 )
    <div class='text-center'>لا توجد وجبات في هذا القسم</div>
@endif
@foreach($meals as $meal)
<div class="col-xl-4 col-lg-4 col-sm-6">
  <div class="product text-center">
    <div class="position-relative mb-3">
      <div class="badge text-white bg-"></div><a class="d-block" href="{{route('show.meal',$meal->id)}}"><img class="img-fluid w-100" style="height:250px" src="@foreach($meal->images as $image){{asset($image->name)}} @break @endforeach" alt="..."></a>
      <div class="product-overlay">
        <ul class="mb-0 list-inline">
          <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{route('show.meal',$meal->id)}}">أطلب الان</a></li>
        </ul>
      </div>
    </div>
    <h6> <a class="reset-anchor2" style="color:#000" href="{{route('show.meal',$meal->id)}}">{{$meal->name}} | {{$meal->category->name}}</a></h6>
    <p class="small text-muted">{{$meal->canteen->school->name .' | '.$meal->canteen->name}}</p>
    <p class="small text-muted">{{ number_format((float)$meal->price,3)}} ر.ع</p>
    <hr>
  </div>

</div>
@endforeach

