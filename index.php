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

############################################################
$Router->map("GET", "/setting", function () {
  require(__DIR__ . "/views/setting/index.php");
});
$Router->map("POST", "/setting/[**:params]", function ($params) {
  require __DIR__ . "/views/setting/action.php";
});

############################################################
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
$Router->map("GET", "/users/view/[**:params]", function ($params) {
  require __DIR__ . "/views/user/view.php";
});
$Router->map("POST", "/user/[**:params]", function ($params) {
  require __DIR__ . "/views/user/action.php";
});
$Router->map("GET", "/user/[**:params]", function ($params) {
  require __DIR__ . "/views/user/action.php";
});

############################################################
$Router->map("GET", "/helpdesk", function () {
  require(__DIR__ . "/views/helpdesk/views/home/index.php");
});
$Router->map("GET", "/helpdesk/manage", function () {
  require(__DIR__ . "/views/helpdesk/views/home/manage.php");
});
$Router->map("GET", "/helpdesk/create", function () {
  require(__DIR__ . "/views/helpdesk/views/home/create.php");
});

############################################################
$Router->map("GET", "/asset", function () {
  require(__DIR__ . "/views/asset/views/home/index.php");
});
$Router->map("GET", "/asset/manage", function () {
  require(__DIR__ . "/views/asset/views/home/manage.php");
});
$Router->map("GET", "/asset/create", function () {
  require(__DIR__ . "/views/asset/views/home/create.php");
});

$Router->map("GET", "/asset/type", function () {
  require(__DIR__ . "/views/asset/views/type/index.php");
});
$Router->map("GET", "/asset/type/create", function () {
  require(__DIR__ . "/views/asset/views/type/create.php");
});
$Router->map("POST", "/asset/type/data", function () {
  require __DIR__ . "/views/asset/views/type/data.php";
});
$Router->map("GET", "/asset/type/view/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/type/view.php";
});
$Router->map("POST", "/asset/type/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/type/action.php";
});

$Router->map("GET", "/asset/brand", function () {
  require(__DIR__ . "/views/asset/views/brand/index.php");
});
$Router->map("GET", "/asset/brand/create", function () {
  require(__DIR__ . "/views/asset/views/brand/create.php");
});
$Router->map("POST", "/asset/brand/data", function () {
  require __DIR__ . "/views/asset/views/brand/data.php";
});
$Router->map("GET", "/asset/brand/view/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/brand/view.php";
});
$Router->map("POST", "/asset/brand/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/brand/action.php";
});

$Router->map("GET", "/asset/location", function () {
  require(__DIR__ . "/views/asset/views/location/index.php");
});
$Router->map("GET", "/asset/location/create", function () {
  require(__DIR__ . "/views/asset/views/location/create.php");
});
$Router->map("POST", "/asset/location/data", function () {
  require __DIR__ . "/views/asset/views/location/data.php";
});
$Router->map("GET", "/asset/location/view/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/location/view.php";
});
$Router->map("POST", "/asset/location/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/location/action.php";
});

$Router->map("GET", "/asset/software", function () {
  require(__DIR__ . "/views/asset/views/software/index.php");
});
$Router->map("GET", "/asset/software/create", function () {
  require(__DIR__ . "/views/asset/views/software/create.php");
});
$Router->map("POST", "/asset/software/data", function () {
  require __DIR__ . "/views/asset/views/software/data.php";
});
$Router->map("GET", "/asset/software/view/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/software/view.php";
});
$Router->map("POST", "/asset/software/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/software/action.php";
});

$Router->map("GET", "/asset/checklist", function () {
  require(__DIR__ . "/views/asset/views/checklist/index.php");
});
$Router->map("GET", "/asset/checklist/create", function () {
  require(__DIR__ . "/views/asset/views/checklist/create.php");
});
$Router->map("POST", "/asset/checklist/data", function () {
  require __DIR__ . "/views/asset/views/checklist/data.php";
});
$Router->map("GET", "/asset/checklist/view/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/checklist/view.php";
});
$Router->map("POST", "/asset/checklist/[**:params]", function ($params) {
  require __DIR__ . "/views/asset/views/checklist/action.php";
});

############################################################
$match = $Router->match();

if (is_array($match) && is_callable($match['target'])) {
  call_user_func_array($match['target'], $match['params']);
} else {
  header("HTTP/1.1 404 Not Found");
  require __DIR__ . "/views/home/error.php";
}
