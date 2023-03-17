<?php

use app\classes\Setting;
use app\classes\User;

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../vendor/autoload.php");

$login__id = (isset($_SESSION['login_id']) ? $_SESSION['login_id'] : "");
if (empty($login__id)) {
  die(header("Location: /error"));
}

$User = new User();
$Setting = new Setting();

$user = $User->view([$login__id]);
$setting = $Setting->view();

$setting_brand = (isset($setting['name']) && !empty($setting['name']) ? $setting['name'] : "");
$fullname = (isset($user['fullname']) && !empty($user['fullname']) ? $user['fullname'] : "")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?php echo $setting_brand ?></title>
  <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/vendor/fortawesome/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="/vendor/pnikolov/bootstrap-daterangepicker/css/daterangepicker.min.css">
  <link rel="stylesheet" href="/vendor/fullcalendar/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="/vendor/select2/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="/assets/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="/home" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block"><?php echo $setting_brand ?></span>
      </a>
      <i class="fa fa-bars toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php echo $fullname ?>
            </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $fullname ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="/user/profile">
                <i class="fa fa-user"></i> ข้อมูลส่วนตัว
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center logout" href="javascript:void(0)">
                <i class="fa fa-right-from-bracket"></i> ออกจากระบบ
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>