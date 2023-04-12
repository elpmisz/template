<?php

declare(strict_types=1);

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../../../includes/connection.php");
require_once(__DIR__ . "/../../vendor/autoload.php");

$user_id = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "");

$sql = "SELECT COUNT(*) FROM asset_checklist";
$stmt = $dbcon->prepare($sql);
$stmt->execute();
$count = $stmt->fetchColumn();

$column = ["id", "name", "id"];

$reference = (isset($_POST['reference']) ? $_POST['reference'] : "");

$keyword = (isset($_POST['search']['value']) ? $_POST['search']['value'] : "");
$order = (isset($_POST['order']) ? $_POST['order'] : "");
$order_column = (isset($_POST['order']['0']['column']) ? $_POST['order']['0']['column'] : "");
$order_dir = (isset($_POST['order']['0']['dir']) ? $_POST['order']['0']['dir'] : "");
$limit_start = (isset($_POST['start']) ? $_POST['start'] : "");
$limit_length = (isset($_POST['length']) ? $_POST['length'] : "");
$draw = (isset($_POST['draw']) ? $_POST['draw'] : "");

$sql = "SELECT A.id,A.name,B.name reference_name,
(
  CASE
    WHEN A.status = 1 THEN 'รายละเอียด'
    WHEN A.status = 2 THEN 'ระงับการใช้งาน'
    ELSE NULL
  END
) status_name,
(
  CASE
    WHEN A.status = 1 THEN 'primary'
    WHEN A.status = 2 THEN 'danger'
    ELSE NULL
  END
) status_color
FROM asset_checklist A 
LEFT JOIN asset_checklist B
ON A.reference = B.id
WHERE A.id != '' ";

if ($keyword) {
  $sql .= " AND (A.name LIKE '%{$keyword}%' OR B.name LIKE '%{$keyword}%') ";
}

if ($reference) {
  $sql .= " AND (A.id = '{$reference}' OR A.reference = '{$reference}') ";
}

if ($order) {
  $sql .= "ORDER BY {$column[$order_column]} {$order_dir} ";
} else {
  $sql .= "ORDER BY A.status ASC, A.type ASC, A.created ASC ";
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
  $status = "<a href='/asset/checklist/view/{$row['id']}' class='badge text-bg-{$row['status_color']} fw-lighter'>{$row['status_name']}</a>";
  $data[] = [
    $status,
    $row['name'],
    $row['reference_name']
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
