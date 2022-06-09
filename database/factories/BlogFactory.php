<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SiteUser;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title=$this->faker->paragraph(1);
        $slug=Str::slug($title);
        return [
            'title'=>$title,
            'slug'=>$slug,
            'user_id'=>SiteUser::get()->random()->id,
            'body'=>$this->faker->paragraph(20),
            'image'=>$this->faker->image('public/images',640,480,null,false)
            //
        ];
    }
}
