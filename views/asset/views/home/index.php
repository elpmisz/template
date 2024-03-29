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
          <h4 class="text-center">ข้อมูลทรัพย์สิน</h4>
        </div>
        <div class="card-body">
          <div class="row justify-content-between">
            <div class="col-xl-3 col-md-6 mb-2">
              <a href="/asset/type" class="btn btn-sm btn-danger w-100">
                <i class="fa fa-file-lines pe-2"></i> ประเภทอุปกรณ์
              </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
              <a href="/asset/location" class="btn btn-sm btn-info w-100">
                <i class="fa fa-file-lines pe-2"></i> สถานที่
              </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
              <a href="/asset/software" class="btn btn-sm btn-warning w-100">
                <i class="fa fa-file-lines pe-2"></i> โปรแกรม
              </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
              <a href="/asset/brand" class="btn btn-sm btn-primary w-100">
                <i class="fa fa-file-lines pe-2"></i> ยี่ห้อ
              </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
              <a href="/asset/checklist" class="btn btn-sm btn-danger w-100">
                <i class="fa fa-file-lines pe-2"></i> รายการตรวจสอบ
              </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-2">
              <a href="/asset/create" class="btn btn-sm btn-primary w-100">
                <i class="fa fa-plus pe-2"></i> เพิ่ม
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
include_once(__DIR__ . "/../../../../includes/footer.php");
?>