<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    // 2. Recupera todos los pedidos asociados al usuario con ID 2.
    public function getOrdersByUserId($userId)
    {
        $validator = Validator::make(['userId' => $userId], ['userId' => 'required|integer|exists:users,id']);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $orders = Order::where('user_id', $userId)->get();
        return response()->json(
            [
                'message' => 'Orders by user ID',
                'orders' => $orders,
            ]
        );
    }

    // 03. Obtén la información detallada de los pedidos, incluyendo el nombre y correo electrónico de los usuarios.
    public function allOrders(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'min' => 'nullable|numeric',
            'max' => 'nullable|numeric|gt:min',
            'sortByTotal' => 'nullable|string|in:asc,desc',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }
        $max = $request->query('max');
        $min = $request->query('min');
        $sortByTotal = $request->query('sortByTotal');

        $orders = Order::select('u.name as user_name', 'u.email as user_email', 'u.phone_number as user_phone_number', 'orders.*',)
            ->join('users as u', 'u.id', 'orders.user_id');

        // 04. Recupera todos los pedidos cuyo total esté en el rango de $100 a $250.
        if (!is_null($min) && !is_null($max)) {
            $orders->whereBetween('total', [$min, $max]);
        }

        // 05. Ordena los pedidos por el campo total de manera ascendente o descendente.
        if ($sortByTotal) {
            $orders->orderBy('total', $sortByTotal);
        }

        $orders = $orders->get();
        return response()->json(
            [
                'message' => $min && $max ? 'Orders by total range' : 'All orders',
                'orders' => $orders,
            ]
        );
    }

    // 06. Calcula el total de registros en la tabla de pedidos para el usuario con ID 5.
    public function getOrdersCountByUserId($userId)
    {
        $validator = Validator::make(['userId' => $userId], ['userId' => 'required|integer|exists:users,id']);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        $orders = Order::where('user_id', $userId)->count();
        return response()->json(
            [
                'message' => 'Orders count by user ID',
                'orders' => $orders,
            ]
        );
    }

    // 08. Obtén la suma total del campo "total" en la tabla de pedidos.

    public function getTotalProfits()
    {
        $orders = Order::sum('total');
        return response()->json(
            [
                'message' => 'Total profits',
                'orders' => number_format($orders, 2, '.'),
            ]
        );
    }

    // 9. Encuentra el pedido más económico, junto con el nombre del usuario asociado.
    public function getMostCheapOrder()
    {
        $orders = Order::select('orders.*', 'u.name as user_name', 'u.email as user_email')
            ->join('users as u', 'u.id', 'orders.user_id')
            ->orderBy('total', 'asc')
            ->first();

        if (!$orders) {
            return response()->json(['message' => 'No orders found'], 404);
        }

        return response()->json(
            [
                'message' => 'Most cheap order',
                'orders' => $orders,
            ]
        );
    }

    // 10. Obtén el producto, la cantidad y el total de cada pedido, agrupándolos por usuario.

    public function getOrdersByUserInGroup()
    {
        $orders = Order::select('u.name as user_name', 'u.email as user_email', 'u.phone_number as user_phone_number', 'orders.*')
            ->join('users as u', 'u.id', '=', 'orders.user_id')
            ->get();

        // Agrupar las órdenes por usuario
        $groupedOrders = $orders->groupBy('user_id')->map(function ($userOrders) {
            $user = $userOrders->first();
            return [
                'user' => [
                    'name' => $user->user_name,
                    'email' => $user->user_email,
                    'phone_number' => $user->user_phone_number,
                ],
                'orders' => $userOrders->map(function ($order) {
                    return [
                        'id' => $order->id,
                        'product' => $order->product,
                        'quantity' => $order->quantity,
                        'total' => $order->total,
                    ];
                }),
            ];
        });

        return response()->json([
            'message' => 'Orders grouped by user',
            'data' => $groupedOrders->values(),
        ]);
    }
}
