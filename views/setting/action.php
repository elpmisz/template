<?php

declare(strict_types=1);

use app\classes\Setting;
use app\classes\Validation;

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../vendor/autoload.php");

$Setting = new Setting();
$Validation = new Validation();

$param = (isset($params) ? explode("/", $params) : header("Location: /error"));
$action = (isset($param[0]) ? $param[0] : '');
$param1 = (isset($param[1]) ? $param[1] : '');
$param2 = (isset($param[2]) ? $param[2] : '');

$method = (isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : "");
$login__id = (isset($_SESSION['login_id']) && !empty($_SESSION['login_id']) ? $_SESSION['login_id'] : "");

if ($method === "POST" && $action === "update") :
  try {
    $name = (isset($_POST['name']) ? $Validation->input($_POST['name']) : "");
    $email = (isset($_POST['email']) ? $Validation->input($_POST['email']) : "");
    $email_password = (isset($_POST['email_password']) ? $Validation->input($_POST['email_password']) : "");
    $default_password = (isset($_POST['default_password']) ? $Validation->input($_POST['default_password']) : "");

    $Setting->update([$name, $email, $email_password, $default_password, $login__id]);
    $Validation->alert("success", "ดำเนินการเรียบร้อยแล้ว", "/setting");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;
