<?php
return array(
	'_root_'  => 'welcome/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route
	
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

    'guides/:id' => 'guides/index',
    'guides/:id/(:any)' => 'guides/$2/$1',
    'requests/:id' => 'requests/index',
);
