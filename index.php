<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once(__DIR__ . "/vendor/autoload.php");
$Router = new AltoRouter();

$Router->map("GET", "/", function () {
  require(__DIR__ . "/views/home/login.php");
});
$Router->map("GET", "/home", function () {
  require(__DIR__ . "/views/home/index.php");
});
$Router->map("GET", "/info", function () {
  require(__DIR__ . "/views/home/info.php");
});
$Router->map("GET", "/error", function () {
  require(__DIR__ . "/views/home/error.php");
});
$Router->map("GET", "/login", function () {
  require(__DIR__ . "/views/home/login.php");
});
$Router->map("GET", "/register", function () {
  require(__DIR__ . "/views/home/register.php");
});
$Router->map("GET", "/forgot", function () {
  require(__DIR__ . "/views/home/forgot.php");
});
$Router->map("GET", "/logout", function () {
  require(__DIR__ . "/views/home/logout.php");
});
$Router->map("POST", "/authorize/[**:params]", function ($params) {
  require __DIR__ . "/views/home/action.php";
});

$Router->map("GET", "/setting", function () {
  require(__DIR__ . "/views/setting/index.php");
});
$Router->map("POST", "/setting/[**:params]", function ($params) {
  require __DIR__ . "/views/setting/action.php";
});

$Router->map("GET", "/user/profile", function () {
  require(__DIR__ . "/views/user/profile.php");
});
$Router->map("GET", "/users", function () {
  require(__DIR__ . "/views/user/index.php");
});
$Router->map("POST", "/users/data", function () {
  require(__DIR__ . "/views/user/data.php");
});
$Router->map("GET", "/users/create", function () {
  require(__DIR__ . "/views/user/create.php");
});
$Router->map("POST", "/user/[**:params]", function ($params) {
  require __DIR__ . "/views/user/action.php";
});

$match = $Router->match();

if (is_array($match) && is_callable($match['target'])) {
  call_user_func_array($match['target'], $match['params']);
} else {
  header("HTTP/1.1 404 Not Found");
  require __DIR__ . "/views/home/error.php";
}
