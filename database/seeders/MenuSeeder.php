<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Property;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Home',
                'url' => url('/')
            ],
            [
                'name' => 'About',
                'url' => url('/'),
                'subs' => [
                    [
                        'name' => 'Sejarah GKII Indonesia',
                        'url' => url('/page/history')
                    ],
                    [
                        'name' => 'Sejarah GKII Balikpapan',
                        'url' => url('/page/history-bpp')
                    ],
                    [
                        'name' => 'Injil Empat Berganda',
                        'url' => url('/page/four-double-gospel')
                    ],
                    [
                        'name' => 'Visi Misi',
                        'url' => url('/page/gkii-vision-mission')
                    ],
                    [
                        'name' => 'Pengakuan Iman',
                        'url' => url('/page/faith-confession')
                    ],
                    [
                        'name' => 'Badan Pengurus Pusat',
                        'url' => url('https://kemah-injil.org/badan-pengurus-pusat/')
                    ],
                    [
                        'name' => 'Badan Pengurus Wilayah Kaltim',
                        'url' => url('https://kemah-injil.org/wilayah-kalimantan-timur/')
                    ],
                    [
                        'name' => 'Badan Pengurus Daerah',
                        'url' => url('/page/organization')
                    ],
                ]
            ],
            [
                'name' => 'Article',
                'url' => url('/'),
                'subs' => [
                    [
                        'name' => 'Kegiatan',
                        'url' => url('/category/kegiatan')
                    ],
                    [
                        'name' => 'Ringkasan Khotbah',
                        'url' => url('/category/ringkasan-khotbah')
                    ],
                ]
            ],
            [
                'name' => 'Location',
                'url' => url('/location')
            ],
            [
                'name' => 'Donation',
                'url' => url('/page/giving')
            ],
            [
                'name' => 'Contact',
                'url' => url('/contact')
            ],
        ];

        foreach($menus as $key => $menu) {
            DB::table('menus')->insert([
                'name' => $menu['name'],
                'url' => $menu['url']
            ]);

            if(isset($menu['subs'])) {
                foreach($menu['subs'] as $submenu) {
                    DB::table('menu_items')->insert([
                        'menu_id' => $key + 1,
                        'name' => $submenu['name'],
                        'url' => $submenu['url']
                    ]);
                }
            }
        }
    }
}
