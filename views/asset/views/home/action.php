<?php

declare(strict_types=1);

use app\classes\Query;
use app\classes\Validation;

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../vendor/autoload.php");

$Query = new Query();
$Validation = new Validation();

$param = (isset($params) ? explode("/", $params) : header("Location: /error"));
$action = (isset($param[0]) ? $param[0] : '');
$param1 = (isset($param[1]) ? $param[1] : '');
$param2 = (isset($param[2]) ? $param[2] : '');

$method = (isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : "");
$login__id = (isset($_SESSION['login_id']) && !empty($_SESSION['login_id']) ? $_SESSION['login_id'] : "");

if ($method === "POST" && $action === "create") :
  try {
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "type-select") :
  try {
    $keyword = (isset($_POST['q']) ? $Validation->input($_POST['q']) : "");
    $result = $Query->type_select($keyword);

    echo json_encode($result);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "user-select") :
  try {
    $keyword = (isset($_POST['q']) ? $Validation->input($_POST['q']) : "");
    $result = $Query->user_select($keyword);

    echo json_encode($result);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "location-select") :
  try {
    $keyword = (isset($_POST['q']) ? $Validation->input($_POST['q']) : "");
    $result = $Query->location_select($keyword);

    echo json_encode($result);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "brand-select") :
  try {
    $keyword = (isset($_POST['q']) ? $Validation->input($_POST['q']) : "");
    $result = $Query->brand_select($keyword);

    echo json_encode($result);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "model-select") :
  try {
    $keyword = (isset($_POST['keyword']) ? $Validation->input($_POST['keyword']) : '');
    $brand = (isset($_POST['brand']) ? $Validation->input($_POST['brand']) : '');
    $result = $Query->model_select($brand, $keyword);

    echo json_encode($result);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;

if ($method === "POST" && $action === "asset-type-item") :
  try {
    $data = json_decode(file_get_contents('php://input'));
    $type = $data->type;
    $result = $Query->asset_type_item([$type]);

    echo json_encode($result);
  } catch (PDOException $e) {
    die($e->getMessage());
  }
endif;
