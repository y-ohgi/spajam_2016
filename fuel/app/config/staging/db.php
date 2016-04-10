<?php
/**
 * The staging database settings. These get merged with the global settings.
 */


$dbConfigPattern = '/mysql:\/\/(?:([^:^@]+)(?::([^@]+))?@)?([^:^\/]+)(?::(\d+))?\/([^?]+)/';
if (preg_match($dbConfigPattern, $_SERVER["CLEARDB_DATABASE_URL"], $matches)) {
    list($dbConfig, $dbuser, $dbpass, $dbhost, $dbport, $dbname) = $matches;

    return array(
        'default' => array(
            'connection'  => array(
                'dsn'        => 'mysql:host='.$dbhost.';dbname='.$dbname,
                'username'   => $dbuser,
                'password'   => $dbpass,
            ),
        ),
    );
}

/* return array( */
/* 	'default' => array( */
/* 		'connection'  => array( */
/* 			'dsn'        => 'mysql:host=localhost;dbname=fuel_staging', */
/* 			'username'   => 'fuel_app', */
/* 			'password'   => 'super_secret_password', */
/* 		), */
/* 	), */
/* ); */
