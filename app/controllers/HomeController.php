<?php

class HomeController extends BaseController {
	private $rules;

	function login()
	{
		$_token = csrf_token();
		return View::make('admin.login')->with('_token', $_token);
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

	public function edit()
	{
		$data = Content::all();
		return View::make('admin.edit')->with('data', $data);
	}

	public function insert()
	{
		$data = Input::all();
		$data['time'] = time();

		if(Content::create($data))
			return View::make('admin/success');

		else
			return Response::make('出了点错误', 403);
	}

	public function delete()
	{
		$id = Input::only('id');
		if(Content::destroy($id))
			return View::make('admin/success');
		else
			return Response::make('出了点错误', 403);
	}

	public function update()
	{
		$id = Input::only('id');
		$pic = Input::file('pic');
		$erweima = Input::file('erweima');
		$pic_name = 'pic'.time();
		$erweima_name = storage_path().'/erweima'.time();
		$pic->move(storage_path().'/'.$pic_name, $pic_name);
		$erweima->move(storage_path().'/'.$erweima_name, $pic_name);
		$update = Content::find($id);
		$pic_path = storage_path().'/'.$pic_name;
		$erweima_path = storage_path().'/'.$erweima_name;
		$update->pic = $pic_path;
		$update->erweima = $erweima_path;
		return View::make('admin/success');
	}

	public function test()
	{
		return Hash::make('303547');
	}

}
