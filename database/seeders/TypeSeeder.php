<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["html", "css", "bootstrasp", "js", "vite", "vue", "php", "mysql", "laravel"];

        foreach ($data as $name){
            $newType = new Type();
            $newType->name = $name;
            $newType->save();

        }
    }
}