<?php

// use Illuminate\Http\Request;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
* 2. Recupera todos los pedidos asociados al usuario con ID 2.
* Go: http://localhost:8000/api/v1/user/orders/2
*/

Route::get('/v1/user/orders/{userId}', [OrderController::class, 'getOrdersByUserId']);

/**
 * 3. Obtén la información detallada de los pedidos, incluyendo el nombre y correo electrónico de los usuarios.
 * Go: http://localhost:8000/api/v1/orders
 * MIXONGO 
 * 4. Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
 * Go: http://localhost:8000/api/v1/orders?min=100&max=250
 */
Route::get('/v1/orders', [OrderController::class, 'allOrders']);
// Route::get('/v1/orders', [OrderController::class, 'getOrdersByTotalRange']); Eliminado y mejorado all orders.

/*
 * 5. Encuentra todos los usuarios cuyos nombres comiencen con la letra "R".
 * Go: http://localhost:8000/api/v1/users?startWith=R
 */
// Route::get('/v1/users/{letter}', [UserController::class, 'getUsersByFirstLetter']); // Eliminado y mejorado all orders.
Route::get('/v1/users', [UserController::class, 'getUsers']);

/**
 * 6. Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
 * Go: http://localhost:8000/api/v1/user/orders-count/5
 */
Route::get('/v1/user/orders-count/{userId}', [OrderController::class, 'getOrdersCountByUserId']);

/**
 * 7. Ordena los pedidos por el campo total de manera ascendente o descendente. REUTILIZADO
 * Go: http://localhost:8000/api/v1/orders?sortByTotal=asc
 */

/**
 * 8. Obtén la suma total del campo "total" en la tabla de pedidos.
 * Go: http://localhost:8000/api/v1/orders/total
 */
Route::get('/v1/orders/total', [OrderController::class, 'getTotalProfits']);

/**
 * 9. Encuentra el pedido más económico, junto con el nombre del usuario asociado.
 * Go: http://localhost:8000/api/v1/orders/most-cheap
 */
Route::get('/v1/orders/most-cheap', [OrderController::class, 'getMostCheapOrder']);

/**
 * 10. Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.
 * Go: http://localhost:8000/api/v1/orders/by-user-in-group/1
 */
Route::get('/v1/orders/by-user-in-group/{userId}', [OrderController::class, 'getOrdersByUserInGroup']);
