<?php

declare(strict_types=1);

use app\classes\Type;
use app\classes\Validation;

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../vendor/autoload.php");

$Type = new Type();
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
    $checklist = (isset($_POST['checklist']) ? $Validation->input(implode(",", $_POST['checklist'])) : "");
    $Type->create([$name, $checklist, $login__id]);
    $type__id = $Type->type_id([$name]);

    if (isset($_POST['item_name']) && COUNT($_POST['item_name']) > 0 && !in_array("", $_POST['item_name'])) {
      foreach ($_POST['item_name'] as $key => $value) {
        $item_name = (isset($_POST['item_name'][$key]) ? $Validation->input($_POST['item_name'][$key]) : "");
        $item_type = (isset($_POST['item_type'][$key]) ? $Validation->input($_POST['item_type'][$key]) : "");
        $item_text = (isset($_POST['item_text'][$key]) ? $Validation->input($_POST['item_text'][$key]) : "");
        $item_required = (isset($_POST['item_required'][$key]) ? $Validation->input($_POST['item_required'][$key]) : "");

        $Type->item_create([$type__id, $item_name, $item_type, $item_text, $item_required, $login__id]);
      }
    }

    $Validation->alert("success", "เพิ่มข้อมูลเรียบร้อยแล้ว", "/asset/type");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "update") :
  try {
    $id = (isset($_POST['id']) ? $Validation->input($_POST['id']) : "");
    $name = (isset($_POST['name']) ? $Validation->input($_POST['name']) : "");
    $checklist = (isset($_POST['checklist']) ? $Validation->input(implode(",", $_POST['checklist'])) : "");
    $status = (isset($_POST['status']) ? $Validation->input($_POST['status']) : "");
    $Type->update([$name, $checklist, $login__id, $status, $id]);

    if (isset($_POST['item_name']) && COUNT($_POST['item_name']) > 0 && !in_array("", $_POST['item_name'])) {
      foreach ($_POST['item_name'] as $key => $value) {
        $item_name = (isset($_POST['item_name'][$key]) ? $Validation->input($_POST['item_name'][$key]) : "");
        $item_type = (isset($_POST['item_type'][$key]) ? $Validation->input($_POST['item_type'][$key]) : "");
        $item_text = (isset($_POST['item_text'][$key]) ? $Validation->input($_POST['item_text'][$key]) : "");
        $item_required = (isset($_POST['item_required'][$key]) ? $Validation->input($_POST['item_required'][$key]) : "");

        $Type->item_create([$id, $item_name, $item_type, $item_text, $item_required, $login__id]);
      }
    }

    if (isset($_POST['item__id']) && COUNT($_POST['item__id']) > 0 && !in_array("", $_POST['item__id'])) {
      foreach ($_POST['item__id'] as $key => $value) {
        $item__id = (isset($_POST['item__id'][$key]) ? $Validation->input($_POST['item__id'][$key]) : "");
        $item__name = (isset($_POST['item__name'][$key]) ? $Validation->input($_POST['item__name'][$key]) : "");
        $item__type = (isset($_POST['item__type'][$key]) ? $Validation->input($_POST['item__type'][$key]) : "");
        $item__text = (isset($_POST['item__text'][$key]) ? $Validation->input($_POST['item__text'][$key]) : "");
        $item__required = (isset($_POST['item__required'][$key]) ? $Validation->input($_POST['item__required'][$key]) : "");

        $Type->item_update([$item__name, $item__type, $item__text, $item__required, $login__id, $item__id]);
      }
    }

    $Validation->alert("success", "ดำเนินการเรียบร้อยแล้ว", "/asset/type/view/{$id}");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "GET" && $action === "item-delete") :
  try {
    $Type->item_delete([$param1]);
    $Validation->alert("success", "ดำเนินการเรียบร้อยแล้ว", "/asset/type/view/{$param2}");
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;
