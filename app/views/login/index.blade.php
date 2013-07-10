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

	{{ HTML::style('css/login.css') }}
	<!-- end CSS-->
</head>
<body lang="en" class="applus-gray">
	<div class="loginBox">
		<!-- check for login errors flash var -->
	    @if (Session::has('login_errors'))
	        <span class="error">Username or password incorrect.</span>
	    @endif
		<header>
			Inspector Gadget
		</header>

		{{ Form::open(array('url' => 'login')) }}
			<div class="label-wrapper"><label>{{ trans('login.username') }}</label></div>
			<div class="input-wrapper">
				<input autocorrect="off" autocapitalize="off" class="round-top" placeholder="{{ trans('login.username') }}" name="username" type="text" id="username" required>
			</div>
			<div class="input-wrapper">
				<input autocorrect="off" autocapitalize="off" class="round-bottom" placeholder="{{ trans('login.password') }}" type="password" name="password" id="password" required>
			</div>
			<div class="label-wrapper"><label>{{ trans('login.password') }}</label></div>
			<div class="button-wrapper">
				<button type="submit" class="round-top round-bottom">{{ trans('login.login') }}</button>
			</div>
		{{ Form::close() }}
		{{ HTML::link('login/create_profile', 'Create New User') }}
	</div>
</body>