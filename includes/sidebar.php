<?php
$page = (!empty($page) ? $page : "");
$group = (!empty($group) ? $group : "");
?>
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link <?php echo ($page === "index" ? "" : "collapsed") ?>" data-bs-target="#report" data-bs-toggle="collapse" href="#">
        <i class="fa fa-house"></i> <span>รายงาน</span>
        <i class="fa fa-chevron-down ms-auto"></i>
      </a>
      <ul id="report" class="nav-content <?php echo ($group === "report" ? "show" : "collapse") ?>">
        <li>
          <a class="nav-link <?php echo ($page === "aaa" ? "active" : "collapsed") ?>" href="/home">
            <i class="fa fa-circle"></i> <span>AAA</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($page === "bbb" ? "active" : "collapsed") ?>" href="/home">
            <i class="fa fa-circle"></i> <span>BBB</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($group === "user" ? "" : "collapsed") ?>" data-bs-target="#user" data-bs-toggle="collapse" href="#">
        <i class="fa fa-user"></i> <span>ข้อมูลผู้ใช้งาน</span>
        <i class="fa fa-chevron-down ms-auto"></i>
      </a>
      <ul id="user" class="nav-content <?php echo ($group === "user" ? "show" : "collapse") ?>">
        <li>
          <a class="nav-link <?php echo ($page === "profile" ? "active" : "collapsed") ?>" href="/user/profile">
            <i class="fa fa-circle"></i> <span>ข้อมูลส่วนตัว</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo ($group === "service" ? "" : "collapsed") ?>" data-bs-target="#service" data-bs-toggle="collapse" href="#">
        <i class="fa fa-list"></i> <span>บริการ</span>
        <i class="fa fa-chevron-down ms-auto"></i>
      </a>
      <ul id="service" class="nav-content <?php echo ($group === "service" ? "show" : "collapse") ?>">
        <li>
          <a class="nav-link <?php echo ($page === "helpdesk" ? "active" : "collapsed") ?>" href="/helpdesk">
            <i class="fa fa-circle"></i> <span>ระบบแจ้งปัญหา</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($page === "knowledge" ? "active" : "collapsed") ?>" href="/home">
            <i class="fa fa-circle"></i> <span>ระบบการเรียนรู้ด้วยตัวเอง</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($page === "preventive" ? "active" : "collapsed") ?>" href="/home">
            <i class="fa fa-circle"></i> <span>ระบบบำรุงรักษาอุปกรณ์</span>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link <?php echo ($group === "setting" ? "" : "collapsed") ?>" data-bs-target="#setting" data-bs-toggle="collapse" href="#">
        <i class="fa fa-file-lines"></i> <span>ตั้งค่าระบบ</span>
        <i class="fa fa-chevron-down ms-auto"></i>
      </a>
      <ul id="setting" class="nav-content <?php echo ($group === "setting" ? "show" : "collapse") ?> ">
        <li>
          <a class="nav-link <?php echo ($page === "users" ? "active" : "collapsed") ?>" href="/users">
            <i class="fa fa-circle"></i> <span>ข้อมูลผู้ใช้งาน</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($page === "asset" ? "active" : "collapsed") ?>" href="/asset">
            <i class="fa fa-circle"></i> <span>ข้อมูลทรัพย์สิน</span>
          </a>
        </li>
        <li>
          <a class="nav-link <?php echo ($page === "setting" ? "active" : "collapsed") ?>" href="/setting">
            <i class="fa fa-circle"></i> <span>ข้อมูลระบบ</span>
          </a>
        </li>
      </ul>
    </li>

  </ul>
</aside>