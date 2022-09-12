<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"><span>@lang('dashboard.user-system')</span></h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    @component('dashboard.admin.component_breadcrumb.users.index')
                    @endcomponent
                </ol>
            </div>
        </div>
    </div>
</div>




<div class="card">

    <div class="card-body">
        <form>


        <div class="input-group">
                <input type="text" name="q" id="q" class="form-control" placeholder="ابحث عن طريق الاسم  او الاميل او الهاتف او الحالة" aria-describedby="button-addon2" value="{{old('q')}}">
                    <div class="input-group-append">
                        <a class="btn btn-primary my-2 my-sm-0 menu-item">ابحث</a>
                        <a style="margin-right: 5px" href="{{route('admin.create')}}" type="submit" class="menu-item btn btn-success">اضف مدير<i class="la la-plus"></i></a>
                    </div>
        </div>
        </form>
    </div>
</div>



<div class="card">
    <div class="card-body">
        @include('dashboard._alert')
        <div id="table_data">

                @include('dashboard.admin.admin-table')

        </div>
    </div>
</div>


<script>
/* Start Paginateion Ajax */
$(document).ready(function(){
$(document).on('click', '.pagination a', function(event){
 event.preventDefault();
 var page = $(this).attr('href').split('page=')[1];
 fetch_data(page);
// window.history.pushState("object or string", "Title", url);

});

function fetch_data(page)
{
 $.ajax({
  url:"/admin/pagination/fetch_data?page="+page,
  success:function(data)
  {
   $('#table_data').html(data);
   window.history.pushState("object or string", "Title", "?page="+page);
  }
 });
}
});
/* End Paginateion Ajax */

/* Start Search Ajax */

$(document).ready(function(){
    $(document).on('keyup', '#q', function(event){
    event.preventDefault();
    var q = $("#q").val();
    var url = "/admin/search?q="+q;

        $.ajax({
            url:url,
            success:function(data) {
                $('#table_data').html(data);
                window.history.pushState("object or string", "Title", "?q="+q);
            }
        });

    });
});

/* End Search Ajax */
</script>

