@extends('layouts.site')


@section('content')
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
            <form action="{{route('account.update',$user[0]->id)}}" method="post" enctype="multipart/form-data">
                @include('dashboard.admin.account._admin_form_data')
            </form>
        </div>
    </div>

@endsection
