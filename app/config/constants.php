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
            'id' => '2',
            'code'=> 'tetris',
            'title' => 'Tetris',
            'description' => "There are seven shapes composed of four blocks each, and they fall 
            into the space one at a time at a fixed speed. The player's goal is 
            to rotate the shapes as they fall to complete solid rows without gaps.",
            'path' => 'tetris/game.php',
            'wallpaper' => '',
            'profile_icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIrZsLtNlwL7KXGY6lMPS8IJtyf-r2e01Pbw&s'
        ],

        [
            'id' => '1',
            'code'=> 'horseracing',
            'title' => 'Horse Racing',
            'description' => "sport of running horses at speed, mainly Thoroughbreds with a rider astride or 
            Standardbreds with the horse pulling a conveyance with a drive",
            'wallpaper' => '',
            'profile_icon' => 'https://static.keygames.com/2/112462/90340/1024x1024/horse-racing-online.webp'
        ],

        [
            'id' => '3',
            'code'=> 'lucky9',
            'title' => 'Lucky9',
            'description' => "The object of the game is to beat the dealer with a higher valued hand as close to 9 as possible. Tens and face cards are worth 0 points, 
            aces are worth 1 point, and 2-9 are scored at face value.",
            'path' => 'lucky9/game.php',
            'wallpaper' => '',
            'profile_icon' => 'https://play-lh.googleusercontent.com/nNwUkwaAiyYKMcTAw6-i7Il9j0Xijzw2LQwvUfUDzf1msPxAeJ_f3_YoWOHxO3y4CA'
        ],

        [
            'id' => '4',
            'code'=> 'Mancala',
            'title' => 'Sungka',
            'description' => " The game is typically played on a long, wooden board that has 9 holes. Each player has seven smaller holes (houses) in front of him and two large holes (head) at each end of the board",
            'path' => 'sungka/game.php',
            'wallpaper' => '',
            'profile_icon' => 'https://live.staticflickr.com/3755/13123111064_e4987c46fc_b.jpg'
        ],

        [
            'id' => '5',
            'code'=> 'hoops',
            'title' => 'Basketball',
            'description' => "Play the Best Online Basketball Games for Free",
            'path' => 'hoops/game.php',
            'wallpaper' => '',
            'profile_icon' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgyZ9IEMcFZtEBtvlw1yuVQto2pIXVOqY_ow&s'
        ],

        [
            'id' => '6',
            'code'=> 'snake',
            'title' => 'Snake',
            'description' => "Snake is a genre of action video games where the player maneuvers the end of a growing line, often themed as a snake. 
            The player must keep the snake from colliding with both other obstacles and itself, which gets harder as the snake lengthens.",
            'path' => 'snake/game.php',
            'wallpaper' => '',
            'profile_icon' => 'https://i.pinimg.com/736x/ab/b6/4b/abb64b57fe2a21ea678cd5602d4b6b98.jpg'
        ],
    ];
?>