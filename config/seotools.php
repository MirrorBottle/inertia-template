<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => 'GKII Balikpapan', // set false to total remove
            'titleBefore'  => 'Home', // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Gereja Kemah Injil Indonesia Daerah Kota Balikpapan, Kalimantan Timur', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['gkii', 'gkii bpn', 'gkii balikpapan', 'kemah injil'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'GKII Balikpapan', // set false to total remove
            'description' => 'Gereja Kemah Injil Indonesia Daerah Kota Balikpapan, Kalimantan Timur', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => 'GKII BPN',
            'images'      => ['/images/logo-gkii-white.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'GKII Balikpapan!', // set false to total remove
            'description' => 'Gereja Kemah Injil Indonesia Daerah Kota Balikpapan, Kalimantan Timur', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['/images/logo-gkii-white.png'],
        ],
    ],
];
