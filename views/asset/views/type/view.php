<?php

use app\classes\Type;

$page = "asset";
$group = "setting";

include_once(__DIR__ . "/../../../../includes/header.php");
include_once(__DIR__ . "/../../../../includes/sidebar.php");
include_once(__DIR__ . "/../../vendor/autoload.php");

$Type = new Type();

$param = (isset($params) ? explode("/", $params) : "");
$id = (!empty($param[0]) ? $param[0] : "");
$row = $Type->view([$id]);

$checklists = $Type->checklist_view([$id]);
$items = $Type->item_view([$id]);
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
          <form action="/asset/type/update" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
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
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รายการตรวจสอบ</label>
              <div class="col-xl-6 col-md-6">
                <select class="form-control form-control-sm checklist-select" name="checklist[]" multiple>
                  <?php
                  foreach ($checklists as $checklist) {
                    if (!empty($checklist['id'])) {
                      echo "<option value='{$checklist['id']}' selected>{$checklist['name']}</option>\n";
                    }
                  }
                  ?>
                </select>
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
                    <?php foreach ($items as $item) : ?>
                      <tr>
                        <td class="text-center">
                          <input type="hidden" value="<?php echo $item['id'] ?>" name="item__id[]">
                          <a href="javascript:void(0)" class="item-delete" id="<?php echo $item['id'] ?>">
                            <span class="badge text-bg-danger fw-light">ลบ</span>
                          </a>
                        </td>
                        <td>
                          <input type="text" class="form-control form-control-sm" name="item__name[]" value="<?php echo $item['name'] ?>" required>
                          <div class="invalid-feedback">
                            กรุณาใส่ข้อมูลให้ครบ.
                          </div>
                        </td>
                        <td>
                          <select class="form-control form-control-sm type-select" name="item__type[]" required>
                            <option value="">-- เลือก --</option>
                            <?php
                            $data = ["ตัวหนังสือ", "ตัวเลข", "ตัวเลือก", "วันที่"];
                            foreach ($data as $key => $value) {
                              $key++;
                              echo "<option value ='{$key}' " . ($item['type'] === $key ? "selected" : "") . ">{$value}</option>";
                            }
                            ?>
                          </select>
                          <div class="invalid-feedback">
                            กรุณาใส่ข้อมูลให้ครบ.
                          </div>
                        </td>
                        <td>
                          <input type="text" class="form-control form-control-sm" name="item__text[]" value="<?php echo $item['text'] ?>">
                          <div class="invalid-feedback">
                            กรุณาใส่ข้อมูลให้ครบ.
                          </div>
                        </td>
                        <td>
                          <select class="form-control form-control-sm" name="item__required[]" required>
                            <option value="">-- เลือก --</option>
                            <?php
                            $data = ["ไม่จำเป็น", "จำเป็น", "อ่านเท่านั้น"];
                            foreach ($data as $key => $value) {
                              $key++;
                              echo "<option value ='{$key}' " . ($item['required'] === $key ? "selected" : "") . ">{$value}</option>";
                            }
                            ?>
                          </select>
                          <div class="invalid-feedback">
                            กรุณาใส่ข้อมูลให้ครบ.
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    <tr class="tr-value">
                      <td class="text-center">
                        <button type="button" class="btn btn-sm btn-success increase">+</button>
                        <button type="button" class="btn btn-sm btn-danger decrease">-</button>
                      </td>
                      <td>
                        <input type="text" class="form-control form-control-sm" name="item_name[]">
                        <div class="invalid-feedback">
                          กรุณาใส่ข้อมูลให้ครบ.
                        </div>
                      </td>
                      <td>
                        <select class="form-control form-control-sm type-select" name="item_type[]">
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
                        <select class="form-control form-control-sm" name="item_required[]">
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
    placeholder: "-- ประเภท --",
    width: "100%",
    allowClear: true,
  });

  $(".decrease").hide();
  $(document).on("click", ".increase", function() {
    $(".type-select").select2("destroy");
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
  });

  $(document).on("blur", "input[name='item_name[]'], input[name='item__name[]']", function() {
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
      row.find("input[name='item_text[]'], input[name='item__text[]']").prop("required", true);
    } else {
      row.find("input[name='item_text[]'], input[name='item__text[]']").prop("required", false);
    }
  });

  $(document).ready(function() {
    let text = $("input[name='item__name[]']").val();
    let row_text = $("input[name='item__name[]']").closest("tr");
    if (text) {
      row_text.find(".type-select").prop("required", true);
    } else {
      row_text.find(".type-select").prop("required", false);
    }
  });

  $(document).on("click", ".item-delete", (e) => {
    let item = $(this).prop("id");
    let request = $("input[name='id']").val();
    console.log(item)
    e.preventDefault();
    Swal.fire({
      title: "ลบข้อมูล?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "ยืนยัน",
      cancelButtonText: "ยกเลิก",
    }).then((result) => {
      if (result.value) {
        window.location.href = "/asset/type/item-delete/" + item + "/" + request;
      } else {
        return false;
      }
    })
  });
</script>