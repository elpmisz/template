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
          <form action="/asset/home/create" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            <div class="row mb-2">
              <label class="col-sm-4 col-form-label text-xl-end">รูปทรัพย์สิน</label>
              <div class="col-xl-4 col-md-6">
                <table class="table table-borderless">
                  <tr class="tr-file">
                    <td class="text-center" width="5%">
                      <button type="button" class="btn btn-sm btn-success increase-file">+</button>
                      <button type="button" class="btn btn-sm btn-danger decrease-file">-</button>
                    </td>
                    <td>
                      <input type="file" class="form-control-file" name="file[]" accept=".jpeg, .png, .jpg">
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ชื่อทรัพย์สิน</label>
              <div class="col-xl-4 col-md-6">
                <input type="text" class="form-control form-control-sm" name="name" required>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ
                </div>
              </div>
            </div>

            <div class="row mb-2">
              <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ประเภทอุปกรณ์</label>
              <div class="col-xl-4 col-md-6">
                <select class="form-control form-control-sm type-select" name="type_id" required></select>
                <div class="invalid-feedback">
                  กรุณาใส่ข้อมูลให้ครบ.
                </div>
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-sm-6">
                <div class="row mb-2">
                  <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ผู้ใช้งาน</label>
                  <div class="col-xl-8 col-md-8">
                    <select class="form-control form-control-sm user-select" name="user_id"></select>
                    <div class="invalid-feedback">
                      กรุณาใส่ข้อมูลให้ครบ.
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <label class="col-xl-4 col-md-4 col-form-label text-xl-end">สถานที่</label>
                  <div class="col-xl-8 col-md-8">
                    <select class="form-control form-control-sm location-select" name="location_id"></select>
                    <div class="invalid-feedback">
                      กรุณาใส่ข้อมูลให้ครบ.
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รหัสอุปกรณ์</label>
                  <div class="col-xl-8 col-md-8">
                    <input type="text" class="form-control form-control-sm" name="serial_number" required>
                    <div class="invalid-feedback">
                      กรุณาใส่ข้อมูลให้ครบ
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รหัสทรัพย์สิน</label>
                  <div class="col-xl-8 col-md-8">
                    <input type="text" class="form-control form-control-sm" name="asset_code" required>
                    <div class="invalid-feedback">
                      กรุณาใส่ข้อมูลให้ครบ
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="row mb-2">
                  <label class="col-xl-4 col-md-4 col-form-label text-xl-end">ยี่ห้อ</label>
                  <div class="col-xl-8 col-md-8">
                    <select class="form-control form-control-sm brand-select" name="brand_id" required></select>
                    <div class="invalid-feedback">
                      กรุณาใส่ข้อมูลให้ครบ.
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <label class="col-xl-4 col-md-4 col-form-label text-xl-end">รุ่น</label>
                  <div class="col-xl-8 col-md-8">
                    <select class="form-control form-control-sm model-select" name="model_id" disabled></select>
                    <div class="invalid-feedback">
                      กรุณาใส่ข้อมูลให้ครบ.
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <label class="col-xl-4 col-md-4 col-form-label text-xl-end">วันที่ซื้อ</label>
                  <div class="col-xl-8 col-md-8">
                    <input type="text" class="form-control form-control-sm date-select" name="purchase_date">
                    <div class="invalid-feedback">
                      กรุณาใส่ข้อมูลให้ครบ
                    </div>
                  </div>
                </div>

                <div class="row mb-2">
                  <label class="col-xl-4 col-md-4 col-form-label text-xl-end">วันที่หมดประกัน</label>
                  <div class="col-xl-8 col-md-8">
                    <input type="text" class="form-control form-control-sm date-select" name="expire_date">
                    <div class="invalid-feedback">
                      กรุณาใส่ข้อมูลให้ครบ
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="row mb-2 div-type-item"></div>

            <div class="row justify-content-center mb-2">
              <div class="col-xl-3 col-md-6 mb-2">
                <button type="submit" class="btn btn-primary btn-sm w-100">
                  <i class="fas fa-check pe-2"></i>ยืนยัน
                </button>
              </div>
              <div class="col-xl-3 col-md-6 mb-2">
                <a href="/asset" class="btn btn-danger btn-sm w-100">
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
  $(".decrease-file").hide();
  $(document).on("click", ".increase-file", function() {
    let row = $(".tr-file:last");
    let clone = row.clone();
    clone.find("input").val("");
    clone.find(".increase-file").hide();
    clone.find(".decrease-file").show();
    clone.find(".decrease-file").on("click", function() {
      $(this).closest("tr").remove();
    });
    row.after(clone);
    clone.show();
  });

  $(document).on("change", ".type-select", function() {
    let type = $(this).val();
    let data = {
      type: type
    };
    axios.post("/asset/home/asset-type-item", data)
      .then(function(res) {
        const result = res.data;
        if (result.length > 0) {
          $(".div-type-item").show();
          let div = '';
          result.forEach((v, k) => {
            let type = parseInt(v.type);
            div += '<div class="col-sm-6">';
            div += '<div class="row mb-2">';
            div += '<label class="col-xl-4 col-md-4 col-form-label text-xl-end">' + v.name + '</label>';
            div += '<div class="col-xl-8 col-md-8">';
            div += '<input type="hidden" name="asset_item[]" value="' + v.id + '" readonly>';
            if (type === 1) {
              div += '<input type="text" class="form-control form-control-sm" name="asset_value[]" ' + v.required_name + '>';
            }
            if (type === 2) {
              div += '<input type="number" class="form-control form-control-sm" step="0.01" name="asset_value[]" ' + v.required_name + '>';
            }
            if (type === 3) {
              let text = v.text;
              let option = text.split(",");
              div += '<select class="form-control form-control-sm option-select" name="asset_value[]" ' + v.required_name + '>';
              div += '<option value="">-- เลือก --</option>';
              option.forEach((x, y) => {
                div += '<option value="' + y + '">' + x + '</option>';
              });
              div += '</select>';
            }
            if (type === 4) {
              div += '<input type="text" class="form-control form-control-sm date-select" name="asset_value[]" ' + v.required_name + '>';
            }
            div += '<div class="invalid-feedback">กรุณาใส่ข้อมูลให้ครบ.</div>';
            div += '</div>';
            div += '</div>';
            div += '</div>';
          });
          $(".div-type-item").empty().html(div);
        } else {
          $(".div-type-item").hide();
        }

        $(".option-select").select2({
          placeholder: "-- เลือก --",
          width: "100%",
          allowClear: true,
        });

        $(".date-select").daterangepicker({
          autoUpdateInput: false,
          singleDatePicker: true,
          showDropdowns: true,
          locale: {
            "format": "DD/MM/YYYY",
            "applyLabel": "ยืนยัน",
            "cancelLabel": "ยกเลิก",
            "daysOfWeek": [
              "อา", "จ", "อ", "พ", "พฤ", "ศ", "ส"
            ],
            "monthNames": [
              "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
              "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
            ]
          },
          "applyButtonClasses": "btn-success",
          "cancelClass": "btn-danger"
        });

        $(".date-select").on("apply.daterangepicker", function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY'));
        });

        $(".date-select").on("keydown paste", function(e) {
          e.preventDefault();
        });
      }).catch(function(error) {
        console.log(error);
      });
  });

  $(".type-select").select2({
    placeholder: "-- ประเภท --",
    width: "100%",
    allowClear: true,
    ajax: {
      url: "/asset/home/type-select",
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

  $(".user-select").select2({
    placeholder: "-- ผู้ใช้งาน --",
    width: "100%",
    allowClear: true,
    ajax: {
      url: "/asset/home/user-select",
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

  $(".location-select").select2({
    placeholder: "-- สถานที่ --",
    width: "100%",
    allowClear: true,
    ajax: {
      url: "/asset/home/location-select",
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

  $(".brand-select").select2({
    placeholder: "-- ยี่ห้อ --",
    width: "100%",
    allowClear: true,
    ajax: {
      url: "/asset/home/brand-select",
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

  $(document).on("change", ".brand-select", function() {
    let brand = $(this).val();
    $(".model-select").empty();
    if (brand) {
      $(".model-select").prop("disabled", false);
      $(".model-select").prop("required", true);
      $(".model-select").select2({
        placeholder: "-- รุ่น --",
        width: "100%",
        allowClear: true,
        ajax: {
          url: "/asset/home/model-select",
          method: 'POST',
          dataType: 'json',
          delay: 100,
          data: function(params) {
            return {
              keyword: params.term,
              brand: brand
            }
          },
          processResults: function(data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
    } else {
      $(".model-select").prop("disabled", true);
      $(".model-select").prop("required", false);
    }
  });

  $(".date-select").daterangepicker({
    autoUpdateInput: false,
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
      "format": "DD/MM/YYYY",
      "applyLabel": "ยืนยัน",
      "cancelLabel": "ยกเลิก",
      "daysOfWeek": [
        "อา", "จ", "อ", "พ", "พฤ", "ศ", "ส"
      ],
      "monthNames": [
        "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
        "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
      ]
    },
    "applyButtonClasses": "btn-success",
    "cancelClass": "btn-danger"
  });

  $(".date-select").on("apply.daterangepicker", function(ev, picker) {
    $(this).val(picker.startDate.format("DD/MM/YYYY"));
  });

  $(".date-select").on("keydown paste", function(e) {
    e.preventDefault();
  });
</script>