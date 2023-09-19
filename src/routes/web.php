<?php

Route::middleware([
    'api',
    'auth:sanctum',
    function_exists('tenancy') ? \Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain::class : null,
    function_exists('tenancy') ?PreventAccessFromCentralDomains::class : null,
])->group(function () {

    Route::prefix('api')->name('api.')->group(function() {
        Route::get('users/role/{role}', \ReesMcIvor\Staff\Http\Controllers\Api\TeamController::class)->name('users.role');
    });
});