<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow expanded" data-scroll-to-active="true">
    <div class="main-menu-content ps-container ps-theme-light ps-active-y" data-ps-id="b6024750-6caa-7771-a8db-c5f2f0b74574">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{route('dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">@lang('dashboard.dashboard')</span></a>
        </li>


        <li class="nav-item has-sub"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('dashboard.user-management')</span><span class="badge badge badge-info badge-pill float-right mr-2">2</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{route('roles.index')}}" data-i18n="nav.dash.crypto">@lang('dashboard.permission-roles')</a>
            </li>
            <li><a class="menu-item" href="{{route('users.index')}}" data-i18n="nav.dash.sales">@lang('dashboard.users')</a>
            </li>
          </ul>
        </li>



        <li class="nav-item has-sub"><a href="{{route('dashboard')}}"><i class="ft-users"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('dashboard.schools-students')</span><span class="badge badge badge-info badge-pill float-right mr-2">2</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{ route('school.index') }}" data-i18n="nav.dash.ecommerce">@lang('dashboard.schools-students')</a>
              </li>
              <li><a class="menu-item" href="{{ route('all-student') }}" data-i18n="nav.dash.ecommerce">عرض جميع الطلاب</a>
              </li>
            </ul>
        </li>

          <li class=" nav-item"><a href="{{ route('meal.index') }}"><i class="icon icon-drawer"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">@lang('dashboard.meals')</span></a>

          <li class="nav-item has-sub"><a href="index.html"><i class="ft ft-align-justify"></i><span class="menu-title" data-i18n="nav.dash.main">@lang('dashboard.main-category')</span><span class="badge badge badge-info badge-pill float-right mr-2">2</span></a>
            <ul class="menu-content">
              <li><a class="menu-item" href="{{route('maincategory.index')}}" data-i18n="nav.dash.ecommerce">@lang('dashboard.main-category')</a>
              </li>
              <li><a class="menu-item" href="{{route('category.index')}}" data-i18n="nav.dash.crypto">@lang('dashboard.category')</a>
              </li>
            </ul>
          </li>




          <li class=" nav-item"><a href="{{route('admin.orders')}}"><i class="la la-shopping-cart"></i><span class="menu-title" data-i18n="nav.support_raise_support.main">@lang('dashboard.orders')</span></a>
          </li>


          <li class=" nav-item">
            <a href="{{route('contact.index')}}"><i class="la la-cog"></i>
              <span class="menu-title" data-i18n="nav.support_documentation.main">رسائل اتصل بنا</span>
            </a>
          </li>

          <li class=" nav-item">
            <a href="{{route('about.index')}}"><i class="la la-cog"></i>
              <span class="menu-title" data-i18n="nav.support_documentation.main">صفحة من نحن</span>
            </a>
          </li>

          <li class=" nav-item">
            <a href="{{route('settings')}}"><i class="la la-cog"></i>
              <span class="menu-title" data-i18n="nav.support_documentation.main">@lang('dashboard.settings')</span>
            </a>
          </li>

        <li class=" nav-item"><a href="#"><i class="la la-refresh"></i><span class="menu-title clear" data-i18n="nav.support_raise_support.main">@lang('dashboard.clear')</span></a>
        </li>

        <li class="nav-item has-sub"><a href="#"><i class="la la-calculator"></i><span class="menu-title" data-i18n="nav.dash.main">التقارير</span><span class="badge badge badge-info badge-pill float-right mr-2">2</span></a>
            <ul class="menu-content">

                <li><a class="menu-item" href="{{route('report.order')}}" data-i18n="nav.dash.crypto">طلبات اليوم </a>
              </li>

              <li><a class="menu-item" href="{{route('report.student')}}" data-i18n="nav.dash.crypto">طلبات طالب معين </a>
              </li>

              <li><a class="menu-item" href="{{route('report.canteen')}}" data-i18n="nav.dash.crypto">طلبات حسب المقصف</a>
              </li>

            </ul>
          </li>
      </ul>
    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: -1.8px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 4.8px; height: 154px; right: 252px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 6px;"></div></div></div>
  </div>

  <script>
      $('.clear').click(function(event){
        var ok = confirm("هل تريد مسح الكاش");

        if(ok){
            alert("تم مسح الكاش بنجاح");
        }
        event.preventDefault();

      })
  </script>
