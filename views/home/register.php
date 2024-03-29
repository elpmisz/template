<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>สร้างบัญชีใหม่</title>
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
              <h3 class="text-center">สร้างบัญชีใหม่</h3>
            </div>
            <form action="/authorize/create" method="POST" class="row g-3 needs-validation" novalidate>
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
              <span class="offset-2 text-password-match"></span>
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="รหัสผ่านอีกครั้ง" name="password2" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
              <div class="col-12">
                <button class="btn btn-sm btn-primary w-100" type="submit">
                  <i class="fa fa-check pe-2"></i> ยืนยัน
                </button>
              </div>
              <div class="col-12">
                <p class="small"><a href="/login">เข้าสู่ระบบ?</a></p>
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
  <script>
    $(".text-password-match").hide();
    $(document).on("keyup", "input[name='password2']", function() {
      $(".text-password-match").show();
      let password = $("input[name='password']").val();
      let password2 = $("input[name='password2']").val();

      if (password !== password2) {
        $(".text-password-match").text("รหัสผ่านไม่ตรงกัน").removeClass("text-primary").addClass("text-danger");
        $("button[type='submit']").prop("disabled", true);
      } else {
        $(".text-password-match").text("รหัสผ่านตรงกัน").removeClass("text-danger").addClass("text-primary");
        $("button[type='submit']").prop("disabled", false);
      }
    });
  </script>
</body>

</html>