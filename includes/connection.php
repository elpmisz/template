<?php
$dbhost = "localhost";
$dbuser = "promptdev";
$dbpass = "So6j,12QWASZX";
$dbname = "template";
$dbchar = "utf8";


$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  $host = "mysql:host={$dbhost};dbname={$dbname};charset={$dbchar}";
  $dbcon = new PDO($host, $dbuser, $dbpass, $options);
} catch (PDOException $e) {
  die("ERROR: Could not connect. " . $e->getMessage());
}
