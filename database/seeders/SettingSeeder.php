<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'name' => 'app_name',
                'val' => 'GKII BPN',
                'type' => 'string'
            ],
            [
                'name' => 'about',
                'val' => 'Gereja Kemah Injil Indonesia Daerah Kaltim',
                'type' => 'string'
            ],
            [
                'name' => 'footer_text',
                'val' => 'Gereja Kemah Injil Indonesia Daerah Kaltim',
                'type' => 'string'
            ],
            [
                'name' => 'email',
                'val' => 'litbangmedig@gkiibpn.com',
                'type' => 'string'
            ],
            [
                'name' => 'facebook_url',
                'val' => 'https://www.facebook.com/GKIIBalikpapan',
                'type' => 'string'
            ],
            [
                'name' => 'twitter_url',
                'val' => 'https://twitter.com/kemahinjil',
                'type' => 'string'
            ],
            [
                'name' => 'instagram_url',
                'val' => 'https://www.instagram.com/gkiibalikpapan/',
                'type' => 'string'
            ],
            [
                'name' => 'youtube_url',
                'val' => 'https://www.youtube.com/channel/UCSIuuHy8FfMpCVy019eaZBA',
                'type' => 'string'
            ],
            [
                'name' => 'address',
                'val' => 'JL. Kamboja 61 RT 030, Balikpapan, 76121, Gunungsari Ilir, Balikpapan Tengah, Kota Balikpapan City, Kalimantan Timur, 76113',
                'type' => 'string'
            ],
            [
                'name' => 'phone_number',
                'val' => '+6285346147665',
                'type' => 'string'
            ],
            [
                'name' => 'footer_col_1',
                'val' => '<div class="inset-right-1 mb-5"><h4 class="font-weight-normal">Office</h4><ul class="list-sm"><li class="object-inline big"><i class="icon icon-md mdi mdi-map-marker text-white">&nbsp;</i> <span>JL. Kamboja 61 RT 030, Gunungsari Ilir, Balikpapan Tengah, Kota Balikpapan, Kalimantan Timur, 76113</span></li><li class="object-inline big"><i class="icon icon-md mdi mdi-phone text-white">&nbsp;</i> <span>+6285346147665;</span></li><li class="object-inline big"><i class="icon icon-md mdi mdi-email text-white">&nbsp;</i> <span>litbangmedig@gkiibpn.com</span></li></ul></div><div class="box-1"><h4 class="font-weight-normal mt-4">Account Number</h4><p>BNI<br>No Rek: 6554554557<br>a/n Badan Pengurus Daerah GKII BPP<br>&nbsp;</p></div>',
                'type' => 'string'
            ],
            [
                'name' => 'footer_col_2',
                'val' => '<h4 class="font-weight-normal">Follow Us</h4><ul class="list-inline"><li class="object-inline big"><a class="icon icon-md mdi mdi-instagram text-white" style="font-size:3rem;" href="https://www.instagram.com/gkiibalikpapan/">&nbsp;</a></li><li class="object-inline big"><a class="icon icon-md mdi mdi-facebook text-white" style="font-size:3rem;" href="https://www.facebook.com/GKIIBalikpapan/">&nbsp;</a></li><li class="object-inline big"><a class="icon icon-md mdi mdi-youtube-play text-white" style="font-size:3rem;" href="https://www.youtube.com/channel/UCSIuuHy8FfMpCVy019eaZBA">&nbsp;</a></li></ul><h4 class="font-weight-normal">Sekolah Tinggi Teologi</h4><ul class="list-style-typed"><li class="object-inline big"><a class="text-white" href="http://www.sttjaffrayjakarta.ac.id/">STT Jeffray Jakarta</a></li><li class="object-inline big"><a class="text-white" href="http://www.sttjaffray.ac.id/">STT Jeffray Makassar</a></li><li class="object-inline big"><a class="text-white" href="https://sttsimpson.ac.id/">STT Simpson Ungaran</a></li></ul><h4 class="font-weight-normal">Toko Buku</h4><ul class="list-style-typed"><li class="object-inline big"><a class="text-white" href="about:blank">Kalam Hidup</a></li></ul>',
                'type' => 'string'
            ],
        ]);
    }
}
