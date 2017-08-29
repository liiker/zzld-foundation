<html><head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminDesigns - A Responsive HTML5 Admin UI Framework</title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme">
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <!-- <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> -->

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="/static/assets/skin/default_skin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="/static/assets/admin-tools/admin-forms/css/admin-forms.css">
  <link rel="stylesheet" type="text/css" href="/static/assets/fonts/glyphicons-pro/glyphicons-pro.css">
  <link rel="stylesheet" type="text/css" href="/static/assets/fonts/octicons/octicons.css">



  <!-- Favicon -->
  <link rel="shortcut icon" href="/static/assets/img/favicon.ico">

  @yield('style')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="sb-l-o sb-r-c onload-check" style="min-height: 1971px;">

  <!-- Start: Main -->
  <div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top">
      <div class="navbar-branding">
        <a class="navbar-brand" href="dashboard.html">
          <b>Admin</b>Designs
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>
      <ul class="nav navbar-nav navbar-left">
        <li>
          <a class="sidebar-menu-toggle" href="layout_sidebar-left-static.html#">
            <span class="ad ad-ruby fs18"></span>
          </a>
        </li>
        <li>
          <a class="topbar-menu-toggle" href="layout_sidebar-left-static.html#">
            <span class="ad ad-wand fs16"></span>
          </a>
        </li>
        <li class="hidden-xs">
          <a class="request-fullscreen toggle-active" href="layout_sidebar-left-static.html#">
            <span class="ad ad-screen-full fs18"></span>
          </a>
        </li>
      </ul>
      <form class="navbar-form navbar-left navbar-search" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search..." value="Search...">
        </div>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="layout_sidebar-left-static.html#">
            <span class="ad ad-radio-tower fs18"></span>
          </a>
          <ul class="dropdown-menu media-list w350 animated animated-shorter fadeIn" role="menu">
            <li class="dropdown-header">
              <span class="dropdown-title"> Notifications</span>
              <span class="label label-warning">12</span>
            </li>
            <li class="media">
              <a class="media-left" href="layout_sidebar-left-static.html#"> <img src="/static/assets/img/avatars/5.jpg" class="mw40" alt="avatar"> </a>
              <div class="media-body">
                <h5 class="media-heading">Article
                  <small class="text-muted">- 08/16/22</small>
                </h5> Last Updated 36 days ago by
                <a class="text-system" href="layout_sidebar-left-static.html#"> Max </a>
              </div>
            </li>
            <li class="media">
              <a class="media-left" href="layout_sidebar-left-static.html#"> <img src="/static/assets/img/avatars/2.jpg" class="mw40" alt="avatar"> </a>
              <div class="media-body">
                <h5 class="media-heading mv5">Article
                  <small> - 08/16/22</small>
                </h5>
                Last Updated 36 days ago by
                <a class="text-system" href="layout_sidebar-left-static.html#"> Max </a>
              </div>
            </li>
            <li class="media">
              <a class="media-left" href="layout_sidebar-left-static.html#"> <img src="/static/assets/img/avatars/3.jpg" class="mw40" alt="avatar"> </a>
              <div class="media-body">
                <h5 class="media-heading">Article
                  <small class="text-muted">- 08/16/22</small>
                </h5> Last Updated 36 days ago by
                <a class="text-system" href="layout_sidebar-left-static.html#"> Max </a>
              </div>
            </li>
            <li class="media">
              <a class="media-left" href="layout_sidebar-left-static.html#"> <img src="/static/assets/img/avatars/4.jpg" class="mw40" alt="avatar"> </a>
              <div class="media-body">
                <h5 class="media-heading mv5">Article
                  <small class="text-muted">- 08/16/22</small>
                </h5> Last Updated 36 days ago by
                <a class="text-system" href="layout_sidebar-left-static.html#"> Max </a>
              </div>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="layout_sidebar-left-static.html#">
            <span class="flag-xs flag-us"></span> US
          </a>
          <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">
            <li>
              <a href="javascript:void(0);">
                <span class="flag-xs flag-in mr10"></span> Hindu </a>
            </li>
            <li>
              <a href="javascript:void(0);">
                <span class="flag-xs flag-tr mr10"></span> Turkish </a>
            </li>
            <li>
              <a href="javascript:void(0);">
                <span class="flag-xs flag-es mr10"></span> Spanish </a>
            </li>
          </ul>
        </li>
        <li class="menu-divider hidden-xs">
          <i class="fa fa-circle"></i>
        </li>
        <li class="dropdown">
          <a href="layout_sidebar-left-static.html#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="/static/assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64 mr15"> John.Smith
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="dropdown-header clearfix">
              <div class="pull-left ml10">
                <select id="user-status" style="display: none;">
                  <optgroup label="Current Status:">
                    <option value="1-1">Away</option>
                    <option value="1-2">Offline</option>
                    <option value="1-3" selected="selected">Online</option>
                  </optgroup>
                </select><div class="btn-group" style="width: 100px;"><button type="button" class="multiselect dropdown-toggle btn btn-default btn-sm" data-toggle="dropdown" title="Online" style="width: 100px;">Online <b class="caret"></b></button><ul class="multiselect-container dropdown-menu"><li class="multiselect-item multiselect-group"><label>Current Status:</label></li><li><a href="javascript:void(0);"><label class="radio"><input type="radio" value="1-1"> Away</label></a></li><li><a href="javascript:void(0);"><label class="radio"><input type="radio" value="1-2"> Offline</label></a></li><li class="active"><a href="javascript:void(0);"><label class="radio"><input type="radio" value="1-3"> Online</label></a></li></ul></div>
              </div>

              <div class="pull-right mr10">
                <select id="user-role" style="display: none;">
                  <optgroup label="Logged in As:">
                    <option value="1-1">Client</option>
                    <option value="1-2">Editor</option>
                    <option value="1-3" selected="selected">Admin</option>
                  </optgroup>
                </select><div class="btn-group" style="width: 100px;"><button type="button" class="multiselect dropdown-toggle btn btn-default btn-sm" data-toggle="dropdown" title="Admin" style="width: 100px;">Admin <b class="caret"></b></button><ul class="multiselect-container dropdown-menu pull-right"><li class="multiselect-item multiselect-group"><label>Logged in As:</label></li><li><a href="javascript:void(0);"><label class="radio"><input type="radio" value="1-1"> Client</label></a></li><li><a href="javascript:void(0);"><label class="radio"><input type="radio" value="1-2"> Editor</label></a></li><li class="active"><a href="javascript:void(0);"><label class="radio"><input type="radio" value="1-3"> Admin</label></a></li></ul></div>
              </div>

            </li>
            <li class="list-group-item">
              <a href="layout_sidebar-left-static.html#" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> Messages
                <span class="label label-warning">2</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="layout_sidebar-left-static.html#" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Friends
                <span class="label label-warning">6</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="layout_sidebar-left-static.html#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Account Settings </a>
            </li>
            <li class="list-group-item">
              <a href="layout_sidebar-left-static.html#" class="animated animated-short fadeInUp">
                <span class="fa fa-power-off"></span> Logout </a>
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

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

          <!-- Sidebar Widget - Menu (Slidedown) -->
          <div class="sidebar-widget menu-widget">
            <div class="row text-center mbn">
              <div class="col-xs-4">
                <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dashboard">
                  <span class="glyphicon glyphicon-home"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Messages">
                  <span class="glyphicon glyphicon-inbox"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tasks">
                  <span class="glyphicon glyphicon-bell"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="" data-original-title="Activity">
                  <span class="fa fa-desktop"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                  <span class="fa fa-gears"></span>
                </a>
              </div>
              <div class="col-xs-4">
                <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Cron Jobs">
                  <span class="fa fa-flask"></span>
                </a>
              </div>
            </div>
          </div>

          <!-- Sidebar Widget - Author (hidden)  -->
          <div class="sidebar-widget author-widget hidden">
            <div class="media">
              <a class="media-left" href="layout_sidebar-left-static.html#">
                <img src="/static/assets/img/avatars/3.jpg" class="img-responsive">
              </a>
              <div class="media-body">
                <div class="media-links">
                   <a href="layout_sidebar-left-static.html#" class="sidebar-menu-toggle">User Menu -</a> <a href="pages_login(alt).html">Logout</a>
                </div>
                <div class="media-author">Michael Richards</div>
              </div>
            </div>
          </div>

          <!-- Sidebar Widget - Search (hidden) -->
          <div class="sidebar-widget search-widget hidden">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
              <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
            </div>
          </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
          <li class="sidebar-label pt20">Menu</li>
          <li>
            <a href="/admin/task">
              <span class="fa fa-calendar"></span>
              <span class="sidebar-title">最新待办</span>
            </a>
          </li>
          <li class="active">
            <a href="/admin/dashboard">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">控制台</span>
            </a>
          </li>
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
            <li class="crumb-active">
              <a href="dashboard.html">控制台</a>
            </li>
            <li class="crumb-icon">
              <a href="dashboard.html">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-trail">控制台</li>
          </ol>
        </div>
      </header>

      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout">
          @yield('tray')
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

  <!-- Theme Javascript -->
  <script src="/static/assets/js/utility/utility.js"></script>
  <script src="/static/assets/js/demo/demo.js"></script>
  <script src="/static/assets/js/main.js"></script>
  <script src="/static/js/zzld_admin.js" charset="utf-8"></script>
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
