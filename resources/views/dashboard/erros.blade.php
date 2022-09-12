@if (session()->has('alert.success'))
<div class="alert alert-success">
  {{ session('alert.success') }}
</div>
@endif

@if (session()->has('alert.error'))
<div class="alert alert-danger">
  {{ session('alert.error') }}
</div>
@endif


                       @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
