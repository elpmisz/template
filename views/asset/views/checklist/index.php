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
          <h4 class="text-center">ข้อมูลรายการตรวจสอบ</h4>
        </div>
        <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-xl-3 col-md-6">
              <select class="form-control form-control-sm reference-select"></select>
            </div>
            <div class="col-xl-3 col-md-6">
              <a href="/asset/checklist/create" class="btn btn-sm btn-primary w-100">
                <i class="fa fa-plus pe-2"></i> เพิ่ม
              </a>
            </div>
          </div>

          <div class="row my-3">
            <div class="col-xl-12">
              <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm data w-100">
                  <thead>
                    <tr>
                      <th width="10%">#</th>
                      <th width="70%">ชื่อ</th>
                      <th width="20">อ้างอิง (หัวข้อ)</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="row justify-content-center my-2">
        <div class="col-xl-3 col-md-6">
          <a href="/asset/manage" class="btn btn-danger btn-sm w-100">
            <i class="fas fa-arrow-left pe-2"></i>กลับหน้าจัดการ
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include_once(__DIR__ . "/../../../../includes/footer.php");
?>
<script>
  filter_data();

  function filter_data(reference) {
    let data = $(".data").DataTable({
      serverSide: true,
      scrollX: true,
      searching: true,
      order: [],
      ajax: {
        url: "/asset/checklist/data",
        type: "POST",
        data: {
          reference: reference
        }
      },
      columnDefs: [{
        targets: [0, 2],
        className: "text-center",
      }],
      oLanguage: {
        sLengthMenu: "แสดง _MENU_ ลำดับ ต่อหน้า",
        sZeroRecords: "ไม่พบข้อมูลที่ค้นหา",
        sInfo: "แสดง _START_ ถึง _END_ ของ _TOTAL_ ลำดับ",
        sInfoEmpty: "แสดง 0 ถึง 0 ของ 0 ลำดับ",
        sInfoFiltered: "(จากทั้งหมด _MAX_ ลำดับ)",
        sSearch: "ค้นหา :",
        oPaginate: {
          sFirst: "หน้าแรก",
          sLast: "หน้าสุดท้าย",
          sNext: "ถัดไป",
          sPrevious: "ก่อนหน้า"
        }
      }
    });
  }

  $(document).on("change", ".reference-select", function() {
    let reference = $(this).val();
    if (reference) {
      $(".data").DataTable().destroy();
      filter_data(reference);
    } else {
      $(".data").DataTable().destroy();
      filter_data();
    }
  });

  $(".reference-select").select2({
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
</script>