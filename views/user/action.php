<?php

declare(strict_types=1);

use app\classes\User;
use app\classes\Validation;

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../vendor/autoload.php");

$User = new User();
$Validation = new Validation();

$param = (isset($params) ? explode("/", $params) : header("Location: /error"));
$action = (isset($param[0]) ? $param[0] : '');
$param1 = (isset($param[1]) ? $param[1] : '');
$param2 = (isset($param[2]) ? $param[2] : '');

$method = (isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : "");
$login__id = (isset($_SESSION['login_id']) && !empty($_SESSION['login_id']) ? $_SESSION['login_id'] : "");

if ($method === "POST" && $action === "update") :
  try {
    $first_name = (isset($_POST['first_name']) ? $Validation->input($_POST['first_name']) : "");
    $last_name = (isset($_POST['last_name']) ? $Validation->input($_POST['last_name']) : "");
    $email = (isset($_POST['email']) ? $Validation->input($_POST['email']) : "");
    $contact = (isset($_POST['contact']) ? $Validation->input($_POST['contact']) : "");
    $User->update([$first_name, $last_name, $email, $contact, $login__id, $login__id]);

    if (isset($_FILES['picture']['name']) && !empty($_FILES['picture']['name'])) {
      $file_name = (isset($_FILES['picture']['name']) ? $_FILES['picture']['name'] : "");
      $file_tmp = (isset($_FILES['picture']['tmp_name']) ? $_FILES['picture']['tmp_name'] : "");
      $file_random = md5(microtime());
      $file_extension = pathinfo(strtolower($file_name), PATHINFO_EXTENSION);
      $images_extension = ["jpg", "jpeg", "png"];
      $file_allow = array_merge($images_extension);
      $file_rename = "{$file_random}.{$file_extension}";
      $file_path = (__DIR__ . "/../../assets/img/profile/{$file_rename}");

      if (!in_array($file_extension, $file_allow)) {
        $Validation->alert("danger", "เฉพาะไฟล์รูปภาพ PNG และ JPG เท่านั้น", "/user/profile");
      }

      if (in_array($file_extension, $images_extension)) {
        $Validation->picture_upload($file_tmp, $file_path);
      }

      $picture_user = $User->picture_profile_name([$login__id]);
      $Validation->picture_profile_unlink($picture_user);
      $User->picture_profile_update([$file_rename, $login__id, $login__id]);
    }

    $Validation->alert("success", "ดำเนินการเรียบร้อยแล้ว", "/user/profile");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "change") :
  try {
    $password = (isset($_POST['password']) ? $Validation->input($_POST['password']) : "");
    $password2 = (isset($_POST['password2']) ? $Validation->input($_POST['password2']) : "");
    $password_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 15]);

    if ($password !== $password2) {
      $Validation->alert("danger", "รหัสผ่านไม่ตรงกัน", "/user/profile");
    }

    $User->password_change([$password_hash, $login__id]);
    $Validation->alert("success", "ดำเนินการเรียบร้อยแล้ว", "/user/profile");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;
