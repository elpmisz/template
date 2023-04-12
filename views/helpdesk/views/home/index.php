<?php
$page = "helpdesk";
$group = "service";

include_once(__DIR__ . "/../../../../includes/header.php");
include_once(__DIR__ . "/../../../../includes/sidebar.php");
?>

<main id="main" class="main">
  <div class="row justify-content-center">
    <?php include_once(__DIR__ . "/../../../../includes/alert.php"); ?>
    <div class="col-xl-12">
      <div class="card shadow">
        <div class="card-header">
          <h4 class="text-center">ระบบแจ้งปัญหา</h4>
        </div>
        <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-xl-3 col-md-6">
              <a href="/helpdesk/manage" class="btn btn-sm btn-danger w-100">
                <i class="fa fa-file-lines pe-2"></i> จัดการระบบ
              </a>
            </div>
            <div class="col-xl-3 col-md-6">
              <a href="/helpdesk/create" class="btn btn-sm btn-primary w-100">
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