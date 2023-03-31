<?php
$page = "users";
$group = "setting";

include_once(__DIR__ . "/../../includes/header.php");
include_once(__DIR__ . "/../../includes/sidebar.php");
?>

<main id="main" class="main">
  <div class="row justify-content-center">
    <?php include_once(__DIR__ . "/../../includes/alert.php"); ?>
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header">
          <h4 class="text-center">รายละเอียด</h4>
        </div>
        <div class="card-body">
          <form action="/user/admincreate" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ชื่อผู้ใช้ระบบ</label>
              <div class="col-xl-4 col-md-6">
                <input type="text" class="form-control form-control-sm" name="username" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
            </div>
            <div class="row mb-2 div_textcheck">
              <label class="col-xl-4 col-md-4 offset-md-4 offset-xl-4 col-form-label text-check"></label>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ชื่อ - นามสกุล</label>
              <div class="col-xl-6 col-md-8">
                <div class="input-group">
                  <input type="text" class="form-control form-control-sm" name="first_name" required>
                  <input type="text" class="form-control form-control-sm" name="last_name" required>
                  <div class="invalid-feedback">
                    กรุณาใส่ข้อมูลให้ครบ
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">อีเมล</label>
              <div class="col-xl-4 col-md-6">
                <input type="email" class="form-control form-control-sm" name="email" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ติดต่อ</label>
              <div class="col-xl-6 col-md-8">
                <input type="text" class="form-control form-control-sm" name="contact">
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
            </div>

            <div class="row justify-content-center mb-2">
              <div class="col-xl-3 col-md-6">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                  <i class="fas fa-check pe-2"></i>ยืนยัน
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include_once(__DIR__ . "/../../includes/footer.php");
?>
<script>
  $(".div_textcheck").hide();
  $(document).on("keyup", "input[name='username']", function() {
    let username = $(this).val();
    $.ajax({
      url: "/user/usernamecheck",
      method: "POST",
      data: {
        username: username
      },
      dataType: 'json',
      success: function(data) {
        $(".div_textcheck").show();
        if (parseInt(data) === 0) {
          $(".div_textcheck").hide();
          $("button[type='submit']").prop("disabled", false);
        } else {
          $(".text-check").text("ชื่อผู้ใช้งานระบบซ้ำ").removeClass("text-primary").addClass("text-danger");
          $("button[type='submit']").prop("disabled", true);
        }
      }
    });


  });
</script>