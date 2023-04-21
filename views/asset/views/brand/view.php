<?php

use app\classes\Brand;

$page = "asset";
$group = "setting";

include_once(__DIR__ . "/../../../../includes/header.php");
include_once(__DIR__ . "/../../../../includes/sidebar.php");
include_once(__DIR__ . "/../../vendor/autoload.php");

$Brand = new Brand();

$param = (isset($params) ? explode("/", $params) : "");
$id = (!empty($param[0]) ? $param[0] : "");
$row = $Brand->view([$id]);
?>

<main id="main" class="main">
  <div class="row justify-content-center">
    <?php include_once(__DIR__ . "/../../../../includes/alert.php"); ?>
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header">
          <h4 class="text-center">รายละเอียด</h4>
        </div>
        <div class="card-body">
          <form action="/asset/brand/update" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="row mb-2" style="display: none;">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รหัส</label>
              <div class="col-xl-4 col-md-6">
                <input type="text" class="form-control form-control-sm" name="id" value="<?php echo $row['id'] ?>" readonly>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ชื่อประเภท</label>
              <div class="col-xl-4 col-md-6">
                <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $row['name'] ?>" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ประเภท</label>
              <div class="col-xl-2 col-md-4 pt-2">
                <input class="form-check-input" type="radio" name="type" id="brand" value="1" <?php echo ($row['type'] === 1 ? "checked" : "") ?> required>
                <label class="form-check-label" for="brand">
                  <span class="text-primary">ยี่ห้อ</span>
                </label>
              </div>
              <div class="col-xl-2 col-md-4 pt-2">
                <input class="form-check-input" type="radio" name="type" id="model" value="2" <?php echo ($row['type'] === 2 ? "checked" : "") ?> required>
                <label class="form-check-label" for="model">
                  <span class="text-danger">รุ่น</span>
                </label>
              </div>
            </div>

            <div class="row div-reference">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">อ้างอิง (ยี่ห้อ)</label>
              <div class="col-xl-4 col-md-6">
                <select class="form-control form-control-sm reference-select" name="reference">
                  <?php if ($row['type'] === 2) : ?>
                    <option value="<?php echo $row['reference'] ?>"><?php echo $row['reference_name'] ?></option>
                  <?php endif; ?>
                </select>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ.
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">สถานะ</label>
              <div class="col-xl-2 col-md-4 pt-2">
                <input class="form-check-input" type="radio" name="status" id="yes" value="1" <?php echo ($row['status'] === 1 ? "checked" : "") ?>>
                <label class="form-check-label" for="yes">
                  <span class="text-primary">ใช้งาน</span>
                </label>
              </div>
              <div class="col-xl-2 col-md-4 pt-2">
                <input class="form-check-input" type="radio" name="status" id="no" value="2" <?php echo ($row['status'] === 2 ? "checked" : "") ?>>
                <label class="form-check-label" for="no">
                  <span class="text-danger">ระงับการใช้งาน</span>
                </label>
              </div>
            </div>

            <div class="row justify-content-center mb-2">
              <div class="col-xl-3 col-md-6 mb-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                  <i class="fas fa-check pe-2"></i>ยืนยัน
                </button>
              </div>
              <div class="col-xl-3 col-md-6 mb-2">
                <a href="/asset/brand" class="btn btn-danger btn-sm w-100">
                  <i class="fas fa-arrow-left pe-2"></i>กลับหน้าหลัก
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
include_once(__DIR__ . "/../../../../includes/footer.php");
?>
<script>
  $(document).ready(function() {
    let type = parseInt($("input[name='type']:checked").val());
    if (type === 2) {
      $(".div-reference").show();
    } else {
      $(".div-reference").hide();
    }
  });

  $(document).on("click", "input[name='type']", function() {
    let type = parseInt($(this).val());
    if (type === 2) {
      $(".div-reference").show();
      $(".reference-select").prop("required", true);
    } else {
      $(".div-reference").hide();
      $(".reference-select").prop("required", false).empty();
    }
  });

  $(".reference-select").select2({
    placeholder: "-- ยี่ห้อ --",
    width: "100%",
    allowClear: true,
    ajax: {
      url: "/asset/brand/reference-select",
      method: 'POST',
      dataType: 'json',
      delay: 100,
      processResults: function(data) {
        return {
          results: data
        };
      },
      cache: true
    }
  });
</script>