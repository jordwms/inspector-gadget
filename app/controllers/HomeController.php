<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	/*
	*
	* This may be available to all users, so it will be moved from AdminController
	*
	* Handles both GET and POST requests to the same URL
	*/
	public function create_profile() {
		if( Input::has('username') && Input::has('email') ) {
			$email = Input::get('email');

			// If the email matches a simple email formatting schema...
			if( preg_match('(\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,3})', $email) ) {
				// be happy!
				// var_dump('WINNER!'); die;
			}

			// Check that the submitted username is unique...
			$unique = Users::findOne( array('username' => Input::get('username')) );
			
			// ... and the email has a valid domain
			$companies = Companies::find();
			$valid_domain = FALSE;

			strtok($email, '@');
			$domain = strtok('@');

			// A new user must be part of a registered company
			// foreach ($companies as $company) {
			// 	// If $_POST['email'] domain matches registered domains, create the account. Note: case insensitive.			
			// 	if ( preg_match("/^".$company->domain."$/i", $domain) ) {
			// 		$valid_domain = TRUE;
			// 		var_dump("it's a match!"); die;

			// 	}
			// }

			if(is_null($unique)) {
				$new = Input::except(array('_token', 'confirm_password') );

				// Hash password and insert enw entry to mongodb
				# This seems exceedingly unsafe - pw's should be hashed on form submit and decrypted just before this step...
				if( (Input::get('confirm_password') == $new['password']) && !is_null($new['password']) ) {
					$new['password'] = Hash::make($new['password']);
				    Users::insert($new);

				    return Redirect::to('login'); 
					// return "Profile created successfully.";
				} else {
					return Redirect::to('login/create_profile')
            						->with('message', 'password doesnt match');
				}
			    
			}
			return Redirect::to('login/create_profile')
							->with('message', 'Somethin\' ain\'nt right.');
		} else {
			return View::make('login.create_profile');
		}
	}
}