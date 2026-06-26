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
Route::delete('founder-timelines/destroy', 'FounderTimelineController@massDestroy')
    ->name('founder-timelines.massDestroy');

Route::resource('founder-timelines', 'FounderTimelineController');
    Route::resource('about-why-items', 'AboutWhyItemController');
    Route::resource('company-recognitions', 'CompanyRecognitionController');
    Route::resource('result-rankers', 'ResultRankerController');
    Route::resource('result-testimonials', 'ResultTestimonialController');
    Route::resource('gallery-items', 'GalleryItemController', ['except' => ['show']]);
    Route::resource('faculty-members', 'FacultyMemberController', ['except' => ['show']]);
    Route::resource('startup-cards', 'StartupCardController', ['except' => ['show']]);
    Route::resource('resource-items', 'ResourceItemController', ['except' => ['show']]);
    Route::resource('startup-trust-cards', 'StartupTrustCardController', ['except' => ['show']]);
    Route::resource('key-point-trust-cards', 'KeyPointTrustCardController', ['except' => ['show']]);
    Route::resource('contact-inquiries', 'ContactInquiryController', ['only' => ['index', 'destroy']]);
    Route::resource('admission-inquiries', 'AdmissionInquiryController', ['only' => ['index', 'destroy']]);
    Route::resource('scholarship-inquiries', 'ScholarshipInquiryController', ['only' => ['index', 'destroy']]);
    Route::get('website-settings', 'WebsiteSettingController@edit')->name('website-settings.edit');
    Route::put('website-settings', 'WebsiteSettingController@update')->name('website-settings.update');
    Route::get('home-hero-settings', 'HomeHeroSettingController@edit')->name('home-hero-settings.edit');
    Route::put('home-hero-settings', 'HomeHeroSettingController@update')->name('home-hero-settings.update');

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


Route::get('/', 'Frontend\HomeController@index')->name('frontend.home');
Route::get('founders-journey', 'Frontend\AboutController@index')->name('frontend.founders-journey');
Route::get('about-academy', 'Frontend\AboutAcademyController@index')->name('frontend.about-academy');
Route::get('company-information', 'Frontend\AboutController@company')->name('frontend.company-information');
Route::view('courses', 'frontend.courses')->name('frontend.courses');
Route::view('neet-program', 'frontend.neet-program')->name('frontend.neet-program');
Route::view('jee-program', 'frontend.jee-program')->name('frontend.jee-program');
Route::view('foundation-course', 'frontend.foundation-course')->name('frontend.foundation-course');
Route::view('test-series', 'frontend.test-series')->name('frontend.test-series');
Route::view('ai-learning', 'frontend.ai-learning')->name('frontend.ai-learning');
Route::get('results', 'Frontend\ResultController@index')->name('frontend.results');
Route::get('gallery', 'Frontend\GalleryController@index')->name('frontend.gallery');
Route::get('resources', 'Frontend\ResourceController@index')->name('frontend.resources');
Route::get('faculty', 'Frontend\FacultyController@index')->name('frontend.faculty');
Route::get('startup-vision', 'Frontend\StartupVisionController@index')->name('frontend.startup-vision');
Route::view('contact', 'frontend.contact')->name('frontend.contact');
Route::view('admission', 'frontend.admission')->name('frontend.admission');
Route::view('scholarship-exam', 'frontend.scholarship-exam')->name('frontend.scholarship');
Route::view('privacy-policy', 'frontend.privacy-policy')->name('frontend.privacy-policy');
Route::view('terms-and-conditions', 'frontend.terms-and-conditions')->name('frontend.terms-and-conditions');
Route::post('contact-inquiry', 'Frontend\InquiryController@storeContact')->name('frontend.contact-inquiry.store');
Route::post('admission-inquiry', 'Frontend\InquiryController@storeAdmission')->name('frontend.admission-inquiry.store');
Route::post('scholarship-inquiry', 'Frontend\InquiryController@storeScholarship')->name('frontend.scholarship-inquiry.store');
