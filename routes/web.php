<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

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

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

     // Founder Section
    Route::get('founder-section', 'FounderSectionController@edit')->name('founder-section.edit');
    Route::put('founder-section', 'FounderSectionController@update')->name('founder-section.update');
    Route::resource('founder-responsibilities', 'FounderResponsibilityController');

    // Founder Timeline
    Route::resource('founder-timelines', 'FounderTimelineController');
    Route::resource('about-why-items', 'AboutWhyItemController');

    // About Page Content
Route::get('about-page-content', 'AboutPageContentController@edit')->name('about-page-content.edit');
Route::put('about-page-content', 'AboutPageContentController@update')->name('about-page-content.update');
    
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


Route::get('founder-journey', 'Frontend\AboutController@index')->name('frontend.about');
Route::get('about-academy', 'Frontend\AboutAcademyController@index');
