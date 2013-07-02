<div id="profile">
	{{ Form::open(array('url' => '/admin/profile/'.$member->username)) }}
		<div><label>Username - {{ $member->username }}</label></div>
		<div><label>First Name</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" value="{{ $member->name['first'] }}" type="text" name="name[first]" id="name[first]" />
		</div>
		<div><label>Middle Name</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" value="@if(array_key_exists('middle', $member->name)){{ $member->name['middle'] }}@endif" type="text" name="name[middle]" id="name[middle]" />
		</div>
		<div><label>Last Name</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" value="{{ $member->name['last'] }}" type="text" name="name[last]" id="name[last]" />
		</div>
		<div><label>Email</label></div>
		<div>
			<input autocorrect="off" autocapitalize="off" value="{{ $member->email }}" type="text" name="email" id="email" />
		</div>
		<div>
			<button type="submit">Update</button>
		</div>
	{{ Form::close() }}
</div>