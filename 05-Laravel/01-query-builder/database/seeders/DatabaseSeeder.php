<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Task "1. Inserta al menos 5 registros en las tablas de usuarios y pedidos."

        // Name - Email - Phone Number
        User::factory(15)->create();

        // Product - Quantity - Total - User ID
        Order::factory(25)->create();
    }
}
