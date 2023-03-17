<?php

use app\classes\Validation;

session_start();
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);

require_once(__DIR__ . "/../../vendor/autoload.php");

$Validation = new Validation();

$login__id = (isset($_SESSION['login_id']) && !empty($_SESSION['login_id']) ? $_SESSION['login_id'] : "");
if (!empty($login__id)) {
  die(header("Location: /home "));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>เข้าสู่ระบบ</title>
  <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/fortawesome/font-awesome/css/all.min.css" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <div class="row justify-content-center my-5">
      <?php include_once(__DIR__ . "/../../includes/alert.php"); ?>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-body">
            <div class="py-3">
              <h3 class="text-center">เข้าสู่ระบบ</h3>
            </div>
            <form action="/authorize/login" method="POST" class="row g-3 needs-validation" novalidate>
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="ชื่อผู้ใช้งานระบบ" name="username" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="รหัสผ่าน" name="password" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-sm btn-primary w-100" type="submit">
                  <i class="fa fa-check pe-2"></i> ยืนยัน
                </button>
              </div>
              <div class="col-6">
                <p class="small"><a href="/register"><span class="text-primary">สมัครสมาชิก?</span></a></p>
              </div>
              <div class="col-6">
                <p class="small text-end"><a href="/forgot"><span class="text-danger">ลืมรหัสผ่าน?</span></a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <script src="/vendor/components/jquery/jquery.min.js"></script>
  <script src="/assets/js/main.js"></script>
</body>

</html>