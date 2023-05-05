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
          <form action="/asset/type/create" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
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
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รายการตรวจสอบ</label>
              <div class="col-xl-6 col-md-6">
                <select class="form-control form-control-sm checklist-select" name="checklist[]" multiple></select>
              </div>
            </div>

            <div class="row mb-2">
              <div class="table-responsive">
                <table class="table table-bordered table-sm">
                  <thead>
                    <tr>
                      <th width="10%">#</th>
                      <th width="40%">หัวข้อ</th>
                      <th width="10%">ประเภท</th>
                      <th width="20%">ตัวเลือก</th>
                      <th width="10%">ความต้องการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="tr-value">
                      <td class="text-center">
                        <button type="button" class="btn btn-sm btn-success increase">+</button>
                        <button type="button" class="btn btn-sm btn-danger decrease">-</button>
                      </td>
                      <td>
                        <input type="text" class="form-control form-control-sm" name="item_name[]" required>
                        <div class="invalid-feedback">
                          กรุณาใส่ข้อมูลให้ครบ.
                        </div>
                      </td>
                      <td>
                        <select class="form-control form-control-sm type-select" name="item_type[]" required>
                          <option value="">-- เลือก --</option>
                          <?php
                          $data = ["ตัวหนังสือ", "ตัวเลข", "ตัวเลือก", "วันที่"];
                          foreach ($data as $key => $value) {
                            $key++;
                            echo "<option value ='{$key}'>{$value}</option>";
                          }
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          กรุณาใส่ข้อมูลให้ครบ.
                        </div>
                      </td>
                      <td>
                        <input type="text" class="form-control form-control-sm" name="item_text[]">
                        <div class="invalid-feedback">
                          กรุณาใส่ข้อมูลให้ครบ.
                        </div>
                      </td>
                      <td>
                        <select class="form-control form-control-sm required-select" name="item_required[]" required>
                          <option value="">-- เลือก --</option>
                          <?php
                          $data = ["ไม่จำเป็น", "จำเป็น", "อ่านเท่านั้น"];
                          foreach ($data as $key => $value) {
                            $key++;
                            echo "<option value ='{$key}'>{$value}</option>";
                          }
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          กรุณาใส่ข้อมูลให้ครบ.
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row justify-content-center mb-2">
              <div class="col-xl-3 col-md-6 mb-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                  <i class="fas fa-check pe-2"></i>ยืนยัน
                </button>
              </div>
              <div class="col-xl-3 col-md-6 mb-2">
                <a href="/asset/type" class="btn btn-danger btn-sm w-100">
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
  $(".checklist-select").select2({
    placeholder: "-- หัวข้อ --",
    width: "100%",
    allowClear: true,
    ajax: {
      url: "/asset/checklist/reference-select",
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

  $(".type-select").select2({
    placeholder: "-- เลือก --",
    width: "100%",
    allowClear: true,
  });

  $(".required-select").select2({
    placeholder: "-- เลือก --",
    width: "100%",
    allowClear: true,
  });

  $(".decrease").hide();
  $(document).on("click", ".increase", function() {
    $(".type-select, .required-select").select2("destroy");
    let row = $(".tr-value:last");
    let clone = row.clone();
    clone.find("input, select").val("");
    clone.find(".increase").hide();
    clone.find(".decrease").show();
    clone.find(".decrease").on('click', function() {
      $(this).closest("tr").remove();
    });
    row.after(clone);
    clone.show();

    $(".type-select").select2({
      placeholder: "-- ประเภท --",
      width: "100%",
      allowClear: true,
    });

    $(".required-select").select2({
      placeholder: "-- เลือก --",
      width: "100%",
      allowClear: true,
    });
  });

  $(document).on("blur", "input[name='item_name[]']", function() {
    let text = $(this).val();
    let row = $(this).closest("tr");
    if (text) {
      row.find(".type-select").prop("required", true);
    } else {
      row.find(".type-select").prop("required", false);
    }
  });

  $(document).on("change", ".type-select", function() {
    let type = parseInt($(this).val());
    let row = $(this).closest("tr");
    if (type === 3) {
      row.find("input[name='item_text[]']").prop("required", true);
    } else {
      row.find("input[name='item_text[]']").prop("required", false);
    }
  });
</script>