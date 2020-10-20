<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\MessageTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MessageTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MessageTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'message_id'=>Message::all()->random()->id,
            'tag_id'=>Tag::all()->random()->id,
            'created_at'=>now(),
            'updated_at'=>now(),
        ];
    }
}
