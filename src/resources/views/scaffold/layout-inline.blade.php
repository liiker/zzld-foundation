<html><head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title> 中正联达基础平台 </title>
  <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme">
  <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
  <meta name="author" content="AdminDesigns">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <!-- <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> -->

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="/static/assets/skin/default_skin/css/theme.css">
  <link rel="stylesheet" type="text/css" href="/static/assets/admin-tools/admin-forms/css/admin-forms.css">

  <link rel="stylesheet" type="text/css" href="/static/vendor/plugins/tagmanager/tagmanager.css">
  <link rel="stylesheet" type="text/css" href="/static/vendor/plugins/daterange/daterangepicker.css">
  <link rel="stylesheet" type="text/css" href="/static/vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
  <link rel="stylesheet" type="text/css" href="/static/vendor/plugins/colorpicker/css/bootstrap-colorpicker.min.css">

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
	@yield('content')
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
