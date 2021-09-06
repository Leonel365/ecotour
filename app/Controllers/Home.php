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
	
		$db = \Config\Database::connect();
		$proveedor = new Proveedor();
		$turista = new Turista();

		$tipo = $this->request->getVar('tipo');
		$usario = $this->request->getVar('user');
		$password1= $this->request->getVar('password');
		$password = sha1($password1);
	
		$sw=0;
	if($tipo==1){
		
		$sql = "SELECT usuario, cotrasena FROM turista WHERE usuario = '$usario' and cotrasena = '$password' ";
		$query = $db->query($sql);
		$results = $query->getResultArray();

foreach ($results as $row)
{
	$sw=1;
   
}
		
	}else{
	
		$sql = "SELECT usuario, contrasena FROM proveedores WHERE usuario = '$usario' and contrasena = '$password' ";
		$query = $db->query($sql);
		$results = $query->getResultArray();

			foreach ($results as $row)
			{
				$sw=2;
			
			}
		
	}
			if($sw==0){
			 $session = session();
            $session->setFlashdata('mensaje','ERROR');
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
	public function formulario_plan()
	{
		$datos['cabecera'] = view('template/menu_empresa');
		$datos['pie'] = view('template/footer');
		return view('empresa/Add_plan', $datos);
 
	}
	public function catalogo()
	{
		$datos['cabecera'] = view('template/menu_empresa');
		$datos['pie'] = view('template/footer');
		return view('empresa/catalogo', $datos);
 
	}
	public function bioturismo()
	{
		$datos['cabecera'] = view('template/menu_empresa');
		$datos['pie'] = view('template/footer');
		return view('empresa/bioturismo', $datos);
 
	}

	public function biotour()
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('bioturismo', $datos);
 
	}
	public function biotour_t()
	{
		$datos['cabecera'] = view('template/menu_turista');
		$datos['pie'] = view('template/footer');
		return view('turistas/bioturismo', $datos);
 
	}

	public function buscar()
	{
		$db = \Config\Database::connect();
		$busqueda = $this->request->getVar('buscar');
		$datos['sql'] = "SELECT idLugar_Turistico, nombre, descripcion FROM lugar_turistico WHERE nombre LIKE '%$busqueda%' ";
		

		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('template/busqueda', $datos);
 
	}
	public function buscar_t()
	{
		$db = \Config\Database::connect();
		$busqueda = $this->request->getVar('buscar');
		$datos['sql'] = "SELECT idLugar_Turistico, nombre, descripcion FROM lugar_turistico WHERE nombre LIKE '%$busqueda%' ";
		

		$datos['cabecera'] = view('template/menu_turista');
		$datos['pie'] = view('template/footer');
		return view('template/busqueda', $datos);
 
	}
	public function buscar_e()
	{
		$db = \Config\Database::connect();
		$busqueda = $this->request->getVar('buscar');
		$datos['sql'] = "SELECT idLugar_Turistico, nombre, descripcion FROM lugar_turistico WHERE nombre LIKE '%$busqueda%' ";
		

		$datos['cabecera'] = view('template/menu_empresa');
		$datos['pie'] = view('template/footer');
		return view('template/busqueda', $datos);
 
	}
	public function categorias()
	{
		$datos['cabecera'] = view('template/cabecera');
		$datos['pie'] = view('template/footer');
		return view('categorias', $datos);
 
	}
	public function categorias_e()
	{
		$datos['cabecera'] = view('template/menu_empresa');
		$datos['pie'] = view('template/footer');
		return view('empresa/categorias', $datos);
 
	}
	public function categorias_t()
	{
		$datos['cabecera'] = view('template/menu_turista');
		$datos['pie'] = view('template/footer');
		return view('turistas/categorias', $datos);
 
	}

	public function mirar_categoria($cat)
	{
		if($cat==1){
			$categoria = "atardecer";
		}else if($cat==2){
			$categoria = "caminatas";
		}else if($cat==3){
			$categoria = "pareja";
		}else if($cat==4){
			$categoria = "naturaleza";
		}else if($cat==5){
			$categoria = "animal";
		}
		else if($cat==6){
			$categoria = "agua";
		}


		$db = \Config\Database::connect();
	
		$datos['sql'] = "SELECT idLugar_Turistico, nombre, descripcion FROM lugar_turistico WHERE categoria LIKE '$categoria' ";
		

		$datos['pie'] = view('template/footer');
		return view('mostrar_cat', $datos);
 
	}


}
