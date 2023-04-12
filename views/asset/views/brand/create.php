<?php
$page = "asset";
$group = "setting";

include_once(__DIR__ . "/../../../../includes/header.php");
include_once(__DIR__ . "/../../../../includes/sidebar.php");
?>

<main id="main" class="main">
  <div class="row justify-content-center">
    <?php include_once(__DIR__ . "/../../../../includes/alert.php"); ?>
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header">
          <h4 class="text-center">เพิ่ม</h4>
        </div>
        <div class="card-body">
          <form action="/asset/brand/create" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ชื่อ</label>
              <div class="col-xl-4 col-md-6">
                <input type="text" class="form-control form-control-sm" name="name" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ประเภท</label>
              <div class="col-xl-2 col-md-4 pt-2">
                <input class="form-check-input" type="radio" name="type" id="brand" value="1" required>
                <label class="form-check-label" for="brand">
                  <span class="text-primary">ยี่ห้อ</span>
                </label>
              </div>
              <div class="col-xl-2 col-md-4 pt-2">
                <input class="form-check-input" type="radio" name="type" id="model" value="2" required>
                <label class="form-check-label" for="model">
                  <span class="text-danger">รุ่น</span>
                </label>
              </div>
            </div>

            <div class="row div_reference">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">อ้างอิง (ยี่ห้อ)</label>
              <div class="col-xl-4 col-md-6">
                <select class="form-control form-control-sm reference-select" name="reference"></select>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ.
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
  $(".div_reference").hide();
  $(document).on("click", "input[name='type']", function() {
    let type = parseInt($(this).val());
    if (type === 2) {
      $(".div_reference").show();
      $(".reference-select").prop("required", true);
    } else {
      $(".div_reference").hide();
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