<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ["nome" => "task.index"],
            ["nome" => "task.create"],
            ["nome" => "task.show"],
            ["nome" => "task.edit"],
            ["nome" => "task.destroy"],


            ["nome" => "project.index"],
            ["nome" => "project.create"],
            ["nome" => "project.show"],
            ["nome" => "project.edit"],
            ["nome" => "project.destroy"],
        ];
        DB::table('resources')->insert($data);
    }
}
