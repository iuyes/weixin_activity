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
		if(Content::destroy($id['id']))
			return View::make('admin/success');
		else
			return Response::make('出了点错误', 403);
	}

	public function update()
	{
		$id = Input::only('id');
		$pic = Input::file('pic');
		$erweima = Input::file('erweima');

		$pic_mime = $pic->getClientOriginalExtension();
		$erweima_mime = $erweima->getClientOriginalExtension();

		$time = time();
		$pic_name = $time.'.'.$pic_mime;
		$erweima_name = $time.'.'.$erweima_mime;

		$pic->move('pic', $pic_name);
		$erweima->move('erweima', $erweima_name);

		$update = Content::find($id['id']);
		$pic_path = $pic_name;
		$erweima_path = $erweima_name;
		$update->pic = $pic_path;
		$update->erweima = $erweima_path;
		$update->save();
		return View::make('admin/success');
	}

	public function getInfo()
	{
		$data = Content::all();
		return View::make('webchat.index')->with('data', $data);
	}



}