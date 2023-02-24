<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
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
            'price' => rand(200,100),
            'picture' => $this->getImage(rand(1,4)),
            'description' => $this->faker->paragraph(),
            'cafe_id' => rand(1,3),
            'kitchen_id' => rand(1,3)
        ];
    }

    public function getImage(int $image_number)
    {
        $path = storage_path() . "/seed_pictures/foods/" . $image_number . ".jpg";
        $image_name = md5($path) . ".jpg";
        $resize = Image::make($path)->fit(300)->encode('jpg');
        Storage::disk('public')->put('pictures/foods/' . $image_name, $resize->__toString());
        return 'pictures/foods/' . $image_name;
    }
}
