<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Customers
    Route::post('customers/media', 'CustomersApiController@storeMedia')->name('customers.storeMedia');
    Route::apiResource('customers', 'CustomersApiController');

    // Customer Documents
    Route::post('customer-documents/media', 'CustomerDocumentApiController@storeMedia')->name('customer-documents.storeMedia');
    Route::apiResource('customer-documents', 'CustomerDocumentApiController');

    // Customer Notes
    Route::apiResource('customer-notes', 'CustomerNotesApiController');

    // Loans
    Route::apiResource('loans', 'LoanApiController');

    // Loan Amounts
    Route::apiResource('loan-amounts', 'LoanAmountApiController');

    // Payments
    Route::apiResource('payments', 'PaymentApiController');
});
