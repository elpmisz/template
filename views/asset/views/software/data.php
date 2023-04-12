<?php

declare(strict_types=1);

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../../../includes/connection.php");
require_once(__DIR__ . "/../../vendor/autoload.php");

$user_id = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "");

$sql = "SELECT COUNT(*) FROM asset_software";
$stmt = $dbcon->prepare($sql);
$stmt->execute();
$count = $stmt->fetchColumn();

$column = ["id", "name"];

$keyword = (isset($_POST['search']['value']) ? $_POST['search']['value'] : "");
$order = (isset($_POST['order']) ? $_POST['order'] : "");
$order_column = (isset($_POST['order']['0']['column']) ? $_POST['order']['0']['column'] : "");
$order_dir = (isset($_POST['order']['0']['dir']) ? $_POST['order']['0']['dir'] : "");
$limit_start = (isset($_POST['start']) ? $_POST['start'] : "");
$limit_length = (isset($_POST['length']) ? $_POST['length'] : "");
$draw = (isset($_POST['draw']) ? $_POST['draw'] : "");

$sql = "SELECT id,name,
(
  CASE
    WHEN status = 1 THEN 'รายละเอียด'
    WHEN status = 2 THEN 'ระงับการใช้งาน'
    ELSE NULL
  END
) status_name,
(
  CASE
    WHEN status = 1 THEN 'primary'
    WHEN status = 2 THEN 'danger'
    ELSE NULL
  END
) status_color
FROM asset_software ";


if ($keyword) {
  $sql .= " WHERE name LIKE '%{$keyword}%' ";
}

if ($order) {
  $sql .= "ORDER BY {$column[$order_column]} {$order_dir} ";
} else {
  $sql .= "ORDER BY status ASC, created ASC ";
}

$query = "";
if (!empty($limit_length)) {
  $query .= "LIMIT {$limit_start}, {$limit_length}";
}

$stmt = $dbcon->prepare($sql);
$stmt->execute();
$filter = $stmt->rowCount();
$stmt = $dbcon->prepare($sql . $query);
$stmt->execute();
$result = $stmt->fetchAll();

$data = [];
foreach ($result as $row) {
  $status = "<a href='/asset/software/view/{$row['id']}' class='badge text-bg-{$row['status_color']} fw-lighter'>{$row['status_name']}</a>";
  $data[] = [
    $status,
    $row['name'],
  ];
}

$output = [
  "draw"    => $draw,
  "recordsTotal"  =>  $count,
  "recordsFiltered" => $filter,
  "data"    => $data
];

echo json_encode($output);

$dbcon = null;
