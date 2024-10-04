<body>

    <div id="main-wrapper">

        <!-- <div class="login-form-bg h-100 w-100" style="background-image: url('./assets/images/login/solar-panels-8593759_1920.png'); background-repeat: no-repeat;  /* Center and scale the image nicely */

background-position: center;

background-repeat: no-repeat;

background-size: cover;"> -->


            <div class="nav-header">
                <div class="brand-logo">
                    <a href="<?php echo base_url('Dashboard'); ?>"> <b class="logo-abbr"><img src="<?php echo base_url('assets/'); ?>images/logo/id-logo-160x32.png" alt=""> </b> <span class="logo-compact"><img src="<?php echo base_url('assets/'); ?>images/logo/palo-fav1.png" alt=""></span> <span class="brand-title">

                            &emsp;<img src="<?php echo base_url('assets/'); ?>images/logo/id-logo-160x32.png" height="36" style="float:left;" width="165" alt="">
                            <!--align="left" align='top' height="70" width="300"style="float:right;"-->
                        </span> </a>
                </div>
            </div>

            <div class="header">
                <div class="header-content clearfix">
                    <div class="nav-control">
                        <div class="hamburger"> <span class="toggle-icon"><i class="icon-menu"></i></span> </div>
                    </div>
                    <div class="header-right">
                        <ul class="clearfix">
                            <li class="icons dropdown">
                                <div class="user-img c-pointer position-relative" data-toggle="dropdown"> <span class="activity active"></span> <img src="<?php echo base_url('assets/'); ?>images/logo/cropped-id-tech-fvicon-1-32x32.jpg"><!--<img src="<?php echo base_url() . 'assets/images/logo/new-palo.jpg'; ?>" height="40" width="40" alt=""> --></div>
                                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li> <span>Welcome <?php echo $_SESSION['first_name']; ?></span></li>
                                            <hr class="my-2">
                                            <li> <a href="<?php echo base_url('index.php/UserManagement/ChangPassword'); ?>"><i class="icon-user"></i> <span>Change Password</span></a> </li>
                                            <hr class="my-2">
                                            <li><a href="<?php echo base_url('index.php/Auth/Logout'); ?>"><i class="icon-key"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <center>
                        <h2 style="color:#fff!important; padding-top: 22px;">Solar Tracking Solution</h2>
                    </center>
                </div>
            </div>
            <div class="nk-sidebar">
                <div class="nk-nav-scroll">
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="<?php echo base_url('index.php/Auth/Dashboard'); ?>"> <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span> </a>
                        </li>

                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false"> <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Admin & Role Listing</span> </a>
                            <ul aria-expanded="false">
                                <li><a href="<?php echo base_url('index.php/UserManagement/RegisterdUsers'); ?>">View User</a></li>

                                <?php if($_SESSION['user_type'] == 1) { ?> 
                                <li><a href="<?php echo base_url('index.php/UserManagement/UserRegistration'); ?>">User Registration</a></li>
                                <?php } ?>

                                <!--<li><a href="<?php echo base_url('index.php/UserManagement/RoleLists'); ?>">View Role</a></li>
                            <li><a href="<?php echo base_url('index.php/UserManagement/AddRole'); ?>">Add Role</a></li>-->
                                <li><a href="<?php echo base_url('index.php/UserManagement/ChangPassword'); ?>">Change My Password</a></li>
                            </ul>
                        </li>


                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false"> <i class="icon-envelope menu-icon"></i> <span class="nav-text">Masters</span> </a>
                            <ul aria-expanded="false">
                                <!-- <li><a href="<?php echo base_url('index.php/Master/Location'); ?>">Location Master</a></li> -->
                                <!-- <li><a href="<?php echo base_url('index.php/Master/Departmant'); ?>">Department Master</a></li>
                            <li><a href="<?php echo base_url('index.php/Master/Asset_Type'); ?>">Asset Type Master</a></li>
                            <li><a href="<?php echo base_url('index.php/Master/CityMaster'); ?>">City Master</a></li>
                            <li><a href="<?php echo base_url('index.php/Master/AssetClass'); ?>">Category  Master</a></li>
                            <li><a href="<?php echo base_url('index.php/Master/Assetsubcategory'); ?>">Sub Category  Master</a></li>
                            <li><a href="<?php echo base_url('index.php/Master/Asset_Status'); ?>">Asset Status Master</a></li>

                              <li><a href="<?php echo base_url('index.php/Master/vendor'); ?>">Vendor Master</a></li>
                                <li><a href="<?php echo base_url('index.php/Master/equipment_brand'); ?>">Equipment Brand Master</a></li>
                                  <li><a href="<?php echo base_url('index.php/Master/region'); ?>">Region Master</a></li> -->
                                <li><a href="<?php echo base_url('index.php/Master/country_details'); ?>">Country Details Master</a></li>
                                <li><a href="<?php echo base_url('index.php/Master/module_manufacture'); ?>">Module Manufacture Master</a></li>
                                <li><a href="<?php echo base_url('index.php/Master/cell_manufacture'); ?>">Cell Manufacture Master</a></li>
                                <li><a href="<?php echo base_url('index.php/Master/iec_certification'); ?>">IEC Certification Master</a></li>
                                <li><a href="<?php echo base_url('index.php/Master/module_name'); ?>">Module Name</a></li>
                                <li><a href="<?php echo base_url('index.php/Master/company_settings'); ?>">Company Settings</a></li>
                                <!--<li><a href="<?php echo base_url('index.php/Master/rfid_reader'); ?>">Rfid Reader Master</a></li>-->

                            </ul>
                        </li>

                        <li class="mega-menu mega-menu-sm">
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false"> <i class="icon-graph menu-icon"></i><span class="nav-text">Report</span> </a>
                            <ul aria-expanded="false">
                                <li><a href="<?php echo base_url('index.php/Report/Asset_Transfer'); ?>">Asset Transfer</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>