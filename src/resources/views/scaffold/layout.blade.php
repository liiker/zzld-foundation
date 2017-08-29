<html><head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
     <title> {{ config('zzld_foundation.site_admin_title', '后台管理系统')}} </title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme">
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="/static/assets/skin/default_skin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="/static/assets/admin-tools/admin-forms/css/admin-forms.css">

  <link rel="stylesheet" type="text/css" href="/static/vendor/plugins/tagmanager/tagmanager.css">
  <link rel="stylesheet" type="text/css" href="/static/vendor/plugins/daterange/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="/static/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="/static/vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">

  <link rel="stylesheet" type="text/css" href="/static/assets/fonts/glyphicons-pro/glyphicons-pro.css">
  <link rel="stylesheet" type="text/css" href="/static/assets/fonts/icomoon/icomoon.css">
  <link rel="stylesheet" type="text/css" href="/static/assets/fonts/octicons/octicons.css">
  <link rel="stylesheet" type="text/css" href="/static/assets/fonts/font_prj_videoshare/iconfont.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="/static/assets/img/favicon.ico">

  @yield('style')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="sb-l-o sb-r-c onload-check" style="">

  <!-- Start: Main -->
  <div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top">
      <div class="navbar-branding">
        <a class="navbar-brand" href="{{ config('zzld_foundation.backend_home', '/dashboard') }}">
         <b>{{ config('zzld_foundation.site_admin_title', '后台管理系统')}}</b>
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="menu-divider hidden-xs">
          <i class="fa fa-circle"></i>
        </li>
        <li class="dropdown">
		  <a href="javascript:;" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> 
			<img src="/static/assets/img/face.png" alt="avatar" class="mw30 br64 mr15"> {{ Auth::user()->name }}
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <!--
            <li class="list-group-item">
              <a href="javascript:;" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> 我的消息
                <span class="label label-warning">2</span>
              </a>
            </li>
            -->
            <li class="list-group-item">
              <a href="{{ route('foundation.changepassword') }}" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> 修改密码 </a>
            </li>
            <li class="list-group-item">
              <a href="{{ route('logout') }}" onclick="javascript:event.preventDefault();document.getElementById('zzld-logout-form').submit();" class="animated animated-short fadeInUp">
                <span class="fa fa-power-off"></span> 退出 </a>
			<form action="{{ route('logout') }}" id="zzld-logout-form" style="display:none" method="post">
				{{ csrf_field() }}
			</form>
            </li>
          </ul>
        </li>
      </ul>

    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-primary">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
		@foreach(TPL::functions() as $fun)
             @if($fun->fun_type==='module')
		  <li>
            <a class="accordion-toggle menu-open" href="#">
              <span class="{{ $fun->fun_icon }}"></span>
              <span class="sidebar-title">{{ $fun->fun_name }}</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav" style="">
			  @foreach($fun->subs as $sub)
				@if( Request::getRequestUri() == $sub->url )
				  <li class="active">
				@else
				  <li>
				@endif
                <a href="{{ $sub->url }}">
				          <span class="{{ $sub->fun_icon }}"></span>
                  {{ $sub->fun_name }}
				</a>
              </li>
			  @endforeach
            </ul>
          </li>
@else
    @if( Request::getRequestUri() == $fun->url )
        <li class="active">
             @else
             <li>
             @endif
             <a href="{{ $fun->url }}">
               <span class="{{ $fun->fun_icon }}"></span>
               <span class="sidebar-title">
               {{ $fun->fun_name }}
               </span>
             </a>
