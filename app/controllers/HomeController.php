<?php

class HomeController extends BaseController {
	private $rules;

	//渲染登陆页面
	function login()
	{
		$_token = csrf_token();
		return View::make('admin.login')->with('_token', $_token);
	}

	//验证登陆
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

	//渲染后台编辑页面
	public function edit()
	{
		$data = Content::all();
		return View::make('admin.edit')->with('data', $data);
	}

	//添加新活动
	public function insert()
	{
		$data = Input::all();
		$data['time'] = time();

		if(Content::create($data))
			return View::make('admin/success');

		else
			return Response::make('出了点错误', 403);
	}

	//删除活动
	public function delete()
	{
		$id = Input::only('id');
		if(Content::destroy($id['id']))
			return View::make('admin/success');
		else
			return Response::make('出了点错误', 403);
	}

	//给活动插入/更新图片
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

	//渲染活动展示页
	public function getInfo()
	{
		$data = Content::all();
		return View::make('webchat.index')->with('data', $data);
	}

	// public function test()
	// {
	// 	return Hash::make('303547');
	// }


}