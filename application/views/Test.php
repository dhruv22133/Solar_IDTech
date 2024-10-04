<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <title>Dashboard </title>
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/');?>images/logo/palo-fav.png">
      <!-- Pignose Calender -->
      <link href="<?php echo base_url('assets/');?>plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
      <!-- Chartist -->
      <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/chartist/css/chartist.min.css">
      <link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
      <!-- Custom Stylesheet -->
      <link href="<?php echo base_url('assets/');?>css/style.css" rel="stylesheet">
      <style>
         .background1 {
         /* ↓↓↓ the decorative CSS */
         width:auto;
         display: flex;
         align-items: center;
         justify-content: space-between;
         border-radius: 8px;
         overflow: hidden;
         /* ↓↓↓ the main CSS */
         background: url('<?php echo base_url('assets/');?>images/aboutus.jpg') no-repeat center / cover;
         z-index: 1;
         }
         .background1:before {
         /* ↓↓↓ the main CSS */
         position:relative;
         background: #80a3df4d;
         z-index: -1;
         }
      </style>
   </head>
   <body>
      <!--*******************
         Preloader start
         ********************-->
      <div id="preloader">
         <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
               <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
         </div>
      </div>
      <!--*******************
         Preloader end
         ********************-->
      <!--**********************************
         Main wrapper start
         ***********************************-->
      <div id="main-wrapper">
         <!--**********************************
            Nav header start
            ***********************************-->
         <div class="nav-header">
            <div class="brand-logo">
               <a href="index.html">
               <b class="logo-abbr"><img src="<?php echo base_url('assets/');?>images/logo/logo.png" alt=""> </b>
               <span class="logo-compact"><img src="<?php echo base_url('assets/');?>images/logo/logo.png" alt=""></span>
               <span class="brand-title">
               <img src="<?php echo base_url('assets/');?>images/logo/logo.png" alt="">
               </span>
               </a>
            </div>
         </div>
         <!--**********************************
            Nav header end
            ***********************************-->
         <!--**********************************
            Header start
            ***********************************-->
         <div class="header">
            <div class="header-content clearfix">
               <div class="nav-control">
                  <div class="hamburger">
                     <span class="toggle-icon"><i class="icon-menu"></i></span>
                  </div>
               </div>
               <div class="header-right">
                  <ul class="clearfix">
                     <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                           <span class="activity active"></span>
                           <img src="<?php echo base_url('assets/');?>images/user/1.png" height="40" width="40" alt="">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                           <div class="dropdown-content-body">
                              <ul>
                                 <li>
                                    <a href="app-profile.html"><i class="icon-user"></i> <span>Change Password</span></a>
                                 </li>
                                 <hr class="my-2">
                                 <li><a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
                              </ul>
                           </div>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <!--**********************************
            Header end ti-comment-alt
            ***********************************-->
         <!--**********************************
            Sidebar start
            ***********************************-->
         <div class="nk-sidebar">
            <div class="nk-nav-scroll">
               <ul class="metismenu" id="menu">
                  <li>
                     <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                     <i class="icon-speedometer menu-icon"></i><span class="nav-text">Home</span>
                     </a>
                     <ul aria-expanded="false">
                        <li><a href="index.html">Dashboard</a></li>
                        <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                     </ul>
                  </li>
                  <li class="mega-menu mega-menu-sm">
                     <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                     <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Admin & Role Listing</span>
                     </a>
                     <ul aria-expanded="false">
                        <li><a href="AdminRoleListing/UserList.html">View User</a></li>
                        <li><a href="AdminRoleListing/AddAdmin.html">Add User</a></li>
                        <li><a href="AdminRoleListing/ViewRoles.html">View Role</a></li>
                        <li><a href="AdminRoleListing/AddRole.html">Add Role</a></li>
                        <li><a href="AdminRoleListing/ChangePassword.html">Change My Password</a></li>
                     </ul>
                  </li>
                  <li>
                     <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                     <i class="icon-envelope menu-icon"></i> <span class="nav-text">Masters</span>
                     </a>
                     <ul aria-expanded="false">
                        <li><a href="Masters/LocationMaster.html">Location Master</a></li>
                        <li><a href="Masters/DepartmantMaster.html">Department Master</a></li>
                        <li><a href="Masters/AssetTypeMaster.html">Asset Type Master</a></li>
                        <li><a href="Masters/PlantMaster.html">Plant Master</a></li>
                        <li><a href="Masters/AssetClassMaster.html">Asset Class Master</a></li>
                        <li><a href="Masters/AssetStatusMaster.html">Asset Status Master</a></li>
                        <li><a href="Masters/CostCenterMaster.html">Cost Center Master</a></li>
                     </ul>
                  </li>
                  <li>
                     <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                     <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Manage Asset</span>
                     </a>
                     <ul aria-expanded="false">
                        <li><a href="ManageAsset/AssetRegistration.html">Add Asset</a></li>
                        <li><a href="ManageAsset/ViewAssets.html">View Asset</a></li>
                        <li><a href="ManageAsset/Bulk_Upload_Assets.html">Bulk Upload Assets</a></li>
                        <li><a href="ManageAsset/RemoveAssets.html">Manage Asset</a></li>
                     </ul>
                  </li>
                  <li>
                     <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                     <i class="icon-graph menu-icon"></i> <span class="nav-text">Report</span>
                     </a>
                     <ul aria-expanded="false">
                        <li><a href="Reports/Asset_Wise.html">Asset Wise</a></li>
                        <li><a href="Reports/AssetTransferReport.html">Asset Transfer</a></li>
                        <li><a href="Reports/Physical_Inventry.html">Physical Inventry</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
         <!--**********************************
            Sidebar end
            ***********************************-->
         <!--**********************************
            Content body start
            ***********************************-->
         <div  class="background1" >
            <div style=" background: #80a3df4d; width:100%;
               ">
               <div class="content-body" >
                  <div class="container-fluid mt-3">
                     <div class="row">
                        <div class="col-lg-3">
                           <div class="text-white bg-primary mb-3" style="background-color: #1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Total Counts of Assets</h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="text-white bg-primary mb-3" style="background-color: #1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Total Count of User </h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="text-white bg-primary mb-3" style="background-color:#1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Assets Count by Aging</h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="text-white bg-primary mb-3" style="background-color: #1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Asset Vehicles </h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-3">
                           <div class="text-white bg-primary mb-3" style="background-color:#1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Asset Furnitures & Fixtures</h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class=" text-white bg-primary mb-3" style="background-color: #1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Asset Plant & Equipment  </h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class=" text-white bg-primary mb-3" style="background-color:#1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Asset Computers and Hardwares</h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class=" text-white bg-primary mb-3" style="background-color:#1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Asset Computer Softwares</h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-3">
                           <div class=" text-white bg-primary mb-3" style="background-color:#1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Asset Leasehold Land </h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class=" text-white bg-primary mb-3" style="background-color:#1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Factory Building</h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class="text-white bg-primary mb-3" style="background-color:#1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Asset Offce Equipement</h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3">
                           <div class=" text-white bg-primary mb-3" style="background-color:#1168f985!important; border-radius:10px;">
                              <div class="card-body">
                                 <h3 class="card-title text-white">Spoc-Generated-IT assets</h3>
                                 <div class="d-inline-block">
                                    <h2 class="text-white">4565</h2>
                                 </div>
                                 <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- #/ container -->
               </div>
            </div>
         </div>
         <!--**********************************
            Content body end
            ***********************************-->
         <!--**********************************
            Footer start
            ***********************************-->
         <div class="footer" >
            <div class="copyright">
               <p>Copyright &copy; 2021 All rights reserved <a href="https://www.idsolutionsindia.com/"> ID Tech  Solution Pvt. Ltd.</a></p>
            </div>
         </div>
         <!--**********************************
            Footer end
            ***********************************-->
      </div>
      <!--**********************************
         Main wrapper end
         ***********************************-->
      <!--**********************************
         Scripts
         ***********************************-->
      <script src="<?php echo base_url('assets/');?>plugins/common/common.min.js"></script>
      <script src="<?php echo base_url('assets/');?>js/custom.min.js"></script>
      <script src="<?php echo base_url('assets/');?>js/settings.js"></script>
      <script src="<?php echo base_url('assets/');?>js/gleek.js"></script>
      <script src="<?php echo base_url('assets/');?>js/styleSwitcher.js"></script>
      <!-- Chartjs -->
      <script src="<?php echo base_url('assets/');?>plugins/chart.js/Chart.bundle.min.js"></script>
      <!-- Circle progress -->
      <script src="<?php echo base_url('assets/');?>plugins/circle-progress/circle-progress.min.js"></script>
      <!-- Datamap -->
      <script src="<?php echo base_url('assets/');?>plugins/d3v3/index.js"></script>
      <script src="<?php echo base_url('assets/');?>plugins/topojson/topojson.min.js"></script>
      <script src="<?php echo base_url('assets/');?>plugins/datamaps/datamaps.world.min.js"></script>
      <!-- Morrisjs -->
      <script src="<?php echo base_url('assets/');?>plugins/raphael/raphael.min.js"></script>
      <script src="<?php echo base_url('assets/');?>plugins/morris/morris.min.js"></script>
      <!-- Pignose Calender -->
      <script src="<?php echo base_url('assets/');?>plugins/moment/moment.min.js"></script>
      <script src="<?php echo base_url('assets/');?>plugins/pg-calendar/js/pignose.calendar.min.js"></script>
      <!-- ChartistJS -->
      <script src="<?php echo base_url('assets/');?>plugins/chartist/js/chartist.min.js"></script>
      <script src="<?php echo base_url('assets/');?>plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
      <script src="<?php echo base_url('assets/');?>js/dashboard/dashboard-1.js"></script>
   </body>
</html>