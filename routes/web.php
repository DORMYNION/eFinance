<?php

Route::redirect('/', '/login');
// Route::redirect('/', '/agreement');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();
Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Customers
    Route::delete('customers/destroy', 'CustomersController@massDestroy')->name('customers.massDestroy');
    Route::post('customers/media', 'CustomersController@storeMedia')->name('customers.storeMedia');
    Route::post('customers/ckmedia', 'CustomersController@storeCKEditorImages')->name('customers.storeCKEditorImages');
    Route::resource('customers', 'CustomersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Customer Documents
    Route::delete('customer-documents/destroy', 'CustomerDocumentController@massDestroy')->name('customer-documents.massDestroy');
    Route::post('customer-documents/media', 'CustomerDocumentController@storeMedia')->name('customer-documents.storeMedia');
    Route::post('customer-documents/ckmedia', 'CustomerDocumentController@storeCKEditorImages')->name('customer-documents.storeCKEditorImages');
    Route::resource('customer-documents', 'CustomerDocumentController');

    // Customer Notes
    Route::delete('customer-notes/destroy', 'CustomerNotesController@massDestroy')->name('customer-notes.massDestroy');
    Route::resource('customer-notes', 'CustomerNotesController');

    // Loans
    Route::delete('loans/destroy', 'LoanController@massDestroy')->name('loans.massDestroy');
    Route::patch('loans/{id}/decline', 'LoanController@decline')->name('loans.decline');
    Route::resource('loans', 'LoanController');

    // Loan Amounts
    Route::delete('loan-amounts/destroy', 'LoanAmountController@massDestroy')->name('loan-amounts.massDestroy');
    Route::resource('loan-amounts', 'LoanAmountController');

    // Payments
    Route::delete('payments/destroy', 'PaymentController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});

Route::get('agreement', 'ApplyController@agreement')->name('agreement');
// Route::post('apply', 'ApplyController@apply')->name('apply');
Route::get('apply', 'ApplyController@apply')->name('apply');
Route::post('apply', 'ApplyController@apply')->name('apply.store');