<!-- main-sidebar -->

		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
{{-- 				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
 --}}				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
                            {{-- <form action="{{route('add.image')}}" method="post" style="margin-right: 80px" enctype="multipart/form-data">
                                @csrf --}}
                                <img name="image" alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/18.png')}}"\><span class="avatar-status profile-status bg-green"></span>

{{-- 						</form>
 --}}                        </div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{Auth::user()->name}}</h4>
							<span class="mb-0 text-muted">{{Auth::user()->email}}</span>
						</div>
					</div>
				</div>

				<ul class="side-menu">
					<li class="side-item side-item-category">برنامج الفواتير</li>
					<li class="slide">
						<a class="side-menu__item" href="{{route('home')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                          </svg>الرئيسية</span><span class="badge badge-success side-badge">1</span></a>
					</li>
					<li class="side-item side-item-category">General</li>
                    @can('الفواتير')


					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fas fa-file-invoice"></i>الفواتير</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
                            @can('قائمة الفواتير')

                            <li><a class="slide-item" href="{{ url('/' . $page='invoices') }}">قائمة الفواتير</a></li>
							@endcan
                            @can('الفواتير المدفوعة')
                            <li><a class="slide-item" href="{{ url('/' . $page='Invoice_Paid') }}">الفواتير المدفوعة</a></li>
							@endcan
                            @can('الفواتير الغير مدفوعة')
                            <li><a class="slide-item" href="{{ url('/' . $page='Invoice_UnPaid') }}">الفواتير الغير مدفوعة</a></li>
                            @endcan
                            @can('الفواتير المدفوعة جزئيا')
							<li><a class="slide-item" href="{{ url('/' . $page='Invoice_Partial') }}">الفواتير المدفوعة جزئيا</a></li>
                            @endcan
						</ul>
					</li>
                    @endcan
					<li class="side-item side-item-category">التقارير</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}">{{-- <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 12c0 4.08 3.06 7.44 7 7.93V4.07C7.05 4.56 4 7.92 4 12z" opacity=".3"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93s3.05-7.44 7-7.93v15.86zm2-15.86c1.03.13 2 .45 2.87.93H13v-.93zM13 7h5.24c.25.31.48.65.68 1H13V7zm0 3h6.74c.08.33.15.66.19 1H13v-1zm0 9.93V19h2.87c-.87.48-1.84.8-2.87.93zM18.24 17H13v-1h5.92c-.2.35-.43.69-.68 1zm1.5-3H13v-1h6.93c-.04.34-.11.67-.19 1z"/></svg><span class="side-menu__label"> --}}التقارير</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('/' . $page='invoices_report') }}">تقارير الفواتير</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='customers_report') }}">تقارير العملاء</a></li>

						</ul>
					</li>


					<li class="side-item side-item-category">المستخدمين</li>
					<li class="slide">
                        @can('المستخدمين')


						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><i class="fa fa-user" aria-hidden="true"></i>المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
						@endcan
                        <ul class="slide-menu">
                            @can('قائمة المستخدمين')
							<li><a class="slide-item" href="{{ url('/' . $page='users') }}">قائمة المستخدمين</a></li>
							@endcan
                            @can('صلاحيات المستخدمين')


                            <li><a class="slide-item" href="{{ url('/' . $page='roles') }}">الصلاحيات</a></li>
                            @endcan
						</ul>

					<li class="side-item side-item-category">الاعدادات</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                          </svg>الاعدادات</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('/' . $page='section') }}">الأقسام</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='product') }}">المنتجات</a></li>

						</ul>
					</li>

				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
