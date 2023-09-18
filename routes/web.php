<?php


Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    //Zones
    Route::resource('zones', 'ZonesController');

    //Sub Zones
    Route::resource('sub_zones', 'SubZonesController');

    //Hotels
    Route::get('{zone}/hotels', 'HotelsController@hotelsByZone')->name('hotels.byzone');
    Route::post('zoneSelect', 'HotelsController@zoneSelect')->name('zone.select');
    Route::post('subzoneSelect', 'HotelsController@subzoneSelect')->name('subzone.select');
    Route::resource('hotels', 'HotelsController');

    //News
    Route::post('news/media', 'NewsController@storeMedia')->name('news.storeMedia');
    Route::post('news/delmedia', 'NewsController@deleteMedia')->name('news.deleteMedia');
    Route::resource('news', 'NewsController');

    Route::get('/email', function() {
        $data = [
            'owner' => 'U Mg Mg',
            'nrc_no' => '8/MaKaNa(N)23343',
            'address' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium, cupiditate dolor vel unde fuga consequuntur. Nam temporibus iusto earum quidem.",
            'owner_phone'  => '094343434873',
            'member_type' => 'B'
        ];
        return view('admin.mail.hotelMemberForm', compact('data'));
    });

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
