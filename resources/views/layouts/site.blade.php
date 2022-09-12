@include('layouts.include.header')
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
@include('layouts.include.navbar')


    @include('layouts.include.sidebar')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>

                <div id="app">
                    @yield('content')
                </div>


    </div>
</div>
@include('layouts.include.footer')
