<?php
$page = "users";
$group = "setting";

include_once(__DIR__ . "/../../includes/header.php");
include_once(__DIR__ . "/../../includes/sidebar.php");

$param = (isset($params) ? explode(",", $params) : "");
$id = (!empty($param[0]) ? $param[0] : "");
$row = $User->view([$id]);
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
          <form action="/user/adminupdate" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="row mb-2" style="display: none;">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รหัส</label>
              <div class="col-xl-4 col-md-6">
                <input type="text" class="form-control form-control-sm" name="login_id" value="<?php echo $row['login_id'] ?>" readonly>
              </div>
            </div>
            <div class="row justify-content-center mb-2">
              <div class="col-sm-2">
                <img src="/assets/img/profile/<?php echo (!empty($row['picture']) ? $row['picture'] : "no-img.png") ?>" class="rounded img-fluid" alt="profile-image">
              </div>
            </div>
            <div class="row justify-content-center div_show mb-2">
              <div class="col-sm-2">
                <img src="" class="rounded img-fluid show-image" alt="show-image">
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-sm-4 col-form-label text-xl-end">เปลี่ยนรูปประจำตัว</label>
              <div class="col-xl-6 col-md-8">
                <input type="file" class="form-control form-control-sm" name="picture" accept="image/png, image/jpeg">
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ชื่อผู้ใช้ระบบ</label>
              <div class="col-xl-4 col-md-6">
                <input type="text" class="form-control form-control-sm" value="<?php echo $row['username'] ?>" readonly>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ชื่อ - นามสกุล</label>
              <div class="col-xl-6 col-md-8">
                <div class="input-group">
                  <input type="text" class="form-control form-control-sm" name="first_name" value="<?php echo $row['first_name'] ?>" required>
                  <input type="text" class="form-control form-control-sm" name="last_name" value="<?php echo $row['last_name'] ?>" required>
                  <div class="invalid-feedback">
                    กรุณาใส่ข้อมูลให้ครบ
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">อีเมล</label>
              <div class="col-xl-4 col-md-6">
                <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $row['email'] ?>" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ติดต่อ</label>
              <div class="col-xl-6 col-md-8">
                <input type="text" class="form-control form-control-sm" name="contact" value="<?php echo $row['contact'] ?>">
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
              <div class="col-xl-3 col-md-6">
                <a href="/user/passwordreset/<?php echo $row['login_id'] ?>" class="btn btn-danger btn-sm w-100">
                  <i class="fas fa-lock pe-2"></i>รหัสผ่านตั้งต้น
                </a>
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
  $(".div_show").hide();
  $(document).on("change", "input[name='picture']", function() {
    let file = $(this).val();
    let size = this.files[0].size / (1024 * 1024);
    size = size.toFixed(2);
    let extension = file.split('.').pop().toLowerCase();
    let allow = ["png", "jpg", "jpeg"];
    let url = URL.createObjectURL(event.target.files[0]);

    if (size > 5) {
      Swal.fire({
        icon: "error",
        title: "เฉพาะไฟล์ ขนาดไม่เกิน 5 Mb.",
      })
      $(this).val("");
    }

    if (allow.indexOf(extension) === -1) {
      Swal.fire({
        icon: "error",
        title: "เฉพาะไฟล์รูปภาพ PNG และ JPG เท่านั้น",
      })
      $(this).val("");
      $(".div_show").hide();
    } else {
      $(".div_show").show();
      $(".show-image").prop("src", url);
      URL.revokeObjectURL($(".show-image").prop("src", url));
    }
  });
</script>