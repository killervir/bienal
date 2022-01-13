<?php
use Illuminate\Support\Facades\Route;

// Estas rutas son parte de la administración del home, todas se incluyen en el archivo parcial "nav"
// Index
Route::get('/',[
 'as'=>'home',
  'uses'=>'bienalController@index'
]);
// Prensa
Route::get('prensa',[
 'as'=>'prensa',
  'uses'=>'bienalController@prensa'
]);
// Detalle prensa
Route::get('detalle-prensa/{prensa}',[
  'as'=>'prensaDetalle',
   'uses'=>'bienalController@prensaDetalle'
 ]);
// Preguntas frecuentes
Route::get('preguntas-frecuentes',[
 'as'=>'preguntasFrecuentes',
  'uses'=>'bienalController@preguntasFrecuentes'
]);
// Contacto
Route::get('contacto',[
 'as'=>'contacto',
  'uses'=>'bienalController@contacto'
]);
// Registro
Route::prefix('bienal-XIX')->name('xix.')->group(function () {
    Route::get('registrarse', 'registroController@create')->name('create');
    Route::post('registrarse', 'registroController@store')->name('store');
    Route::get('ver/{registro}', 'registroController@show')->name('show');
    Route::get('editar/{registro}', 'registroController@edit')->name('edit');
    Route::patch('actualizar/{registro}', 'registroController@update')->name('update');
    Route::get('eliminar/{registro}', 'registroController@cEliminarIntegrante')->name('cEliminarIntegrante');
    Route::delete('eliminar/{registro}', 'registroController@eliminarIntegrante')->name('eliminarIntegrante');

});
// Aviso de registro exitoso
Route::get('registrado/{folio}',[
 'as'=>'registrado',
  'uses'=>'registroController@registrado' 
]);

Route::resource('phpmailer', 'PhpmailerController');
Route::get('phpmailer', 'PhpmailerController@enviarCorreo');
Route::get('/send/email', 'EmailController@mail');

