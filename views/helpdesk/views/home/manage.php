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
          <h4 class="text-center">จัดการระบบ</h4>
        </div>
        <div class="card-body">
          <div class="row justify-content-end">
            <div class="col-xl-3 col-md-6">
              <a href="/helpdesk/service" class="btn btn-sm btn-danger w-100">
                <i class="fa fa-file-lines pe-2"></i> จัดการบริการ
              </a>
            </div>
            <div class="col-xl-3 col-md-6">
              <a href="/helpdesk/service" class="btn btn-sm btn-success w-100">
                <i class="fa fa-file-lines pe-2"></i> จัดการสิทธิ์
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