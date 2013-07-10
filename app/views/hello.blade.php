<h1>Hello {{ Auth::user()->name['first'] }}!</h1>

<div>
	@if( Auth::check() )
		{{ HTML::link('admin', 'Admin') }}
		|
	    {{ HTML::link('logout', 'Logout ('.Auth::user()->name['first'].' '.Auth::user()->name['last'].')') }}
	@else
		{{ HTML::link('login', 'Login') }}
	@endif
</div>