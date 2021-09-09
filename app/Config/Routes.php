<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
$routes->get('login/(:num)', 'Home::login/$1');
$routes->get('inicio', 'Home::index');
$routes->get('validar/(:num)', 'Home::mostrar_validar/$1');
$routes->post('validar_user', 'Home::validar');
$routes->get('lobby', 'Home::ir');
$routes->get('lobby_login', 'Home::ir_lobby');
$routes->get('ir', 'Home::lobby');
$routes->get('soy_turista', 'Home::Add_turista');
$routes->get('soy_empresa', 'Home::Add_empresa');
$routes->get('menu_turista', 'Home::ir_turista');
$routes->get('menu_empresa', 'Home::ir_empresa');
$routes->get('salir', 'Home::cerrar_sesion');
$routes->post('guardar_turista', 'Turistas::guardar_turistas');
$routes->post('guardar_agencia', 'Proveedores::guardar_empresas');
$routes->get('publicar_plan', 'Home::formulario_plan');
$routes->post('guardar_plan', 'Planes_turisticos::Guardar_plan');
$routes->get('catalogo', 'Home::catalogo');
$routes->get('bioturismo', 'Home::bioturismo');
$routes->get('biotour', 'Home::biotour');
$routes->get('biotour_t', 'Home::biotour_t');
$routes->post('buscar_pn', 'Home::buscar');
$routes->post('buscar_t', 'Home::buscar_t');
$routes->post('buscar_e', 'Home::buscar_e');
$routes->get('categorias', 'Home::categorias');
$routes->get('categorias_e', 'Home::categorias_e');
$routes->get('categorias_t', 'Home::categorias_t');
$routes->get('mirar_categoria/(:num)', 'Home::mirar_categoria/$1');
$routes->get('mirar_categoria_e/(:num)', 'Proveedores::mirar_categoria/$1');
$routes->get('mirar_categoria_t/(:num)', 'Turistas::mirar_categoria/$1');
$routes->get('lugar/(:num)', 'Planes_turisticos::mostrar_lugar/$1');
$routes->get('lugar_t/(:num)', 'Planes_turisticos::mostrar_lugar_t/$1');
$routes->get('lugar_e/(:num)', 'Planes_turisticos::mostrar_lugar_e/$1');
$routes->get('reserva/(:num)', 'Planes_turisticos::agendar/$1');
$routes->post('buscar_oferta', 'Home::buscar_oferta');
$routes->get('mis_lugares', 'Home::mis_lugares');
$routes->get('mis_solicitudes', 'Home::mis_solicitudes');
