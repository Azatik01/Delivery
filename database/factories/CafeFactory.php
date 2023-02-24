<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cafe>
 */
class CafeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'picture' => $this->getImage(rand(1, 4)),
            'category_id' => rand(1, 3)
        ];
    }

    public function getImage(int $image_number)
    {
        $path = storage_path() . "/seed_pictures/cafes/" . $image_number . ".jpg";
        $image_name = md5($path) . ".jpg";
        $resize = Image::make($path)->fit(300)->encode('jpg');
        Storage::disk('public')->put('pictures/cafes/' . $image_name, $resize->__toString());
        return 'pictures/cafes/' . $image_name;
    }

}
