<?php
/*
	Para consultar los detalles de las rutas, ingresar en consola el comando:
		php artisan route:list
*/
use Caffeinated\Shinobi\Models\Permission;
Route::get('/', function(){
	// Si se ha iniciado sesión, se redireccionará a la vista "home". Caso contrario se redireccionará a la vista "login"
	if(Auth::check()){return redirect()->route('home');}
	else{return redirect()->route('login');}
})->name('root');

Auth::routes(['register' => false]);

//El siguiente grupo de rutas solo será accedido si se ha iniciado sesión. Los demás middlewares se implementan en los controladores
Route::middleware(['auth','enabled'])->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');

	Route::prefix('profile')->group(function(){
		Route::get('/','ProfileController@show')->name('profile.show');
		Route::prefix('/edit')->group(function(){
			Route::get('/','ProfileController@edit')->name('profile.edit');
			Route::put('/','ProfileController@update')->name('profile.update');
			Route::get('/password','ProfileController@editPassword')->name('profile.editPassword');
			Route::patch('/password','ProfileController@updatePassword')->name('profile.updatePassword');
		});
	});

	Route::resource('users', 'UserController');

	Route::prefix('users/{user}/edit')->group(function(){
		Route::get('/assign-role','UserController@assignRole')->name('users.assignRole');
		Route::patch('/assign-role','UserController@updateAssignedRole')->name('users.updateAssignedRole');
		Route::get('/state','UserController@editState')->name('users.editState');
		Route::patch('/state','UserController@updateState')->name('users.updateState');
		Route::patch('/reset-password','UserController@resetPassword')->name('users.resetPassword');
	});

	Route::prefix('users/reports')->group(function(){
Route::get('/{report}','UserController@report')->name('users.report');
Route::get('/{report}/pdf','UserController@report')->name('users.report');
	});

	Route::resource('roles', 'RoleController');

	Route::prefix('roles/{role}/edit')->group(function(){
		Route::get('/permissions','RoleController@editPermissions')->name('roles.editPermissions');
		Route::put('/permissions','RoleController@updatePermissions')->name('roles.updatePermissions');
	});

	Route::resource('/plantas', 'PlantasController');



	Route::resource('/parcelas', 'ParcelaController');



	Route::resource('/riego', 'RiegoController');




	Route::get('test',function(){

		dd(in_array(array('1', '2'), '2'));


		$permission = Permission::find(5);
		//dd($permission->roles);
		dd(auth()->user()->hasRole('editor'));
	});

	Route::get('test/{role}',function($role){
		dd($role);
	})->name('test_role');





});