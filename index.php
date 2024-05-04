<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use\Hcode\DB\sql//Page;

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page();

	$sql = new Hcode\DB\sql();

	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);

	//$page->setTpl("index");
        
});

$app->run();

 ?>