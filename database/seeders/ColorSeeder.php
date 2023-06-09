<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = config('dataseeder.colors');
        foreach($colors as $color)
        {
            $newColor = new Color();
            $newColor->colorName = $color['colour_name'];
            $newColor->hexValue = $color['hex_value'];
            $newColor->save();
        }
    }
}
