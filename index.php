<?php
session_start();

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials:true");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

require_once(__DIR__."/vendor/autoload.php");

$dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once("./autoload.php");
require_once("./helpers/parameters.php");
require_once("./configs/db.php");
require_once("./router/route.php");
require_once("./router/api.php");
require_once("./router/errorNavigate.php");
require_once("./helpers/utils.php");
require_once("./helpers/vali.php");


Route::controller(homeController::class)->group(function(){
    Route::get("","viewIndex");
    Route::get("login","viewLogin");
    Route::get("auth","viewAuth");

    Route::post("post/login","login");
    Route::post("post/auth","authLogin");
});

Api::controller(apiController::class)->group(function(){
    Api::combo(["get","put"],"user/:id","index");
    //Api::get("user/:id","index");
    Api::post("user","index");
    //Api::put("user/:id","index");
    Api::delete("user/:id","index");
});

ErrorNavigate::error();
?>