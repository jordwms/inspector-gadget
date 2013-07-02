<div id="create_profile">
	@if (Session::has('login_errors'))
        <span class="error">Username or password incorrect.</span>
	@endif
	{{ Form::open(array('url' => '/admin/create_profile')) }}
		<div><label>Username</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" placeholder="first.last" type="text" name="username" id="username">
		</div>
		<div><label>First Name</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" placeholder="first name" type="text" name="name[first]" id="name_first">
		</div>
		<div><label>Middle Name</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" placeholder="middle name" type="text" name="name[middle]" id="name_middle">
		</div>
		<div><label>Last Name</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" placeholder="last name" type="text" name="name[last]" id="name_last">
		</div>
		<div><label>Workplace Email</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" placeholder="John.Doe@ApplusRTD.com" type="text" name="email" id="email">
		</div>
		<div><label>Password</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" placeholder="" type="password" name="password" id="password">
		</div>
		<div><label>Confirm Password</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" placeholder="" type="password" name="confirm_password" id="confirm_password">
		</div>
		<div>
			<button type="submit">Create</button>
		</div>
	{{ Form::close() }}
</div>