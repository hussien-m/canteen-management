
<section class="py-5">
    <div class="container p-0">
      <div class="row">
        <!-- SHOP SIDEBAR-->
        <div class="col-lg-3 order-2 order-lg-1">
          <h5 class="text-uppercase mb-4">الاصناف</h5>

            @foreach (\App\Models\MainCategory::has('category')->get() as $cats )


                    <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase fw-bold">{{$cats->name}}</strong></div>
                    @forelse ( $cats->category as $category )
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            <li class="mb-2 me-4"><a class="reset-anchor" href="{{ route('u.subcat',$category->id) }}">{{$category->name}}</a></li>
                        </ul>
                        @empty
                        <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                            <li class="mb-2 me-4"><a class="" href="#">لايوجد وجبات في هذا القسم</a></li>
                        </ul>
                    @endforelse

            @endforeach



        </div>
        <!-- SHOP LISTING-->
        <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
          <div class="row">
            <!-- PRODUCT-->
            <div id='loader' style='display:none' class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>                    </div>
            <div class="row" id="table_data">

                @include('frontend.row-meal')


            </div>

          </div>
          <!-- PAGINATION-->
        </div>
      </div>
    </div>

  </section>



  <script>
     /*
    $(document).ready(function(){
        $(document).on('click', '.reset-anchor', function(event){
            event.preventDefault();
            var cat_id = $(this).attr('href');
            var url = "u/?cat_id="+cat_id;

            $.ajax({
                url:url,

                beforeSend: function(){
                    // Show image container
                    $("#loader").show();
                    $("#table_data").hide();
                },

                success:function(data) {
                    $('#table_data').empty();
                    $('#table_data').html(data);
                    //scroll back up
                    $("html, body").animate({
                        scrollTop: $("#loader").offset().top
                    }, 500);

                },

                complete:function(data){
                    $("#loader").hide();
                    $("#table_data").show();
                }


            });

        });



});
*/
</script>
