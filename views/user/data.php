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

$column = ["A.status", "A.id", "B.first_name", "A.username", "B.email", "A.level"];

$keyword = (isset($_POST['search']['value']) ? $_POST['search']['value'] : "");
$order = (isset($_POST['order']) ? $_POST['order'] : "");
$order_column = (isset($_POST['order']['0']['column']) ? $_POST['order']['0']['column'] : "");
$order_dir = (isset($_POST['order']['0']['dir']) ? $_POST['order']['0']['dir'] : "");
$limit_start = (isset($_POST['start']) ? $_POST['start'] : "");
$limit_length = (isset($_POST['length']) ? $_POST['length'] : "");
$draw = (isset($_POST['draw']) ? $_POST['draw'] : "");

$sql = "SELECT B.picture,CONCAT(B.first_name,' ',B.last_name) fullname,B.email,B.contact,
A.id login_id,A.username,
(
  CASE
    WHEN A.level = 1 THEN 'ผู้ใช้งานระบบ'
    WHEN A.level = 9 THEN 'ผู้ดูแลระบบ'
    ELSE NULL 
  END
) level_name,
(
  CASE
    WHEN A.level = 1 THEN 'primary'
    WHEN A.level = 9 THEN 'danger'
    ELSE NULL 
  END
) level_color,
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
FROM user_login A
LEFT JOIN user_detail B
ON A.id = B.login_id
WHERE A.id != '' ";


if ($keyword) {
  $sql .= " AND (B.first_name LIKE '%{$keyword}%' OR B.last_name LIKE '%{$keyword}%' OR B.email LIKE '%{$keyword}%' OR B.contact LIKE '%{$keyword}%') ";
}

if ($order) {
  $sql .= "ORDER BY {$column[$order_column]} {$order_dir} ";
} else {
  $sql .= "ORDER BY A.status ASC, A.created ASC ";
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
  if (!empty($row['picture'])) :
    $image = "<img src='/assets/img/profile/{$row['picture']}' class='img-fluid rounded mx-auto d-block shadow'>";
  else :
    $image = "<img src='/assets/img/profile/no-img.png' class='img-fluid rounded mx-auto d-block shadow'>";
  endif;
  $data[] = [
    0 => $status,
    1 => $image,
    2 => $row['fullname'],
    3 => $row['username'],
    4 => $row['email'],
    5 => $row['contact'],
    6 => $level,
  ];
}

$output = [
  "draw"    => $draw,
  "recordsTotal"  =>  $count,
  "recordsFiltered" => $filter,
  "data"    => $data
];

echo json_encode($output);
