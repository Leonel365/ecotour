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

	public function login()
	{
		$datos['cabecer'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('login/login', $datos);
	}
	public function mostrar_validar()
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('login/validar_login', $datos);
	}
	public function ir()
	{?>
		<script>
		window.parent.location="<?=Base_url('ir')?>";
		</script>
<?php
	}
	public function lobby()
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('login/lobby', $datos);
 
	}
	public function Add_turista()
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('login/Add_turista', $datos);
 
	}
	public function Add_empresa()
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('login/Add_agencia', $datos);
 
	}
}
