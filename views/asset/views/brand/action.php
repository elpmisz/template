<?php

declare(strict_types=1);

use app\classes\Brand;
use app\classes\Validation;

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../vendor/autoload.php");

$Brand = new Brand();
$Validation = new Validation();

$param = (isset($params) ? explode("/", $params) : header("Location: /error"));
$action = (isset($param[0]) ? $param[0] : '');
$param1 = (isset($param[1]) ? $param[1] : '');
$param2 = (isset($param[2]) ? $param[2] : '');

$method = (isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : "");
$login__id = (isset($_SESSION['login_id']) && !empty($_SESSION['login_id']) ? $_SESSION['login_id'] : "");

if ($method === "POST" && $action === "create") :
  try {
    $name = (isset($_POST['name']) ? $Validation->input($_POST['name']) : "");
    $type = (isset($_POST['type']) ? $Validation->input($_POST['type']) : "");
    $reference = (isset($_POST['reference']) ? $Validation->input($_POST['reference']) : "");

    $Brand->create([$name, $type, $reference, $login__id]);

    $Validation->alert("success", "เพิ่มข้อมูลเรียบร้อยแล้ว", "/asset/brand");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "update") :
  try {
    $id = (isset($_POST['id']) ? $Validation->input($_POST['id']) : "");
    $name = (isset($_POST['name']) ? $Validation->input($_POST['name']) : "");
    $type = (isset($_POST['type']) ? $Validation->input($_POST['type']) : "");
    $reference = (isset($_POST['reference']) ? $Validation->input($_POST['reference']) : "");
    $status = (isset($_POST['status']) ? $Validation->input($_POST['status']) : "");

    $Brand->update([$name, $type, $reference, $login__id, $status, $id]);

    $Validation->alert("success", "ดำเนินการเรียบร้อยแล้ว", "/asset/brand/view/{$id}");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "reference-select") :
  try {
    $keyword = (isset($_POST['q']) ? $Validation->input($_POST['q']) : "");
    $result = $Brand->reference($keyword);

    echo json_encode($result);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;
