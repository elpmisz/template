<?php

declare(strict_types=1);

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../includes/connection.php");
require_once(__DIR__ . "/../../vendor/autoload.php");

$user_id = (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "");

$sql = "SELECT COUNT(*) FROM user_login";
$stmt = $dbcon->prepare($sql);
$stmt->execute();
$count = $stmt->fetchColumn();

$column = ["a.status", "a.level", "a.id", "b.first_name", "a.username", "b.email", "a.level"];

$keyword = (isset($_POST['search']['value']) ? $_POST['search']['value'] : "");
$order = (isset($_POST['order']) ? $_POST['order'] : "");
$order_column = (isset($_POST['order']['0']['column']) ? $_POST['order']['0']['column'] : "");
$order_dir = (isset($_POST['order']['0']['dir']) ? $_POST['order']['0']['dir'] : "");
$limit_start = (isset($_POST['start']) ? $_POST['start'] : "");
$limit_length = (isset($_POST['length']) ? $_POST['length'] : "");
$draw = (isset($_POST['draw']) ? $_POST['draw'] : "");

$sql = "SELECT b.picture,CONCAT(b.first_name,' ',b.last_name) fullname,b.email,b.contact,
a.id login_id,a.username,
(
  CASE
    WHEN a.level = 1 THEN 'ผู้ใช้งานระบบ'
    WHEN a.level = 9 THEN 'ผู้ดูแลระบบ'
    ELSE NULL 
  END
) level_name,
(
  CASE
    WHEN a.level = 1 THEN 'success'
    WHEN a.level = 9 THEN 'danger'
    ELSE NULL 
  END
) level_color,
(
  CASE
    WHEN a.status = 1 THEN 'รายละเอียด'
    WHEN a.status = 2 THEN 'ระงับการใช้งาน'
    ELSE NULL 
  END
) status_name,
(
  CASE
    WHEN a.status = 1 THEN 'primary'
    WHEN a.status = 2 THEN 'danger'
    ELSE NULL 
  END
) status_color
FROM user_login a
LEFT JOIN user_detail b
ON a.id = b.login_id
WHERE a.id != '' ";

if ($keyword) {
  $sql .= " AND (b.first_name LIKE '%{$keyword}%' OR b.last_name LIKE '%{$keyword}%' OR b.email LIKE '%{$keyword}%' OR b.contact LIKE '%{$keyword}%') ";
}

if ($order) {
  $sql .= "ORDER BY {$column[$order_column]} {$order_dir} ";
} else {
  $sql .= "ORDER BY a.status ASC, a.created ASC ";
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
  $level = "<span class='badge text-bg-{$row['level_color']} fw-lighter'>{$row['level_name']}</span>";
  $status = "<a href='/users/view/{$row['login_id']}' class='badge text-bg-{$row['status_color']} fw-lighter'>{$row['status_name']}</a>";

  if (!empty($row['picture'])) {
    $image = "<a href='/assets/img/profile/{$row['picture']}' target='_blank'><img src='/assets/img/profile/{$row['picture']}' class='img-table-fluid rounded shadow'></a>";
  } else {
    $image = "<img src='/assets/img/profile/no-img.png' class='img-table-fluid rounded shadow'>";
  }

  $data[] = [
    $status,
    $level,
    $image,
    $row['username'],
    $row['fullname'],
    $row['email'],
    $row['contact'],
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
