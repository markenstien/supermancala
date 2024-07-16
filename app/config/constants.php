<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    define('DEFAULT_REPLY_TO' , '');

    const MAILER_AUTH = [
        'username' => 'main@medicad.store',
        'password' => 'tmKcD#t3o@Y@',
        'host'     => 'medicad.store',
        'name'     => 'Medicad',
        'replyTo'  => 'main@medicad.store',
        'replyToName' => 'Medicad'
    ];



    const ITEXMO = [
        'key' => '',
        'pwd' => ''
    ];

	#################################################
	##             SYSTEM CONFIG                ##
    #################################################


    define('GLOBALS' , APPROOT.DS.'classes/globals');

    define('SITE_NAME' , 'supermancala');

    define('COMPANY_NAME' , 'supermancala');

    define('COMPANY_NAME_ABBR', 'supermancala');
    define('COMPANY_EMAIL', 'info@supermancala.fun');
    define('COMPANY_TEL', '+639260617765');
    define('COMPANY_ADDRESS', '');

    

    define('KEY_WORDS' , 'Medicad,Ordering System');


    define('DESCRIPTION' , '#############');

    define('AUTHOR' , 'Cadaceous Medical System');


    define('APP_KEY' , 'Medicad-5175140471');
    

    const GAMES = [
        [
            'id' => '1',
            'code'=> 'tetris',
            'title' => 'World Tetris',
            'description' => 'Tetris is a puzzle video game created in 1985 by Alexey Pajitnov,
                 a Soviet software engineer. It has been published by several companies on more than 65 platforms,
                  setting a Guinness world record for the most ported game',
            'path' => 'tetris/game.php',
            'wallpaper' => '',
            'profile_icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIrZsLtNlwL7KXGY6lMPS8IJtyf-r2e01Pbw&s'
        ],

        [
            'id' => '2',
            'code'=> 'horse racing',
            'title' => 'Horse Racing',
            'description' => 'Tetris is a puzzle video game created in 1985 by Alexey Pajitnov,
                 a Soviet software engineer. It has been published by several companies on more than 65 platforms,
                  setting a Guinness world record for the most ported game',
            'path' => 'horsegame/game.php',
            'wallpaper' => '',
            'profile_icon' => 'https://static.keygames.com/2/112462/90340/1024x1024/horse-racing-online.webp'
        ],

        [
            'id' => '3',
            'code'=> 'lucky9',
            'title' => 'Lucky 9',
            'description' => 'Tetris is a puzzle video game created in 1985 by Alexey Pajitnov,
                 a Soviet software engineer. It has been published by several companies on more than 65 platforms,
                  setting a Guinness world record for the most ported game',
            'path' => 'lucky9/game.php',
            'wallpaper' => '',
            'profile_icon' => 'https://play-lh.googleusercontent.com/nNwUkwaAiyYKMcTAw6-i7Il9j0Xijzw2LQwvUfUDzf1msPxAeJ_f3_YoWOHxO3y4CA'
        ]
    ];
?>