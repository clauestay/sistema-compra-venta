<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//video 70. agregagndo los accesos por roles (middleware group)
//acceso rutas para invitados - usuarios sin autenticar
Route::group(['middleware'=>['guest']],function(){
//Auth::routes();
    Route::get('/','Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login')->name('login');
});

//acceso para usuarios autenticados
Route::group(['middleware'=>['auth']],function(){

//video 71.- cerrando sesion
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/dashboard', 'DashboardController');

//notificaciones
Route::post('/notification/get', 'NotificationController@get');

//editado en el video 69 de / a /main
Route::get('/main', function () {
    return view('contenido/contenido');
})->name('main');

//dentro de los autenticados - acceso para el rol almacenero
Route::group(['middleware' => ['Almacenero']], function(){

    //rutas a categorias
    Route::get('/categoria', 'CategoriaController@index');
    Route::post('/categoria/registrar', 'CategoriaController@store');
    Route::put('/categoria/actualizar', 'CategoriaController@update');
    Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
    Route::put('/categoria/activar', 'CategoriaController@activar');
    Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

    //rutas a articulos
    Route::get('/articulo', 'ArticuloController@index');
Route::post('/articulo/registrar', 'ArticuloController@store');
Route::put('/articulo/actualizar', 'ArticuloController@update');
Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
Route::put('/articulo/activar', 'ArticuloController@activar');
Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
Route::get('/articulo/listadoArticulos', 'ArticuloController@listadoArticulos');
Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');


//rutas a proveedores
Route::get('/proveedor', 'ProveedorController@index');
Route::post('/proveedor/registrar', 'ProveedorController@store');
Route::put('/proveedor/actualizar', 'ProveedorController@update');
Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

//rutas a ingresos
Route::get('/ingreso', 'IngresoController@index');
Route::post('/ingreso/registrar', 'IngresoController@store');
Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');

});

//dentro de los autenticados - acceso para el rol vendedor
Route::group(['middleware' => ['Vendedor']], function(){

    //rutas a los clientes
    Route::get('/cliente', 'ClienteController@index');
    Route::post('/cliente/registrar', 'ClienteController@store');
    Route::put('/cliente/actualizar', 'ClienteController@update');
    Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

    Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
    Route::get('/articulo/listadoArticulosVenta', 'ArticuloController@listadoArticulosVenta');

    //rutas ventas
Route::get('/venta', 'VentaController@index');
Route::post('/venta/registrar', 'VentaController@store');
Route::put('/venta/desactivar', 'VentaController@desactivar');
Route::get('/venta/obtenerCabecera','VentaController@obtenerCabecera');
Route::get('/venta/obtenerDetalles','VentaController@obtenerDetalles');
Route::get('/venta/pdf/{id}', 'VentaController@pdf')->name('venta_pdf');


    //rutas a consulta por ventas


});
//dentro de los autenticados - acceso para el rol vendedor
Route::group(['middleware' => ['Administrador']], function(){

//rutas para categorias
Route::get('/categoria', 'CategoriaController@index');
Route::post('/categoria/registrar', 'CategoriaController@store');
Route::put('/categoria/actualizar', 'CategoriaController@update');
Route::put('/categoria/desactivar', 'CategoriaController@desactivar');
Route::put('/categoria/activar', 'CategoriaController@activar');
Route::get('/categoria/selectCategoria', 'CategoriaController@selectCategoria');

//rutas para articulos
Route::get('/articulo', 'ArticuloController@index');
Route::post('/articulo/registrar', 'ArticuloController@store');
Route::put('/articulo/actualizar', 'ArticuloController@update');
Route::put('/articulo/desactivar', 'ArticuloController@desactivar');
Route::put('/articulo/activar', 'ArticuloController@activar');
Route::get('/articulo/buscarArticulo', 'ArticuloController@buscarArticulo');
Route::get('/articulo/listadoArticulos', 'ArticuloController@listadoArticulos');
Route::get('/articulo/buscarArticuloVenta', 'ArticuloController@buscarArticuloVenta');
Route::get('/articulo/listadoArticulosVenta', 'ArticuloController@listadoArticulosVenta');
Route::get('/articulo/listarPdf', 'ArticuloController@listarPdf')->name('articulos_pdf');


//rutas para proveedores
Route::get('/proveedor', 'ProveedorController@index');
Route::post('/proveedor/registrar', 'ProveedorController@store');
Route::put('/proveedor/actualizar', 'ProveedorController@update');
Route::get('/proveedor/selectProveedor', 'ProveedorController@selectProveedor');

//rutas a clientes
Route::get('/cliente', 'ClienteController@index');
Route::post('/cliente/registrar', 'ClienteController@store');
Route::put('/cliente/actualizar', 'ClienteController@update');
Route::get('/cliente/selectCliente', 'ClienteController@selectCliente');

//rutas a roles
Route::get('/rol', 'RolController@index');
Route::get('/rol/selectRol', 'RolController@selectRol');

//rutas a usuarios
Route::get('/user', 'UserController@index');
Route::post('/user/registrar', 'UserController@store');
Route::put('/user/actualizar', 'UserController@update');
Route::put('/user/desactivar', 'UserController@desactivar');
Route::put('/user/activar', 'UserController@activar');

//rutas a ingresos
Route::get('/ingreso', 'IngresoController@index');
Route::post('/ingreso/registrar', 'IngresoController@store');
Route::put('/ingreso/desactivar', 'IngresoController@desactivar');
Route::get('/ingreso/obtenerCabecera', 'IngresoController@obtenerCabecera');
Route::get('/ingreso/obtenerDetalles', 'IngresoController@obtenerDetalles');

//rutas ventas
Route::get('/venta', 'VentaController@index');
Route::post('/venta/registrar', 'VentaController@store');
Route::put('/venta/desactivar', 'VentaController@desactivar');
Route::get('/venta/obtenerCabecera','VentaController@obtenerCabecera');
Route::get('/venta/obtenerDetalles','VentaController@obtenerDetalles');
Route::get('/venta/pdf/{id}', 'VentaController@pdf')->name('venta_pdf');
});
});

