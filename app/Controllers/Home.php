<?php

namespace App\Controllers;
use App\Models\proveedor;
use App\Models\turista;
class Home extends BaseController
{
	public function index()
	{
		$datos['cabecer'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('index', $datos);
	}

	public function login($tipo)
	{
	
		$datos['cabecer'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		$datos['tipo'] = $tipo;

		return view('login/login', $datos);
	}
	public function mostrar_validar($tipo)
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		$datos['tipo'] = $tipo;
		return view('login/validar_login', $datos);
	}
	public function ir()
	{
		?>
		<script>
		window.parent.location="<?=Base_url('ir')?>";
		</script>
<?php
	}
	
	public function ir_lobby()
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('login/inicio_login', $datos);
 
	}

	public function ir_turista()
	{
		$datos['cabecera'] = view('template/menu_turista');
		$datos['pie'] = view('template/footer');
		return view('turistas/inicio', $datos);
 
	}

	public function ir_empresa()
	{
		$datos['cabecera'] = view('template/menu_empresa');
		$datos['pie'] = view('template/footer');
		return view('empresa/inicio', $datos);
 
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

	public function cerrar_sesion()
	{
	//	session_destroy();
		$datos['cabecer'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('index', $datos);
 
	}

	public function validar(){
	

		$proveedor = new Proveedor();
		$turista = new Turista();

		$tipo = $this->request->getVar('tipo');
		$usario = $this->request->getVar('user');
		$password1= $this->request->getVar('password');
		$password = sha1($password1);
	
		$sw=0;
	if($tipo==1){
			$user_activo = $turista->where('usuario',$usario)->findAll();
			$contraseña = $turista->where('cotrasena',$password)->findAll();

			if(isset($user_activo) and isset($contraseña)){
					$sw=1;
			}
		
	}else{
	
			$user_activo = $proveedor->where('usuario',$usario)->findAll();
			$contraseña = $proveedor->where('contrasena',$password)->findAll();
			

			if(isset($user_activo) and isset($contraseña)){
					$sw=2;
			}
		
	}
			if($sw==0){
			 $session = session();
            $session->setFlashdata('mensaje',$tipo);
            return redirect()->back()->withInput();
			}
			if($sw==1){
				session_start();
				$_SESSION['usuario']=$usario;
				$_SESSION['tipo_user']="turista";
				
					?>
					<script>
					window.parent.location="<?=Base_url('menu_turista')?>";
					</script>
			<?php

			}
			if($sw==2){
				session_start();
				$_SESSION['usuario']=$usario;
				$_SESSION['tipo_user']="empresa";
				?>
				<script>
				window.parent.location="<?=Base_url('menu_empresa')?>";
				</script>
		<?php
			}
		
	
	
	
		
	
	
	
	
	
	}



}
