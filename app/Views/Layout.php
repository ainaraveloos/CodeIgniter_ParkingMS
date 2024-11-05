<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Parking Management System</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/lineicons.css')?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/materialdesignicons.min.css')?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.css')?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css')?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css')?>" >
  
  <style>
    
.spinner {
    border: 5px solid rgba(0, 0, 0, 0.1);
    border-left-color: #636767;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}
@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
  </style>
  
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->
    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
          <a href=""><b><img src="<?= base_url('assets/logo/logo.png');?>" width="150px" height="150px" alt=""/></b></a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item nav-item-has-children" >
            <a
              href="#0"
              class="collapsed text <?php echo(service('uri')->getSegment(1)=='/'||service('uri')->getSegment(1)=='Dashboard'||service('uri')->getSegment(1)=='Reports')? 'text-primary fs-6':'';?>"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_1"
              aria-controls="ddmenu_1"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                  <path
                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
                </svg>
              </span>
              <span class="text">Dashboard</span>
            </a>
            <ul id="ddmenu_1" class="collapse dropdown-nav">
              <li>
                <a href="<?=base_url('Dashboard')?>"> Statistic </a>
              </li>
              <li>
                <a href="<?=base_url('/Reports')?>">Reports</a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed text <?php echo(service('uri')->getSegment(1)=='Add_vehicle'||service('uri')->getSegment(1)=='Manage_vehicle')? 'text-primary fs-6':'';?>"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon" >
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11.8097 1.66667C11.8315 1.66667 11.8533 1.6671 11.875 1.66796V4.16667C11.875 5.43232 12.901 6.45834 14.1667 6.45834H16.6654C16.6663 6.48007 16.6667 6.50186 16.6667 6.5237V16.6667C16.6667 17.5872 15.9205 18.3333 15 18.3333H5.00001C4.07954 18.3333 3.33334 17.5872 3.33334 16.6667V3.33334C3.33334 2.41286 4.07954 1.66667 5.00001 1.66667H11.8097ZM6.66668 7.70834C6.3215 7.70834 6.04168 7.98816 6.04168 8.33334C6.04168 8.67851 6.3215 8.95834 6.66668 8.95834H10C10.3452 8.95834 10.625 8.67851 10.625 8.33334C10.625 7.98816 10.3452 7.70834 10 7.70834H6.66668ZM6.04168 11.6667C6.04168 12.0118 6.3215 12.2917 6.66668 12.2917H13.3333C13.6785 12.2917 13.9583 12.0118 13.9583 11.6667C13.9583 11.3215 13.6785 11.0417 13.3333 11.0417H6.66668C6.3215 11.0417 6.04168 11.3215 6.04168 11.6667ZM6.66668 14.375C6.3215 14.375 6.04168 14.6548 6.04168 15C6.04168 15.3452 6.3215 15.625 6.66668 15.625H13.3333C13.6785 15.625 13.9583 15.3452 13.9583 15C13.9583 14.6548 13.6785 14.375 13.3333 14.375H6.66668Z" />
                  <path
                    d="M13.125 2.29167L16.0417 5.20834H14.1667C13.5913 5.20834 13.125 4.74197 13.125 4.16667V2.29167Z" />
                </svg>
              </span>
              <span >Vehicles</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li>
                <a href="<?=base_url('/Add_vehicle')?>" class="<?php echo(service('uri')->getSegment(1)=='Add_vehicle')? 'text-primary font-weight-bold':'';?>" >New</a>
              </li>
              <li>
                <a href="<?=base_url('/Manage_vehicle')?>" class="<?php echo(service('uri')->getSegment(1)=='Manage_vehicle')? 'text-primary font-weight-bold':'';?>" >Liste</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('/Category')?>" class="<?php echo(service('uri')->getSegment(1)=='Category')? 'text-primary fs-6':'';?>">
              <span class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                </svg>
              </span>
              <span class="text">Parking Category </span>
            </a>
          </li>
          
          <span class="divider"><hr /></span>
          
          <li class="nav-item">
            <a href="<?=base_url('/Search_vehicle')?>"  class="<?php echo(service('uri')->getSegment(1)=='Search_vehicle')? 'text-primary fs-6':'';?>" >
              <span class="icon">
              <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M13.818 16.646c-1.273.797-2.726 1.256-4.202 1.354l-.537-1.983c2.083-.019 4.132-.951 5.49-2.724 2.135-2.79 1.824-6.69-.575-9.138l-1.772 2.314-1.77-6.469h6.645l-1.877 2.553c3.075 2.941 3.681 7.659 1.423 11.262l7.357 7.357-2.828 2.828-7.354-7.354zm-11.024-1.124c-1.831-1.745-2.788-4.126-2.794-6.522-.005-1.908.592-3.822 1.84-5.452 1.637-2.138 4.051-3.366 6.549-3.529l.544 1.981c-2.087.015-4.142.989-5.502 2.766-2.139 2.795-1.822 6.705.589 9.154l1.774-2.317 1.778 6.397h-6.639l1.861-2.478z"/>
              </svg>
              </span>
              <span class="text ">Search vehicle</span>
            </a>
          </li>

          <span class="divider"><hr /></span>

          <li class="nav-item">
            <a href="<?=base_url('/Setting')?>" class="<?php echo(service('uri')->getSegment(1)=='Setting')? 'text-primary fs-6':'';?>">
              <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16" width="20" height="20">
                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
              </svg>
              </span>
              <span class="text">Acount setting</span>
            </a>
          </li>

          <span class="divider"><hr /></span>
        
          <li class="nav-item">
            <a href="<?=base_url('/Logout')?>">
              <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" style="color: red;" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
            </svg>
              </span>
              <span class="text">Log Out</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-15">
                  <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- profile start -->
                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">
                      <div class="info">
                        <div class="image text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg>
                        </div>
                        <div>
                          <h6 class="fw-500"><?=session()->get('username')?></h6>
                          <p>Admin</p>
                        </div>
                      </div>
                    </div>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <li>
                      <div class="author-info flex items-center !p-1">
                        <div class="image text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg>
                        </div>
                        <div class="content ">
                          <h4 class="text-sm"><?=session()->get('username')?></h4>
                          <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs"
                            href="#"><?=session()->get('email')?></a>
                        </div>
                      </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?=base_url('/Setting')?>"> <i class="lni lni-gear-1"></i>Settings </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="<?=base_url('/Logout')?>"> <i class="lni lni-exit"></i> LogOut </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- ========== header end ========== -->



      <!-- ========== section start ========== -->
      <section class="section">
        <?= $this->renderSection('Content') ?>
      </section>
      <!-- ========== section end ========== -->
      <!-- ======== footer start =========== -->
    <footer class="footer mt-auto py-3 bg-light text-dark mt-4">
      <div class="container-fluid text-center">
        <div class="row">
          <div class="col-md-12">
            <p class="mb-0">© 2024 Parking Management System. All rights reserved.</p>
            <p class="mb-0">Developed by <a href="#" class="fw-bold">Me</a></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- ======== footer end =========== -->

    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?= base_url('assets/js/Chart.min.js>')?>"></script>
    <script src="<?= base_url('assets/js/dynamic-pie-chart.js')?>"></script>
    <script src="<?= base_url('assets/js/moment.min.js')?>"></script>
    <script src="<?= base_url('assets/js/fullcalendar.js')?>"></script>
    <script src="<?= base_url('assets/js/jvectormap.min.js')?>"></script>
    <script src="<?= base_url('assets/js/world-merc.js')?>"></script>
    <script src="<?= base_url('assets/js/polyfill.js')?>"></script>
    <script src="<?= base_url('assets/js/main.js')?>"></script>
</body>
</html>
