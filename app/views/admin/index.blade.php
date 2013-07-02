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
	{{ HTML::style('css/admin.css') }}
	<!-- end CSS-->
</head>
<body>
	<div class="admin">
		<p>
			Admin Panel
		<p>
		<table>
			<thead>
				<th>Users</th>
			</thead>
			<tbody>
				@foreach($members as $mem)
					<tr>
						<td>
							<a href="{{ URL::to('admin/profile/'.$mem->username); }}">{{ $mem->username }}</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div>
			{{ HTML::link('/', 'Home') }}
			|
			{{ HTML::link('logout', 'Logout') }}
			|
			{{ HTML::link('admin/create_profile', 'Create New User') }}
		</div>
		
	</div>
</body>