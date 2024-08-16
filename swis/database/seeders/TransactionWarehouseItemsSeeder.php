<?php

namespace Database\Seeders;

use App\Models\TransactionWarehouseItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionWarehouseItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransactionWarehouseItem::factory()->count(15)->create();

    }
}
