<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["role_id" => 1, "resource_id" => 1, "permission" => true],
            ["role_id" => 1, "resource_id" => 2, "permission" => true],
            ["role_id" => 1, "resource_id" => 3, "permission" => true],
            ["role_id" => 1, "resource_id" => 4, "permission" => true],
            ["role_id" => 1, "resource_id" => 5, "permission" => true],
            ["role_id" => 1, "resource_id" => 6, "permission" => true],
            ["role_id" => 1, "resource_id" => 7, "permission" => true],
            ["role_id" => 1, "resource_id" => 8, "permission" => true],
            ["role_id" => 1, "resource_id" => 9, "permission" => true],
            ["role_id" => 1, "resource_id" => 10, "permission" => true],

            ["role_id" => 2, "resource_id" => 1, "permission" => true],
            ["role_id" => 2, "resource_id" => 2, "permission" => false],
            ["role_id" => 2, "resource_id" => 3, "permission" => true],
            ["role_id" => 2, "resource_id" => 4, "permission" => false],
            ["role_id" => 2, "resource_id" => 5, "permission" => false],
            ["role_id" => 2, "resource_id" => 6, "permission" => true],
            ["role_id" => 2, "resource_id" => 7, "permission" => false],
            ["role_id" => 2, "resource_id" => 8, "permission" => true],
            ["role_id" => 2, "resource_id" => 9, "permission" => false],
            ["role_id" => 2, "resource_id" => 10, "permission" => false],
        ];

        DB::table('permissions')->insert($data);
    }
}
