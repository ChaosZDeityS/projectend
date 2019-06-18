<body>
 <!--MENU -->
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Bus Support Manament System</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>


      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        
        
        <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <name style="text-align:right" >Hi !
                      <?php 
                       echo $_SESSION['userstaff'];
                    
                       ?> </name>
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
     
            
            <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>สรุปผล</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">ตรวจสอบ:</h6>
            <a class="dropdown-item" href="flotdrive.php">จำนวนรอบการขับ</a>
            <a class="dropdown-item" href="viewqueue.php">แสดงสถานะการให้บริการ</a>
      
           
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>การจัดการข้อมูล</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">ฐานข้อมูล:</h6>
            <a class="dropdown-item" href="tables.php">พนักงานขับรถ</a>
            <a class="dropdown-item" href="bustable.php">รถเมล์</a>
            <a class="dropdown-item" href="managebusline.php">สายรถเมล์</a>
            <a class="dropdown-item" href="managestation.php">จัดการจุดจอดรถเมล์</a>
            <a class="dropdown-item" href="manangebuslineandbusstop.php">สถานีกับสายรถเมล์</a>
            <a class="dropdown-item" href="manageassess.php">ระบบจัดการหัวข้อประเมิน</a>
  
          
            
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>ตรวจสอบ</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">ตรวจสอบ:</h6>
            <a class="dropdown-item" href="regislog.php">บันทึกลงเวลาขับรถเมล์</a>
            <a class="dropdown-item" href="requestbus.php">ร้องขอรถเมล์</a>
            <!-- <a class="dropdown-item" href="requestbususer.php">ร้องขอรถรถเมล์ผู้ใช้บริการ</a> -->
            <a class="dropdown-item" href="assessment.php">ประเมินรถเมล์</a>
            <a class="dropdown-item" href="assessmentdriver.php">ประเมินพนักงานขับรถ</a>
            <a class="dropdown-item" href="emergency.php">แจ้งเหตุ</a>
            
          </div>
        </li>
       
      </ul>
      </body>