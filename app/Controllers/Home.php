<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$datos['cabecer'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('index', $datos);
	}
}
