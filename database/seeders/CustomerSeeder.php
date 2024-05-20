<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'user_id'=>2,
            'name' => 'customer1',
            'email' => 'customer1@customer.com',
            'phone'=> '123456789',
            'company'=> 'company',
        ]);
        Customer::create([
            'user_id'=>2,
            'name' => 'customer2',
            'email' => 'customer2@customer.com',
            'phone'=> '123456789',
            'company'=> 'company',
        ]);
        Customer::create([
            'user_id'=>2,
            'name' => 'customer3',
            'email' => 'customer3@customer.com',
            'phone'=> '123456789',
            'company'=> 'company',
        ]);
    }
}
