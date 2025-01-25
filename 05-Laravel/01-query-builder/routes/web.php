<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(
        [
            'message' => 'Query Builder practice, you can start by discovering all orders.',
            'redirect' => 'http://localhost:8000/api/v1/orders',
        ]
    );
});
