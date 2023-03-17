<?php

declare(strict_types=1);

use app\classes\User;
use app\classes\Validation;

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../vendor/autoload.php");

$Validation = new Validation();
$User = new User();

$param = (isset($params) ? explode("/", $params) : header("Location: /error"));
$action = (isset($param[0]) ? $param[0] : '');
$param1 = (isset($param[1]) ? $param[1] : '');
$param2 = (isset($param[2]) ? $param[2] : '');

$method = (isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : "");
$login__id = (isset($_SESSION['login_id']) && !empty($_SESSION['login_id']) ? $_SESSION['login_id'] : "");

if ($method === "POST" && $action === "login") :
  try {
    $username = (isset($_POST['username']) ? $Validation->input($_POST['username']) : "");
    $password = (isset($_POST['password']) ? $Validation->input($_POST['password']) : "");

    $active = $User->status([$username]);
    if ($active > 0) {
      $Validation->alert("danger", "ไม่มีสิทธิ์เข้าใช้งาน กรุณาติดต่อผู้ดูแลระบบ", "/login");
    }

    if (empty($username) || empty($password)) {
      $Validation->alert("danger", "กรุณาใส่ข้อมูลให้ครบ", "/login");
    }

    $password_verify = $User->password([$username]);
    $verify = password_verify($password, $password_verify);
    if (empty($verify)) {
      $Validation->alert("danger", "ชื่อผู้ใช้งานระบบ หรือรหัสผ่านไม่ถูกต้อง", "/login");
    }

    $_SESSION['login_id'] = $User->login_id([$username]);

    $Validation->alert("success", "ยินดีต้อนรับ", "/user/profile");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "create") :
  try {
    $username = (isset($_POST['username']) ? $Validation->input($_POST['username']) : "");
    $password = (isset($_POST['password']) ? $Validation->input($_POST['password']) : "");
    $password2 = (isset($_POST['password2']) ? $Validation->input($_POST['password2']) : "");
    $password_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 15]);

    $user_duplicate = $User->user_duplicate([$username]);
    if ($user_duplicate > 0) {
      $Validation->alert("danger", "ชื่อผู้ใช้งานระบบซ้ำ", "/register");
    }

    if ($password !== $password2) {
      $Validation->alert("danger", "รหัสผ่านไม่ตรงกัน", "/register");
    }

    $User->login_create([$username, $password_hash]);
    $login_id = $User->login_id([$username]);
    $User->user_create([$login_id]);

    $_SESSION['login_id'] = $login_id;

    $Validation->alert("success", "ยินดีต้อนรับ", "/home");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "forgot") :
  try {
    $username = (isset($_POST['username']) ? $Validation->input($_POST['username']) : "");
    $password = mb_substr(strtoupper(sha1(microtime())), 0, 10);
    $password_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 15]);

    $username_check = $User->username([$username]);
    if ($username_check === 0) {
      $Validation->alert("danger", "ไม่พบชื่อผู้ใช้ในระบบ กรุณาตรวจสอบอีกครั้ง", "/forgot");
    }

    echo $password;

    // $Validation->alert("success", "กรุณาตรวจสอบรหัสผ่านใหม่ที่ E-Mail", "/login");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;
