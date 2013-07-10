<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Admin Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	public function index() {
		$members = Users::find();
		// $members = array('fun!');

		return View::make('admin.index')
					->with('members', $members);
	}

	public function profile($username) {
		$member = Users::findOne( array('username' => $username) );
		return View::make('admin.profile')
			->with('member', $member);
	}

	public function update_profile($username) {
        $update = Input::except('_token');

        Users::update(
            array( 'username' => $username ),
            array( '$set'	=> $update )
        );

        return Redirect::to('admin/profile/'.$username)
        				->with('update_successful', TRUE);
	}

	/*
	*
	* This may be available to all users, so it will be moved from AdminController
	*
	*
	*/
	public function create_profile() {
		if( Input::has('username') && Input::has('email') ) {
			$email = Input::get('email');

			if( preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3})', $email) ) {
				// be happy!
			}

			// Check that the submitted username is unique...
			$unique = Users::findOne( array('username' => Input::get('username')) );
			
			// ... and the email has a valid domain
			$companies = Companies::find();
			$valid_domain = FALSE;

			strtok($email, '@');
			$domain = strtok('@');

			foreach ($companies as $company) {
				// If $_POST['email'] domain matches registered domains, create the account. Note: case insensitive.			
				if ( preg_match("/^".$company->domain."$/i", $domain) ) {
					$valid_domain = TRUE;
					var_dump("it's a match!"); die;

				}
			}

			if(is_null($unique)) {
				$new = Input::except('_token');
				Users::insert($new);
				return "Profile created successfully.";
			}
			return Redirect::to('admin/create_profile')
							->with('message', 'Somethin\' ain\'nt right.');
		} else {
			return View::make('admin.create_profile');
		}
	}

	// Mongo ID = " Auth::user()->id "
}