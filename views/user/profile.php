<?php
$page = "profile";
$group = "user";

include_once(__DIR__ . "/../../includes/header.php");
include_once(__DIR__ . "/../../includes/sidebar.php");
?>

<main id="main" class="main">
  <div class="row justify-content-center">
    <?php include_once(__DIR__ . "/../../includes/alert.php"); ?>
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header">
          <h4 class="text-center">ประวัติส่วนตัว</h4>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
            <div class="col-xl-3 mb-2">
              <div class="card shadow">
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-12 text-center mb-3">
                      <img src="/assets/img/profile/<?php echo (isset($user['picture']) ? $user['picture'] : "no-img.png") ?>" alt="Profile" class="img-fluid img-profile">
                    </div>
                    <div class="col-xl-12 mb-3">
                      <h4 class="text-center">
                        <?php echo (isset($user['fullname']) ? $user['fullname'] : "") ?>
                      </h4>
                      <h4 class="text-center">Position</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-9 mb-2">
              <nav>
                <div class="nav nav-pills mb-3">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile" type="button">รายละเอียด</button>
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#change" type="button">เปลี่ยนรหัสผ่าน</button>
                </div>
              </nav>
              <div class="tab-content shadow">
                <div class="tab-pane fade show active" id="profile">
                  <div class="card shadow">
                    <div class="card-body">
                      <form action="/user/update" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="row justify-content-center div-show-image mb-2">
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
                          <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ชื่อ - นามสกุล</label>
                          <div class="col-xl-6 col-md-8">
                            <div class="input-group">
                              <input type="text" class="form-control form-control-sm" name="first_name" value="<?php echo $user['first_name'] ?>" required>
                              <input type="text" class="form-control form-control-sm" name="last_name" value="<?php echo $user['last_name'] ?>" required>
                              <div class="invalid-feedback">
                                กรุณาใส่ข้อมูลให้ครบ
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-xl-4 col-md-4 col-form-label text-xl-end">อีเมล</label>
                          <div class="col-xl-4 col-md-6">
                            <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $user['email'] ?>" required>
                            <div class="invalid-feedback">
                              กรุณาใส่ข้อมูลให้ครบ
                            </div>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ติดต่อ</label>
                          <div class="col-xl-6 col-md-8">
                            <input type="text" class="form-control form-control-sm" name="contact" value="<?php echo $user['contact'] ?>">
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
                <div class="tab-pane fade" id="change">
                  <div class="card shadow">
                    <div class="card-body">
                      <form action="/user/change" method="POST" class="needs-validation" novalidate>
                        <div class="row mb-2">
                          <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รหัสผ่าน</label>
                          <div class="col-xl-4 col-md-6">
                            <input type="password" class="form-control form-control-sm" name="password" required>
                            <div class="invalid-feedback">
                              กรุณาใส่ข้อมูลให้ครบ
                            </div>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <div class="col-xl-4 offset-xl-4 col-md-4 offset-md-4">
                            <span class="text-password-match"></span>
                          </div>
                        </div>
                        <div class="row mb-2">
                          <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รหัสผ่านอีกครั้ง</label>
                          <div class="col-xl-4 col-md-6">
                            <input type="password" class="form-control form-control-sm" name="password2" required>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include_once(__DIR__ . "/../../includes/footer.php");
?>
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

  $(".div-show-image").hide();
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
      $(".div-show-image").hide();
    } else {
      $(".div-show-image").show();
      $(".show-image").prop("src", url);
      URL.revokeObjectURL($(".show-image").prop("src", url));
    }
  });
</script>