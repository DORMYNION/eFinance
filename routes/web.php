<?php

Route::redirect('/', '/login');

Route::get('/home', function () {
    $user = auth()->user();

    if ($user->hasRole('Admin')) {
        if (session('status')) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }
        return redirect()->route('admin.home');
    } else {
        return redirect()->route('user.home');
    }
});

Auth::routes();
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'can:staff']], function () {
    Route::get('/', 'DashboardController@index')->name('home');
    
    // Users only index and show
    Route::resource('users', 'UsersController');

    Route::resource('staffs', 'StaffsController');

    // Users only update
    Route::resource('documents', 'DocumentsController'); 

    // Loans
    Route::delete('loans/destroy', 'LoanController@massDestroy')->name('loans.massDestroy');
    Route::patch('loans/{id}/flag', 'LoanController@flag')->name('loans.flag');
    Route::patch('loans/{id}/decline', 'LoanController@decline')->name('loans.decline');
    Route::patch('loans/{id}/disburse', 'LoanController@disburse')->name('loans.disburse');
    Route::resource('loans', 'LoanController');

    // Loan Amounts
    Route::delete('loan-amounts/destroy', 'LoanAmountController@massDestroy')->name('loan-amounts.massDestroy');
    Route::resource('loan-amounts', 'LoanAmountController');

    // Payments
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');
 

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});

// User Route
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth', 'can:user', 'check.document']], function () {
    Route::get('/', 'LoanController@index')->name('home'); 

     // Loans
     Route::get('loan', 'LoanController@index')->name('loan');
     Route::post('loan/{id}', 'LoanController@update')->name('loan.update');
     Route::post('loan/', 'LoanController@store')->name('loan.store');
     Route::delete('loan/', 'LoanController@delete')->name('loan.delete');

      // Payments
    Route::get('payment', 'PaymentController@index')->name('payment');
    Route::post('payment/pay', 'PaymentController@redirectToGateway')->name('payment.pay');
    // Route::post('payment/plan', 'PaymentController@createPlan')->name('payment.plan');
    // Route::post('payment/customer', 'PaymentController@createCustomer')->name('payment.customer');
    // Route::post('payment/subscription', 'PaymentController@createSubscription')->name('payment.subscription');
    Route::get('payment/callback', 'PaymentController@handleGatewayCallback'); 

    // Notifications
    Route::get('markAsRead', function() {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markAll');
    
    // Documents
    Route::get('document', 'DocumentController@index')->name('document');
    Route::post('document/media', 'DocumentController@storeMedia')->name('document.storeMedia');
    Route::post('document/store', 'DocumentController@store')->name('document.store');
    Route::delete('document/', 'DocumentController@delete')->name('document.delete');
    Route::post('document/ckmedia', 'DocumentController@storeCKEditorImages')->name('document.storeCKEditorImages');

    // Account Settings
    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile/email', 'ProfileController@email')->name('profile.email');
    Route::post('profile/media', 'ProfileController@storeMedia')->name('profile.storeMedia');
    Route::post('profile/ckmedia', 'ProfileController@storeCKEditorImages')->name('profile.storeCKEditorImages');
    Route::post('profile/picture', 'ProfileController@picture')->name('profile.picture');
    Route::post('profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/update', 'ProfileController@update')->name('profile.update');
    Route::post('profile/addPaymentMethod', 'ProfileController@addPaymentMethod')->name('profile.addPaymentMethod');
 });