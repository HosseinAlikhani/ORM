<?php 
require_once('./../vendor/autoload.php');

use App\Core\ORMCore;

$class = new ORMCore();

$class->connection('localhost', "hacker", 'root', '')
	->table("users")
	->insert([
		'firstname'	=>	'hossein',
		'lastname'	=>	'alikhani',
		'email'	=>	'hossein.alikhani@gmail.com'
	])
	// ->get()
	;