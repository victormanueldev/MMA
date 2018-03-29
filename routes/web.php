<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();
//Home de Usuarios
Route::get('/home', 'HomeController@index')->name('home');

//Editar Perfil
Route::resource('edit-profile','UsersController');

//CRUD Mascotas
Route::post('/home/create-mascota', 'MascotasController@store')->name('create-mascota');
Route::resource('edit-pet', 'MascotasController');
Route::get('perfil-mascota/{id}',  'MascotasController@perfilMascota')->name('pet-profile');

//CRUD Citas Medicas
Route::get('confirmar-cita/{mascota}', 'CitasController@create')->name('create-cita');
Route::get('valida-cita', 'CitasController@index')->name('valida-cita');
Route::post('confirmar-cita', 'CitasController@store')->name('store-cita');

//CRUD Peluqueria
Route::post('confirmar-peluqueria', 'PeluqueriasController@store')->name('store-peluqueria');


//Alimentacion
Route::get('alimentacion/{user}', 'AlimentacionController@index')->name('alimentacion');
Route::post('alimentacion', 'AlimentacionController@store')->name('store-alimentacion');
Route::get('edit-alimentacion/{user}', 'AlimentacionController@edit')->name('edit-alimentacion');
Route::post('edit-alimentacion/{user}', 'AlimentacionController@update')->name('update-alimentacion');

//Home de Admin
Route::get('home-admin', 'AdministradorController@secret')->name('home-admin');

//Index de Clientes
Route::get('clientes', 'ClientesController@index')->name('clientes-index');

//Index de Mascotas
Route::get('mascotas', 'MascotasController@index')->name('mascotas-index');

//Index de Citas
Route::get('citas','CitasController@show')->name('citas-index');
Route::post('citas/{id}', 'CitasController@update')->name('citas-update');
Route::get('citas/index', 'CitasController@indexCitas')->name('citas-all');

//Index de Peluqueria
Route::get('peluquerias', 'PeluqueriasController@index')->name('peluquerias-index');
Route::post('peluquerias/{id}', 'PeluqueriasController@update')->name('peluquerias-update');
Route::get('peluquerias/index', 'PeluqueriasController@indexPeluquerias')->name('peluquerias-all');

//Index de Perfiles de Compra
Route::get('perfiles', 'AlimentacionController@perfilesView')->name('perfiles-index');
Route::get('notificaciones', 'AlimentacionController@create')->name('notificaciones-masivas');
Route::post('notificaciones/envio', 'AlimentacionController@smsMasivos')->name('sms-masivo');
Route::post('perfiles/envio', 'AlimentacionController@enviarSMS')->name('enviar-sms');
Route::get('perfil-cliente/{id}', 'ClientesController@show')->name('perfil-cliente');

//Consulta de Saldo
Route::get('saldo', 'AlimentacionController@consultarSaldo')->name('consulta-saldo');

//Login Administradores
Route::get('admin', 'AdministradorController@showLoginForm');
Route::post('/admins/login', 'AdministradorController@login')->name('admins-login');

//CRUD vacunas
Route::get('vacunas/{mascota}', 'PerfilVacunaController@show')->name('vacunas-show');
Route::post('vacunas/aplicar', 'PerfilVacunaController@store')->name('perfilVacuna-store');
Route::get('notificacion-vacunas', 'PerfilVacunaController@index')->name('notificacion-vacunas');
Route::post('notificacion/vacuna/envio', 'PerfilVacunaController@smsMasivos')->name('sms-vacuna');
