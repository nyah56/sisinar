<!DOCTYPE html>
<html lang="en">

<head>
	
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> --}}
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
	{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> --}}
	<link rel="stylesheet" href="{{ asset('assets/css/DataTable.css') }}">
	

	<meta charset="utf-8">
	<title>S3</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="description" content="Avenxo Admin Theme">
	<meta name="author" content="KaijuThemes">
	<link rel="shortcut icon" sizes="114x114" href="{{ asset('assets/img/favicon.ico') }}">
	<link type='text/css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600'
		rel='stylesheet'>

	<link type="text/css" href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<!-- Font Awesome -->
	<link type="text/css" href="{{ asset('assets/fonts/themify-icons/themify-icons.css') }}" rel="stylesheet"> <!-- Themify Icons -->
	<link type="text/css" href="{{ asset('assets/css/styles.css') }}" rel="stylesheet"> <!-- Core CSS with all styles -->

	<link type="text/css" href="{{ asset('assets/plugins/codeprettifier/prettify.css') }}" rel="stylesheet"> <!-- Code Prettifier -->
	<link type="text/css" href="{{ asset('assets/plugins/iCheck/skins/minimal/blue.css') }}" rel="stylesheet"> <!-- iCheck -->
	<link type="text/css" href="{{ asset('assets/css/stel.css') }}" rel="stylesheet">
	<!--[if lt IE 10]>
        <script type="text/javascript" src="assets/js/media.match.min.js"></script>
        <script type="text/javascript" src="assets/js/respond.min.js"></script>
        <script type="text/javascript" src="assets/js/placeholder.min.js"></script>
    <![endif]-->
	<!-- The following CSS are included as plugins and can be removed if unused-->

	<link type="text/css" href="{{ asset('assets/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet"> <!-- FullCalendar -->
	<link type="text/css" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
	<!-- jVectorMap -->
	<link type="text/css" href="{{ asset('assets/plugins/switchery/switchery.css') }}" rel="stylesheet"> <!-- Switchery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  
</head>