Route::get('registrado/{folio}',[
 'as'=>'registrado',
  'uses'=>'registroController@registrado'
]);
// Estas rutas son las responsables del controlador del  módulo de administrador
Route::prefix('admin')->name('admin.')->group(function () {
	// CRUD de los contactos
  // Vistas
  Route::get('crear-contacto', 'adminController@crearContacto')->name('crearContacto')->middleware(['auth','roles:1,2']);
  Route::get('editar-contacto/{contacto}', 'adminController@editarContacto')->name('editarContacto')->middleware(['auth','roles:1,2,4']);
  Route::get('lista-contactos', 'adminController@listaContactos')->name('listaContactos')->middleware(['auth','roles:1,2,4']);
  // guardados
  Route::post('guardar-contacto', 'adminController@guardarContacto')->name('guardarContacto')->middleware(['auth','roles:1,2']);
  Route::patch('deshabilitar-contacto/{contacto}', 'adminController@deshabilitarContacto')->name('deshabilitarContacto')->middleware(['auth','roles:1,2']);
  Route::patch('habilitar-contacto/{contacto}', 'adminController@habilitarContacto')->name('habilitarContacto')->middleware(['auth','roles:1,2']);
  Route::patch('actualizar-contacto/{contacto}', 'adminController@actualizarContacto')->name('actualizarContacto')->middleware(['auth','roles:1,2,4']);
	// CRUD de registros
	Route::get('lista-registros', 'adminController@listaRegistros')->name('listaRegistros')->middleware(['auth','roles:1,2,3,5']);
	Route::get('lista-verificados', 'adminController@listaVerificados')->name('listaVerificados')->middleware(['auth','roles:1,2,3']);

	Route::patch('verificar-registro/{registro}', 'adminController@verificarRegistro')->name('verificarRegistro')->middleware(['auth','roles:1,2,3']);
  Route::get('no-aceptado-registro/{registro}', 'adminController@noAceptadoRegistro')->name('noAceptadoRegistro')->middleware(['auth','roles:1,2,3']);

  //CRUD de preguntas frecuentes
  Route::get('crear-faq', 'adminController@crearfaq')->name('crearfaq')->middleware(['auth','roles:1,2']);
  Route::get('editar-faq/{preguntasFrecuentes}', 'adminController@editarFaq')->name('editarFaq')->middleware(['auth','roles:1,2,4']);
  Route::patch('deshabilitar-faq/{preguntasFrecuentes}', 'adminController@deshabilitarFaq')->name('deshabilitarFaq')->middleware(['auth','roles:1,2']);
  Route::patch('habilitar-faq/{preguntasFrecuentes}', 'adminController@habilitarFaq')->name('habilitarFaq')->middleware(['auth','roles:1,2']);

  Route::get('lista-faq', 'adminController@listafaq')->name('listafaq')->middleware(['auth','roles:1,2,4']);
  Route::post('guardar-faq', 'adminController@guardarfaq')->name('guardarfaq')->middleware(['auth','roles:1,2']);
  Route::patch('actualizar-faq/{preguntasFrecuentes}', 'adminController@actualizarFaq')->name('actualizarFaq')->middleware(['auth','roles:1,2,4']);
  //CRUD de prensas
  // vistas
  Route::get('crear-prensa', 'adminController@crearPrensa')->name('crearPrensa')->middleware(['auth','roles:1,2']);
  Route::get('editar-prensa/{prensa}', 'adminController@editarPrensa')->name('editarPrensa')->middleware(['auth','roles:1,2,4']);
  Route::get('lista-prensa', 'adminController@listaPrensa')->name('listaPrensa')->middleware(['auth','roles:1,2,4']);
  // saves
  Route::post('guardar-prensa', 'adminController@guardarPrensa')->name('guardarPrensa')->middleware(['auth','roles:1,2']);
  Route::patch('actualizar-prensa/{prensa}', 'adminController@actualizarPrensa')->name('actualizarPrensa')->middleware(['auth','roles:1,2,4']);
  Route::patch('deshabilitar-prensa/{prensa}', 'adminController@deshabilitarPrensa')->name('deshabilitarPrensa')->middleware(['auth','roles:1,2']);
  Route::patch('habilitar-prensa/{prensa}', 'adminController@habilitarPrensa')->name('habilitarPrensa')->middleware(['auth','roles:1,2']);
  //CRUD de actividades
  //vistas
  Route::get('lista-actividades','adminController@listarActividades')->name('listarActividades')->middleware(['auth','roles:1']);
  Route::get('crear-actividad', 'adminController@crearActividad')->name('crearActividad')->middleware(['auth','roles:1']);
  Route::get('editar-actividad/{actividades}','adminController@editarActividad')->name('editarActividad')->middleware(['auth','roles:1']);
  //saves
  Route::post('guardar-actividad','adminController@guardarActividad')->name('guardarActividad')->middleware(['auth','roles:1']);
  Route::patch('actualizar-actividad/{actividades}','adminController@actualizarActividad')->name('actualizarActividad')->middleware(['auth','roles:1']);
  Route::patch('deshabilitar-actividad/{actividades}','adminController@deshabilitarActividad')->name('deshabilitarActividad')->middleware(['auth','roles:1']);
  Route::patch('habilitar-actividad/{actividades}','adminController@habilitarActividad')->name('habilitarActividad')->middleware(['auth','roles:1']);
  //CRUD de usuarios
  // vistas
  Route::get('lista-usuarios','adminController@listarUsuarios')->name('listarUsuarios')->middleware(['roles:1']);
  Route::get('crear-usuario', 'adminController@CrearUsuario')->name('CrearUsuario')->middleware(['auth','roles:1']);
  Route::get('editar-usuario/{id}','adminController@editarUsuario')->name('editarUsuario')->middleware(['auth','roles:1']);
  //saves
  Route::post('guardar-usuario', 'adminController@guardarUsuario')->name('guardarUsuario')->middleware(['auth','roles:1']);
  Route::patch('actualizar-usuario/{id}','adminController@actualizarUsuario')->name('actualizarUsuario')->middleware(['auth','roles:1']);

  //CRUD de Roles 
  //vistas
  Route::get('lista-roles', 'adminController@listarRoles')->name('listarRoles')->middleware(['auth','roles:1']); 
  Route::get('crear-rol', 'adminController@crearRol')->name('crearRol')->middleware(['auth','roles:1']);
  Route::get('editar-rol/{roles}','adminController@editarRol')->name('editarRol')->middleware(['auth','roles:1']);

  //saves
  Route::post('guardar-rol', 'adminController@guardarRol')->name('guardarRol')->middleware(['auth','roles:1']);
  Route::patch('actualizar-rol/{roles}','adminController@actualizarRol')->name('actualizarRol')->middleware(['auth','roles:1']);
  Route::patch('deshabilitar-rol/{roles}','adminController@deshabilitarRol')->name('deshabilitarRol')->middleware(['auth','roles:1']);
  Route::patch('habilitar-rol/{roles}','adminController@habilitarRol')->name('habilitarRol')->middleware(['auth','roles:1']);
});
// Auth::routes();
  Route::get('pruebas', 'pruebasController@pruebas')->name('pruebas')->middleware(['auth','roles:1,2']);


Route::get('/home', 'bienalController@index')->name('home_principal');

Auth::routes(['register' => false]);

Route::get('/home_admin', 'adminController@index')->name('home_admin')->middleware(['auth','roles:1,2,3,4,5']);

Route::resource('mail','MailController');