</li>
    @endif
		@endforeach
        </ul>
        <!-- End: Sidebar Menu -->

	      <!-- Start: Sidebar Collapse Button -->
	      <div class="sidebar-toggle-mini">
	        <a href="layout_sidebar-left-static.html#">
	          <span class="fa fa-sign-out"></span>
	        </a>
	      </div>
	      <!-- End: Sidebar Collapse Button -->

      </div>
      <!-- End: Sidebar Left Content -->

    </aside>

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- Start: Topbar-Dropdown -->
      <div id="topbar-dropmenu">
        <div class="topbar-menu row">
          <div class="col-xs-4 col-sm-2">
            <a href="layout_sidebar-left-static.html#" class="metro-tile">
              <span class="metro-icon glyphicon glyphicon-inbox"></span>
              <p class="metro-title">Messages</p>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="layout_sidebar-left-static.html#" class="metro-tile">
              <span class="metro-icon glyphicon glyphicon-user"></span>
              <p class="metro-title">Users</p>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="layout_sidebar-left-static.html#" class="metro-tile">
              <span class="metro-icon glyphicon glyphicon-headphones"></span>
              <p class="metro-title">Support</p>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="layout_sidebar-left-static.html#" class="metro-tile">
              <span class="metro-icon fa fa-gears"></span>
              <p class="metro-title">Settings</p>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="layout_sidebar-left-static.html#" class="metro-tile">
              <span class="metro-icon glyphicon glyphicon-facetime-video"></span>
              <p class="metro-title">Videos</p>
            </a>
          </div>
          <div class="col-xs-4 col-sm-2">
            <a href="layout_sidebar-left-static.html#" class="metro-tile">
              <span class="metro-icon glyphicon glyphicon-picture"></span>
              <p class="metro-title">Pictures</p>
            </a>
          </div>
        </div>
      </div>
      <!-- End: Topbar-Dropdown -->

      <!-- Start: Topbar -->
      @section('topbar')
      @endsection
      <header id="topbar" class="">
        <div class="topbar-left">
          <ol class="breadcrumb">
            @yield('breadcrumb')
          </ol>
        </div>
      </header>

      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="">
          @yield('content')
      </section>
      <!-- End: Content -->

    </section>

    <!-- Start: Right Sidebar -->
    <aside id="sidebar_right" class="nano affix">

      <!-- Start: Sidebar Right Content -->
      <div class="sidebar-right-content nano-content p15" tabindex="0">
          <h5 class="title-divider text-muted mb20"> Server Statistics
            <span class="pull-right"> 2013
              <i class="fa fa-caret-down ml5"></i>
            </span>
          </h5>
          <div class="progress mh5">
            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
              <span class="fs11">DB Request</span>
            </div>
          </div>
          <div class="progress mh5">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
              <span class="fs11 text-left">Server Load</span>
            </div>
          </div>
          <div class="progress mh5">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 61%">
              <span class="fs11 text-left">Server Connections</span>
            </div>
          </div>
          <h5 class="title-divider text-muted mt30 mb10">Traffic Margins</h5>
          <div class="row">
            <div class="col-xs-5">
              <h3 class="text-primary mn pl5">132</h3>
            </div>
            <div class="col-xs-7 text-right">
              <h3 class="text-success-dark mn">
                <i class="fa fa-caret-up"></i> 13.2% </h3>
            </div>
          </div>
          <h5 class="title-divider text-muted mt25 mb10">Database Request</h5>
          <div class="row">
            <div class="col-xs-5">
              <h3 class="text-primary mn pl5">212</h3>
            </div>
            <div class="col-xs-7 text-right">
              <h3 class="text-success-dark mn">
                <i class="fa fa-caret-up"></i> 25.6% </h3>
            </div>
          </div>
          <h5 class="title-divider text-muted mt25 mb10">Server Response</h5>
          <div class="row">
            <div class="col-xs-5">
              <h3 class="text-primary mn pl5">82.5</h3>
            </div>
            <div class="col-xs-7 text-right">
              <h3 class="text-danger mn">
                <i class="fa fa-caret-down"></i> 17.9% </h3>
            </div>
          </div>
          <h5 class="title-divider text-muted mt40 mb20"> Server Statistics
            <span class="pull-right text-primary fw600">USA</span>
          </h5>
        </div>

    <div class="nano-pane" style="display: block;"><div class="nano-slider" style="height: 274px; transform: translate(0px, 0px);"></div></div></aside>
    <!-- End: Right Sidebar -->

  </div>
  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="/static/vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="/static/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
  <script src="/static/vendor/plugins/pnotify/pnotify.js"></script>
  <script src="/static/assets/layer/layer.js"></script>


  <!-- Time/Date Plugin Dependencies -->
  <script src="/static/vendor/plugins/globalize/globalize.min.js"></script>
  <script src="/static/vendor/plugins/moment/moment.min.js"></script>
  <script src="/static/vendor/plugins/datepicker/js/bootstrap-datetimepicker.js"></script>

  <!-- Theme Javascript -->
  <script src="/static/assets/js/utility/utility.js"></script>
  <script src="/static/assets/js/demo/demo.js"></script>
  <script src="/static/assets/js/main.js"></script>
  <script src="/static/assets/js/zzld_admin.js" charset="utf-8"></script>
  <script src="/js/main.js" charset="utf-8"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {
    "use strict";
    // Init Theme Core
    Core.init();
    //
    // new PNotify({
    //     title: '消息提醒',
    //     text: 'Look at my beautiful styling! ^_^',
    //     shadow: true,
    //     opacity: 0.8,
    //     addclass: 'stack_top_right',
    //     type: 'danger',
    //     // stack: {
    //     //     "dir1": "down",
    //     //     "dir2": "left",
    //     //     "push": "top",
    //     //     "spacing1": 0,
    //     //     "spacing2": 0
    //     // },
    //     width: '100%',
    //     delay: 1400
    //   });

  });
  </script>
  @yield('script')
  <!-- END: PAGE SCRIPTS -->
</body></html>
