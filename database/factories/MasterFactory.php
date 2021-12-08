<?php

namespace Database\Factories;

use App\Models\Master;
use Illuminate\Database\Eloquent\Factories\Factory;

class MasterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Master::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = [
            [
                'type' => 'logo',
                'content' => [
                    'logo_mini' => 'logo-gkii-dkb.png',
                    'logo_default' => 'logo-gkii-dkb-small.png'
                ]
            ],
            [
                'type' => 'galeri',
                'content' => [
                    'farite-slider-1.jpg',
                    'farite-slider-2.jpg',
                    'farite-slider-3.jpg'
                ]
            ],
            [
                'type' => 'greeting',
                'content' => [
                    'video' => 'KONWILDA.mp4',
                    'title' => 'SELAMAT MELAKSANAKAN KONWIL & KONDA',
                    'href' => null
                ]
            ],
            [
                'type' => 'committee',
                'content' => [
                    [
                        'name' => 'Pdt. Mika Singal M.Th.',
                        'position' => 'Ketua Daerah',
                        'image' => 'pengurus-1.jpeg'
                    ],
                    [
                        'name' => 'Pdt. Timotius Ujang M.Th.',
                        'position' => 'Sekretaris Daerah',
                        'image' => 'pengurus-2.jpeg'
                    ],
                    [
                        'name' => 'Orthina Wisnu',
                        'position' => 'Bendahara Daerah',
                        'image' => 'pengurus-3.jpeg'
                    ]
                ]
            ]
        ];

        foreach($types as $type) {
            return [
                'type' => $type['type'],
                'content' => json_encode($type['content']),
            ];
        }
    }
}
