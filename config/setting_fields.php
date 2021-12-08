<?php

return [
    [
        'type'  => 'text', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'app_name', // unique name for field
        'label' => 'App Name', // you know what label it is
        'rules' => 'required|min:2|max:50', // validation rule of laravel
        'class' => '', // any class for input
        'value' => 'GKII BPN', // default value if you want
    ],
    [
        'type'  => 'text', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'footer_text', // unique name for field
        'label' => 'Footer Text', // you know what label it is
        'rules' => 'required|min:2', // validation rule of laravel
        'class' => '', // any class for input
        'value' => 'Gereja Kemah Injil Indonesia Daerah Kaltim', // default value if you want
    ],
    [
        'type'  => 'email', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'email', // unique name for field
        'label' => 'Email', // you know what label it is
        'rules' => 'required|email', // validation rule of laravel
        'class' => '', // any class for input
        'value' => 'litbangmedig@gkiibpn.com', // default value if you want
    ],
    [
        'type'  => 'text', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'phone_number', // unique name for field
        'label' => 'Phone Number', // you know what label it is
        'rules' => 'required', // validation rule of laravel
        'class' => '', // any class for input
        'value' => '+6285346147665', // default value if you want
    ],
    [
        'type'  => 'text', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'address', // unique name for field
        'label' => 'Alamat', // you know what label it is
        'rules' => 'required', // validation rule of laravel
        'class' => '', // any class for input
        'value' => 'JL. Kamboja 61 RT 030, Balikpapan, 76121, Gunungsari Ilir, Balikpapan Tengah, Kota Balikpapan City, Kalimantan Timur, 76113', // default value if you want
    ],
    [
        'type'  => 'text', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'facebook_url', // unique name for field
        'label' => 'URL Facebook', // you know what label it is
        'rules' => 'required', // validation rule of laravel
        'class' => '', // any class for input
        'value' => 'https://www.facebook.com/GKIIBalikpapan/', // default value if you want
    ],
    [
        'type'  => 'text', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'youtube_url', // unique name for field
        'label' => 'URL Youtube', // you know what label it is
        'rules' => 'required', // validation rule of laravel
        'class' => '', // any class for input
        'value' => 'https://www.youtube.com/channel/UCSIuuHy8FfMpCVy019eaZBA', // default value if you want
    ],
    [
        'type'  => 'text', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'instagram_url', // unique name for field
        'label' => 'URL Instagram', // you know what label it is
        'rules' => 'required', // validation rule of laravel
        'class' => '', // any class for input
        'value' => 'https://www.instagram.com/gkiibalikpapan/', // default value if you want
    ],
    [
        'type'  => 'text', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'twitter_url', // unique name for field
        'label' => 'URL Twitter', // you know what label it is
        'rules' => 'required', // validation rule of laravel
        'class' => '', // any class for input
        'value' => 'https://twitter.com/kemahinjil', // default value if you want
    ],
    [
        'type'  => 'editor', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'footer_col_1', // unique name for field
        'label' => 'Catatan Kaki (Kolom 1)', // you know what label it is
        'rules' => 'required', // validation rule of laravel
        'class' => '', // any class for input
        'value' => '<div class="inset-right-1 mb-5"><h4 class="font-weight-normal">Office</h4><ul class="list-sm"><li class="object-inline big"><i class="icon icon-md mdi mdi-map-marker text-white">&nbsp;</i> <span>JL. Kamboja 61 RT 030, Gunungsari Ilir, Balikpapan Tengah, Kota Balikpapan, Kalimantan Timur, 76113</span></li><li class="object-inline big"><i class="icon icon-md mdi mdi-phone text-white">&nbsp;</i> <span>+6285346147665</span></li><li class="object-inline big"><i class="icon icon-md mdi mdi-email text-white">&nbsp;</i> <span>litbangmedig@gkiibpn.com</span></li></ul></div><div class="box-1"><h4 class="font-weight-normal mt-4">Account Number</h4><p>BNI<br>No Rek: 6554554557<br>a/n Badan Pengurus Daerah GKII BPP<br>&nbsp;</p></div>', // default value if you want
    ],
    [
        'type'  => 'editor', // input fields type
        'data'  => 'string', // data type, string, int, boolean
        'name'  => 'footer_col_2', // unique name for field
        'label' => 'Catatan Kaki (Kolom 2)', // you know what label it is
        'rules' => 'required', // validation rule of laravel
        'class' => '', // any class for input
        'value' => '<h4 class="font-weight-normal">Follow Us</h4><ul class="list-inline mt-0 mb-5"><li class="object-inline big"><a class="icon icon-md mdi mdi-instagram text-white" style="font-size:3rem;" href="https://www.instagram.com/kemahinjil/">&nbsp;</a></li><li class="object-inline big"><a class="icon icon-md mdi mdi-facebook text-white" style="font-size:3rem;" href="https://www.facebook.com/GKIIBalikpapan/">&nbsp;</a></li><li class="object-inline big"><a class="icon icon-md mdi mdi-youtube-play text-white" style="font-size:3rem;" href="https://www.youtube.com/channel/UCSIuuHy8FfMpCVy019eaZBA">&nbsp;</a></li></ul><h4 class="font-weight-normal">Sekolah Tinggi Teologi</h4><ul class="list-style-typed"><li class="object-inline big"><a class="text-white" href="http://www.sttjaffrayjakarta.ac.id/">STT Jeffray Jakarta</a></li><li class="object-inline big"><a class="text-white" href="http://www.sttjaffray.ac.id/">STT Jeffray Makassar</a></li><li class="object-inline big"><a class="text-white" href="https://sttsimpson.ac.id/">STT Simpson Ungaran</a></li></ul><h4 class="font-weight-normal">Toko Buku</h4><ul class="list-style-typed"><li class="object-inline big"><a class="text-white" href="about:blank">Kalam Hidup</a></li></ul>', // default value if you want
    ],
];
