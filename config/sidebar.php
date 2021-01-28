<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
	*/
	
	
  'menu' => [[
		'icon' => 'fab fa-simplybuilt',
		'title' => 'Meus Produtos',
		'badge' => '10',
		'url' => '/myproducts',
		'route-name' => 'myproducts'
	],[
		'icon' => 'fa fa-list-ol',
		'title' => 'My GAds',
		'url' => '/mygads'
	],[
		'icon' => 'fa fa-star',
		'title' => 'Nome Unico',
		'url' => '/nomeunico',
	],[
		'icon' => 'fa fa-envelope',
		'title' => 'Favoritos',
		'url' => '/favoritos',

	],[
		'navheader' => True,
		'title'     => 'Networks'
	],[
		'icon' => 'fa fa-th-large',
		'title' => 'HotMart',
		'badge' => '80',
		'url' => '/hotmart'
	
	],[
		'icon' => 'fa fa-hdd',
		'title' => 'Clickbank',
		'url' => '/clickbank',
		'badge' => '10',
	]]
];
