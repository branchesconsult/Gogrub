<?php

use Illuminate\Database\Seeder;
use App\Models\Orderstatus\Orderstatus;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('orderstatuses')->truncate();
        \DB::table('orderstatuses')->insert([
            [
                'id' => Orderstatus::ORDER_PENDING,
                'status' => 'Pending',
                'description' => 'Order pending',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => Orderstatus::ORDER_IN_PROGRESS,
                'status' => 'In progress',
                'description' => 'In progress',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ], [
                'id' => Orderstatus::ORDER_DELIVERED,
                'status' => 'delievered',
                'description' => 'delievered',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => Orderstatus::ORDER_CANCELLED,
                'status' => 'Cancelled',
                'description' => 'Cancelled',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
        ]);
    }
}
