<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Texture;
use Illuminate\Support\Str;

class TextureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $textures = config('dataseeder.textures');

        foreach($textures as $texture){
            $newTexture = new Texture();
            $newTexture->name = $texture;
            $newTexture->slug = Str::slug($texture, '-');
            $newTexture->save();

        }

        
    }
}
