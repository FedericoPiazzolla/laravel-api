<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;

class typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['frontend', 'backend', 'desing', 'fullstack', 'AI tools', 'saas'];

        foreach($types as $type) {
            $newType = new Type;
            $newType->name = $type;
            $newType->slug = Str::slug($type);
            $newType->save();

        }
    }
}