<body class="animated-content sidebar-collapsed">
	

	<header id="topnav" class="navbar navbar-default navbar-fixed-top navbar-indigo" role="banner">

		<div class="logo-area">
			<span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
				<a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
					<span class="icon-bg">
						<i class="ti ti-menu"></i>
					</span>
				</a>
			</span>

			<a class="navbar-brand" href="/" alt ="S3">S3</a>

			

		</div><!-- logo-area -->

		<ul class="nav navbar-nav toolbar pull-right">
			@auth
			<li class="toolbar-icon-bg hidden-xs">
				<a class="logged-in" href="#"  data-toggle="dropdown">
					<span class="icon-bg"><i class="fa fa-user"></i></span>
				</a>
				<ul class="dropdown-menu userinfo arrow">
					<li><a href="#/"><span>Hi,{{ Auth::user()->username }}</span></a></li>
					<li><a href="#/"><i class="ti ti-settings"></i><span>Profile Settings</span></a></li>
				
				<li><a href="{{ url('/logout') }}"><i class="ti ti-shift-right"></i><span>Logout</span></a></li>
				</ul>
			</li>
			@else
			<li class="toolbar-icon-bg hidden-xs">
				<a data-toggle="modal" href="#login"><span class="icon-bg"><i class="fa fa-sign-in"></i></span></a>
			</li>
			@endauth
			
			
			{{-- rendering condition by user logged in --}}
			
		
			

		</ul>

	</header>
	
	<div id="wrapper">
		<div id="layout-static">
			<div class="static-sidebar-wrapper sidebar-default sidebar-indigo">
				<div class="static-sidebar">
					<div class="sidebar">
					
						<div class="widget stay-on-collapse" id="widget-sidebar">
							<nav role="navigation" class="widget-body">
								<ul class="acc-menu">
									<li class="nav-separator"><span>Explore</span></li>
									<li><a href="/"><i class="ti ti-home"></i><span>Dashboard</span></a></li>
									
									@auth 
									
										@if ( auth()->user()->role == "Admin")
											<li><a href="javascript:;"><i class="ti ti-settings"></i><span>Admin</span></a>
												<ul class="acc-menu">
													<li><a href="/jurnal">Tabel Jurnal</a></li>
													<li><a href="/seminar">Tabel Jenis Seminar</a></li>
													<li><a href="/reviewer">Tabel Reviewer</a></li>
													<li><a href="/register/admin">Tambah User</a></li>
												</ul>
											</li>
											<li><a href="javascript:;"><i class="ti ti-money"></i><span>Kesekretariatan</span></a>
												<ul class="acc-menu">
													<li><a href="/kesekretariatan">Kesekretariatan</a></li>
												</ul>
											</li>
											<li><a href="javascript:;"><i class="ti ti-receipt"></i><span>Koordinator</span></a>
												<ul class="acc-menu">
													<li><a href="/koordinator">Koordinator</a></li>
												</ul>
											</li>
										@elseif( auth()->user()->role == "Kesekretariat")
										<li><a href="javascript:;"><i class="ti ti-money"></i><span>Kesekretariatan</span></a>
											<ul class="acc-menu">
												<li><a href="/kesekretariatan">Kesekretariatan</a></li>
											</ul>
										</li>
										@elseif( auth()->user()->role == "Koordinator")
										<li><a href="javascript:;"><i class="ti ti-receipt"></i><span>Koordinator</span></a>
											<ul class="acc-menu">
												<li><a href="/koordinator">Koordinator</a></li>
											</ul>
										</li>
										@endif
									@endauth


								</ul>
							</nav>
						</div>


					</div>
				</div>
			</div>
			<div class="static-content-wrapper">
				<div class="static-content">
					<div class="page-content">
						<ol class="breadcrumb">
							
						</ol>
						<div class="container-fluid">
							{{-- @include('sweetalert::alert') --}}
							@yield('isi')
						</div> <!-- .container-fluid -->
						{{-- login form --}}
						<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content col-md-8 col-md-offset-2">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h3 class="text-center">Login ke S3</h3>
										<a href="#" class="login-logo text-center"><img src="assets/img/logo-big.png" class="center-img"></a>
										
									</div>
									<div class="modal-body">
										
										<div class="panel-body">
											
											<form action="/login/store" class="form-horizontal" id="validate-form" method="POST">
												@csrf
												<div class="form-group mb-md">
													<div class="col-xs-12">
														<div class="input-group">							
															<span class="input-group-addon">
																<i class="ti ti-user"></i>
															</span>
															<input type="text" name= "username" class="form-control" placeholder="Username" data-parsley-minlength="6" placeholder="At least 6 characters" required>
														</div>
													</div>
												</div>
					
												<div class="form-group mb-md">
													<div class="col-xs-12">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="ti ti-key"></i>
															</span>
															<input type="password"  name= "password"class="form-control" id="exampleInputPassword1" placeholder="Password">
														</div>
													</div>
												</div>
					
												<div class="panel-footer">
													<div class="clearfix">
														<button type="submit"class="btn btn-indigo pull-right">Login</button>
													</div>
												</div>
											</form>
										</div>
										
									</div>
									
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</div> <!-- #page-content -->
				</div>
			
				<footer role="contentinfo">
					<div class="clearfix">
						<ul class="list-unstyled list-inline pull-left">
							<li><h6 style="margin: 0;">© 2023 MINU</h6></li>
						</ul>
						<button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
					</div>
				</footer>

			</div>
		</div>
	</div>


	<!-- Switcher -->

	<!-- /Switcher -->
	<!-- Load site level scripts -->

	{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> --}}
{{-- <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> --}}
	
	{{-- <script type="text/javascript" src="{{ asset('assets/js/jquery-1.10.2.min.js') }}"></script> <!-- Load jQuery --> --}}
	<script type="text/javascript" src="{{ asset('assets/js/jqueryui-1.10.3.min.js') }}"></script> <!-- Load jQueryUI -->
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script> <!-- Load Bootstrap -->
	<script type="text/javascript" src="{{ asset('assets/js/enquire.min.js') }}"></script> <!-- Load Enquire -->

	<script type="text/javascript" src="{{ asset('assets/plugins/velocityjs/velocity.min.js') }}"></script>
	<!-- Load Velocity for Animated Content -->
	<script type="text/javascript" src="{{ asset('assets/plugins/velocityjs/velocity.ui.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('assets/plugins/wijets/wijets.js') }}"></script> <!-- Wijet -->

	<script type="text/javascript" src="{{ asset('assets/plugins/codeprettifier/prettify.js') }}"></script> <!-- Code Prettifier  -->
	<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-switch/bootstrap-switch.js') }}"></script>
	<!-- Swith/Toggle Button -->

	<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}"></script>
	<!-- Bootstrap Tabdrop -->

	<script type="text/javascript" src="{{ asset('assets/plugins/iCheck/icheck.min.js') }}"></script> <!-- iCheck -->

	<script type="text/javascript" src="{{ asset('assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js') }}"></script>
	<!-- nano scroller -->

	<script type="text/javascript" src="{{ asset('assets/js/application.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/demo/demo.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/demo/demo-switcher.js') }}"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 

{{-- <script type="text/javascript" src="{{ asset('assets/plugins/form-daterangepicker/daterangepicker.js') }}"></script>     				<!-- Date Range Picker -->
<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>      			<!-- Datepicker -->
<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js') }}"></script>      			<!-- Timepicker -->
<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}"></script> <!-- DateTime Picker --> --}}
	

@stack('notif')
@stack('text')
@stack('add')
</body>


</html>