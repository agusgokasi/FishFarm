<?php

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'ProjectController@welcome');



Route::get('/configcache', 'CommandController@configcache');
Route::get('/routecache', 'CommandController@routecache');
Route::get('/bersihincache', 'CommandController@bersihincache');
// Route::get('/dumpautoload', 'CommandController@dumpautoload');
// Route::get('/storagelink', 'CommandController@storagelink');

Auth::routes(['verify' => true]);

//list2 route gambar
    Route::get('project_image/{filename}', 'CommandController@routegambarproject');
    Route::get('project_image1/{filename}', 'CommandController@routegambarproject1');
    Route::get('project_image2/{filename}', 'CommandController@routegambarproject2');
    
    
//admooon
Route::group(['middleware' => ['admin', 'forbid-banned-user']], function () {
    // Route::get('/Maintenance', 'CommandController@putUnderMaintenance');
    // Route::get('/KelarMaintenance', 'CommandController@putNotMaintenance');
    
	//onlen chat
	Route::get('/message', 'ContactsController@pesan');
	//banned user
    Route::get('/admin', 'AdminController@adminDashboard');
    Route::get('users', 'AdminController@index')->name('users.list');
    Route::post('user_revoke/{id}', 'AdminController@revoke');
    Route::post('user_banned_tahun/{id}', 'AdminController@ban_tahun');

    //harus admin yang membuat project
	// Route::resource('projects', 'ProjectController')->only(['create','edit']);
	Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
	Route::post('/projects', 'ProjectController@store')->name('projects.store');
	Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('projects.edit');
	// Route::delete('/projects/{project}', 'ProjectController@destroy')->name('projects.destroy');
	Route::post('/projects_delete/{project}', 'ProjectController@destroy')->name('projects.destroy');
	// Route::put('/projects/{project}', 'ProjectController@update')->name('projects.update');
	Route::post('/projects/{project}', 'ProjectController@update')->name('projects.update');

	// topup
	// Route::resource('topups', 'TopupController')->only(['index','edit']);
	Route::put('/topups/{topup}', 'TopupController@update')->name('topups.update');
	Route::get('/topups/{topup}/edit', 'TopupController@edit')->name('topups.edit');
	Route::get('/topups', 'TopupController@index')->name('topups.index');
	Route::post('topups/{id}','TopupController@update');
	Route::get('/transaksi/transaksi', 'TransaksiController@transaksi');
	// profit
	Route::get('profit/{project}', 'ProfitController@show');
	Route::post('profit/{project}', 'ProfitController@sendProfit');
	// profit akhir
	Route::get('profitAkhir/{project}', 'ProfitController@showProfitAkhir');
	Route::post('profitAkhir/{project}', 'ProfitController@sendProfitAkhir');
	// cancel project
	Route::get('cancel/{project}', 'ProjectController@showCancel');
	Route::post('cancel/{project}', 'ProjectController@sendCancel');
	//withdraw
	// Route::resource('withdraws', 'WithdrawController')->only(['index', 'edit']);
	Route::get('/withdraws/{withdraw}/edit', 'WithdrawController@edit')->name('withdraws.edit');
	Route::get('/withdraws', 'WithdrawController@index')->name('withdraws.index');
	Route::put('/withdraws/{withdraw}', 'WithdrawController@update')->name('withdraws.update');
	Route::post('withdraws/{id}/edit','WithdrawController@update');
	Route::post('withdraws/{id}','WithdrawController@updateBukti');
	Route::get('withdraws/{id}/kirimBukti', 'WithdrawController@editBukti')->name('withdraws.kirimBukti');
});

// Projects
// Route::resource('projects', 'ProjectController')->only(['index', 'show']); 
// guest bisa melihat list project(index) dan info lengkap dari project(single)
Route::get('project', 'ProjectController@index_guest');
Route::get('project/{project}', 'ProjectController@show_guest');


//user
Route::group(['middleware' => ['auth', 'verified', 'forbid-banned-user']], function () {
	//onlen chat
	Route::get('/message', 'ContactsController@pesan');
	// user yang ter-auth bisa memakai fungsi CRUD nya. kecuali user biasa tidak bisa memakain fungsi create
	// Route::resource('projects', 'ProjectController')->except(['edit', 'create']); 
	Route::get('/projects', 'ProjectController@index')->name('projects.index');
	Route::get('/projects/terdanai', 'ProjectController@index_terdanai')->name('projects.index_terdanai');
	Route::get('/projects/selesai', 'ProjectController@index_selesai')->name('projects.index_selesai');
	Route::get('/projects/{project}', 'ProjectController@show')->name('projects.show');
	//topup
	// Route::resource('topups', 'TopupController')->except(['index','edit']);
	// Route::get('/topups/{topup}/edit', 'TopupController@edit')->name('topups.edit');
	// Route::get('/topups', 'TopupController@index')->name('topups.index');
	Route::get('/topups/create', 'TopupController@create')->name('topups.create');
	Route::post('/topups', 'TopupController@store')->name('topups.store');
	// Route::put('/topups/{topup}', 'TopupController@update')->name('topups.update');
	//withdraw
	// Route::resource('withdraws', 'WithdrawController')->except(['index', 'edit']);
	// Route::get('/withdraws/{withdraw}/edit', 'WithdrawController@edit')->name('withdraws.edit');
	// Route::get('/withdraws', 'WithdrawController@index')->name('withdraws.index');
	Route::get('/withdraws/create', 'WithdrawController@create')->name('withdraws.create');
	Route::post('/withdraws', 'WithdrawController@store')->name('withdraws.store');
	// Route::put('/withdraws/{withdraw}', 'WithdrawController@update')->name('withdraws.update');
	//transaksi
	Route::get('/transaksi', 'TransaksiController@index');
	// slot
	Route::put('projects_slot/{project}', 'ProjectController@buySlot');
	//list2 route gambar
    Route::get('topup/{filename}', 'CommandController@routegambartopup');
    Route::get('withdraw/{filename}', 'CommandController@routegambarwithdraw');
    Route::get('moneyreport/{filename}', 'CommandController@routemoneyreport');
    
    

	//chat
// 	Route::get('/contacts', 'ContactsController@get');
// 	Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
// 	Route::post('/conversation/send', 'ContactsController@send');
	
});



// page yang bisa di lewati user tapi harus pake verifikasi email
// Route::get('profile', function () {
//     return 'dashboard';
// })->middleware('verified');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('refresh_captcha', 'HomeController@refreshCaptcha')->name('refresh_captcha');

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm1');