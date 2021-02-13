<?php 

// required once autoload of composer 
require_once('./../../vendor/autoload.php');


// use application kernel
new App\Vendor\Application\Kernel();


// $class = new ORMCore();

// $class->connection('localhost', "hacker", 'root', '')
// 	->table("users")
// 	->insert([
// 		'firstname'	=>	'hossein',
// 		'lastname'	=>	'alikhani',
// 		'email'	=>	'hossein.alikhani@gmail.com'
// 	])
// 	// ->get()
// 	;