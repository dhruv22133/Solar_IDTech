

<div class="background1">

  <div style=" background: #80a3df4d; width:100%;

                 ">

    <div class="content-body">

      <div class="container-fluid mt-3">

        <div class="row">

          <div class="col-lg-3">

            <div class="text-white bg-primary mb-3" style="background-color: #495057!important; border-radius:10px;">

              <div class="card-body">

                <a href="<?php echo base_url('index.php/Master/country_details');?>"><h3 class="card-title text-white">Total Country Name</h3>

                <div class="d-inline-block">
                  <h2 class="text-white"><?php if(!empty($Dashboard_count)){echo $Dashboard_count[0]['total_assets'];}else{echo "0";}?></h2>

                </div></a>

                <span class="float-right display-5 opacity-5">

                  <i class="fa fa-calendar"></i>

                </span>

              </div>

            </div>

          </div>

          <div class="col-lg-3">

            <div class="text-white bg-primary mb-3" style="background-color: #495057!important; border-radius:10px;">

              <div class="card-body">

                <a href="<?php echo base_url('index.php/Master/module_manufacture');?>"><h3 class="card-title text-white">Total Module Manufacturer</h3>

                <div class="d-inline-block">

                  <h2 class="text-white"><?php if(!empty($Dashboard_count)){echo $Dashboard_count[0]['tempassets'];}else{echo "0";}?></h2>

                </div>
              </a>

                <span class="float-right display-5 opacity-5">

                  <i class="fa fa-bars"></i>

                </span>

              </div>

            </div>

          </div>

          
          <div class="col-lg-3">

            <div class="text-white bg-primary mb-3" style="background-color: #495057!important; border-radius:10px;">

              <div class="card-body">

                <a href="<?php echo base_url('index.php/Master/cell_manufacture');?>"><h3 class="card-title text-white">Total Cell Manufacturer</h3>

                <div class="d-inline-block">

                  <h2 class="text-white"><?php if(!empty($Dashboard_count)){echo $Dashboard_count[0]['asset_types'];}else{echo "0";}?></h2>

                </div>
                </a>

                <span class="float-right display-5 opacity-5">

                  <i class="fa fa-shopping-basket"></i>

                </span>

              </div>

            </div>

          </div>
          <div class="col-lg-3">

            <div class="text-white bg-primary mb-3" style="background-color: #495057!important; border-radius:10px;">

              <div class="card-body">

                <a href="<?php echo base_url('index.php/Master/iec_certification');?>"><h3 class="card-title text-white">Total IEC Certificates</h3>

                <div class="d-inline-block">
                  <h2 class="text-white"><?php if(!empty($Dashboard_count)){echo $Dashboard_count[0]['total_deletedassets'];}else{echo "0";}?></h2>

                </div>
                </a>

                <span class="float-right display-5 opacity-5">
                  <i class="fa fa-address-book"></i>

                </span>

              </div>

            </div>

          </div>
           <div class="col-lg-3">

            <div class="text-white bg-primary mb-3" style="background-color: #495057!important; border-radius:10px;">

              <div class="card-body">

                <a href="<?php echo base_url('index.php/Master/module_name');?>"><h3 class="card-title text-white">Total Module Name</h3>

                <div class="d-inline-block">

                  <h2 class="text-white"><?php if(!empty($Dashboard_count)){echo $Dashboard_count[0]['total_pending_transfer_request'];}else{echo "0";}?></h2>

                </div>
                </a>

                <span class="float-right display-5 opacity-5">

                  <i class="fa fa-spinner"></i>

                </span>

              </div>

            </div>

          </div>

        </div>

        </div>
        <div class="container-fluid mt-3">

        <div class="row">

       

        </div>

        </div>

      </div>

      <!-- #/ container -->




    </div>

  </div>

</div>