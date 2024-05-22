<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CMS</title>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../assets/style-bootstrap/css/boostrap.min.css"> -->
</head>

<body id="style-3" style="background-color: #F5F5F5F5; "> 
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" id="style-3">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img" style="text-decoration: none; color:black;  ">
            <!-- <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" /> -->
            GoldStep Indonesia
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- <div style="width: 80%; border:0.1px solid rgb(229, 234, 239);"></div> -->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="" >
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">POST</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/konten" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Beranda</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/solusi" aria-expanded="false">
                <span>
                  <i class="ti ti-heart"></i>
                </span>
                <span class="hide-menu">Solusi</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/fitur" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Fitur</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/paketharga" aria-expanded="false">
                <span>
                  <i class="ti ti-receipt-2"></i>
                </span>
                <span class="hide-menu">Paket Harga</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/artikel" aria-expanded="false">
                <span>
                  <i class="ti ti-news"></i>
                </span>
                <span class="hide-menu">Artikel</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/tentangkami" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Tentang kami</span>
              </a>
            </li>
            <!--  -->
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper" id="style-3">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-light">
          <ul class="navbar-nav">
            
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="/profile" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-history fs-6"></i>
                      <p class="mb-0 fs-3">Riwayat</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-danger mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid" id="style-3" >
        <!-- konten disini -->
        <?php $this->renderSection('content') ?>
        <!-- akhir konten --> 
        <!-- ----------- -->
        <!-- footet -->
        <!-- <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
        </div> -->
        <!-- akhir footer -->
      </div>
    </div>
  </div>
  <!-- <script src="../node_modules/datatables.net-jqui/js/dataTables.jqueryui.min.js"></script> -->
<!-- <script src="../node_modules/datatables.net/js/dataTables.min.js"></script> -->
  <!-- <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <!-- <script src="../assets/js/app.min.js"></script> -->
  <!-- <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script> -->
  <!-- <script src="../assets/js/dashboard.js"></script> -->
</body>

</html>