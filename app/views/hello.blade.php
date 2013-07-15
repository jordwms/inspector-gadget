<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>		<html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>		<html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>Inspector Gadget</title>
	<meta name="description" content="Applus RTD Inspection Management Framework">
	<meta name="author" content="Applus RTD web design team">

	<meta name="viewport" content="width=device-width,initial-scale=1,target-densityDpi=device-dpi">

	{{ HTML::style('css/admin.css') }}
	<!-- end CSS-->
</head>
<body lang="en" class="applus-gray">
	<div class="admin_buttons">
		<button type="button" class="round-top round-bottom">{{ HTML::link('/', 'Home') }}</button>
		<button type="button" class="round-top round-bottom">{{ HTML::link('logout', 'Logout') }}</button>
	</div>
	<div class="hello">
		<header>Hello {{ Auth::user()->name['first'] }}!</header>

		<div>
			@if( Auth::check() )
				<button type="button" class="round-top round-bottom">{{ HTML::link('admin', 'Admin') }}</button>
			@else
				<button type="button" class="round-top round-bottom">{{ HTML::link('login', 'Login') }}</button>
			@endif
		</div>
	</div>
</body>