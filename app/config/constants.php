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
    
?>