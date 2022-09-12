<section class="py-5">

    <div class="container p-0">
        <div class="text-center" style="font-size: 24px; font-weight: bold">الاصناف الرئيسية</div>
        <div class="row">

            <div class="col-lg-12 order-1 order-lg-2 mb-5 mb-lg-0">

                <div class="row">
                    <!-- PRODUCT-->
                    @foreach ( App\Models\MainCategory::get() as $category )
                        <div class="col-lg-4 col-sm-6 mt-5 mb-5">
                            <div class="product text-center">
                                <div class="mb-3 position-relative">
                                    <div class="badge text-white bg-"></div><a class="d-block" href="{{route('u.cat',$category->id)}}">
                                        <img
                                            class="img-fluid w-100 img-thumbnail" style="height:250px"
                                            src="{{asset($category->image)}}"
                                            alt="..."></a>
                                </div>
                                <h6>
                                    <a class="reset-anchor2" style="color:#000" href="{{route('u.cat',$category->id)}}">{{$category->name}}</a>

                                </h6>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

            <!-- Livewire Component wire-end:c4XCgiNtLfqnsrPZVwph -->

        </div>
    </div>
</section>
