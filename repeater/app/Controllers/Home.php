<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('home/index');
	}

	public function signup()
	{
		return view('signup/new_user');
	}
}
