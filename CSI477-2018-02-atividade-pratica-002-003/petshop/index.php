<?php 

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Ecom\Page;
use \Ecom\PageAdmin;
use \Ecom\Model\User;
use \Ecom\Model\Produto;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

	$produtos = Produto::listAll();
    
	$page = new Page();

	$page->setTpl("index", [

		'produtos'=>$produtos

	]);

});

$app->get('/admin', function() {

	User::verifyLogin();
    
	$page = new PageAdmin();

	$page->setTpl("index");

});

$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
		"header" => false,
		"footer" => false,
	]);

	$page->setTpl("login");

});

$app->post('/admin/login', function() {
    
	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;

});

$app->get('/admin/logout', function(){

	User::logout();

	header("Location: /admin/login");
	exit;

});


$app->get("/admin/users", function(){

	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$users
	));

});

$app->get("/admin/users/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

});

$app->get("/admin/users/:id/delete", function ($id){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$id);

	$user->delete();

	header("Location: /admin/users");
	exit;

});

$app->get("/admin/users/:id", function($id){

	User::verifyLogin();

	$user = new User();

	$user->get((int)$id);

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
		"user"=>$user->getValues()

	));

});

$app->post("/admin/users/create", function (){

	User::verifyLogin();

	$user = new User();

	$_POST["type"] = (isset($_POST["type"]))?2:1;

	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");
	exit;

});

$app->post("/admin/users/:id", function ($id){

	User::verifyLogin();

	$user = new User();

	$_POST["type"] = (isset($_POST["type"]))?2:1;

	$user->get((int)$id);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/users");
	exit;

});


$app->get("/admin/produtos", function(){

	User::verifyLogin();

	$produtos = Produto::listAll();

	$page = new PageAdmin();

	$page->setTpl("produtos", [
		"produtos"=>$produtos
	]);

});


$app->get("/admin/produtos/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("produtos-create");

});

$app->post("/admin/produtos/create", function(){

	User::verifyLogin();

	$produto = new Produto();

	$produto->setData($_POST);

	$produto->save();

	header("Location: /admin/produtos");
	exit;

});

$app->get("/admin/produtos/:id", function($id){

	User::verifyLogin();

	$produto = new Produto();

	$produto->get((int)$id);

	$page = new PageAdmin();

	$page->setTpl("produtos-update", [
		'produto'=>$produto->getValues()
	]);

});

$app->post("/admin/produtos/:id", function($id){

	User::verifyLogin();

	$produto = new Produto();

	$produto->get((int)$id);

	$produto->setData($_POST);

	$produto->save();

	$produto->setPhoto($_FILES["file"]);

	header('Location: /admin/produtos');
	exit;

});

$app->get("/admin/produtos/delete", function($id){

	User::verifyLogin();

	$produto = new Produto();

	$produto->get((int)$id);

	$produto->delete();

	header('Loction: /admin/produtos');
	exit;

});


$app->run();



 ?>