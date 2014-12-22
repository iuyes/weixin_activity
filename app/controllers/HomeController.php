<?php

class HomeController extends BaseController {
	private $rules;
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

	function login(){
		$_token = csrf_token();
		return View::make('login')->with('_token', $_token);
	}

	public function validate()
	{
		$this->rules = array(
			'username' => 'required',
			'password' => 'required|min:6|max:18',
		);
		$data = Input::only('username', 'password');
		$validator = Validator::make($data, $this->rules);

		if($validator->fails())
		{
			return Redirect::to('login')
				->withErrors($validator);
		}
		else
		{
			if(Auth::attempt(
				array(
					'username' => $data['username'],
					'password' => $data['password'],
				)
			)
			)
			{
				return Redirect::to('edit');
			}
			else
			{
				$error = 'the username or password is false!';
				return Redirect::to('login')->withErrors($error);
			}
		}

	}

	public function insert()
	{
		$data = Input::only('activity_name');
		$data['time'] = time();
		if(Content::create($data))
			return View::make('success');
		else
			return Response::make('出了点错误', 403);
	}

	public function test()
	{
		return Hash::make('303547');
	}

}
