<!--**********************************

            Sidebar end

        ***********************************-->

<!--**********************************

            Content body start

        ***********************************-->

<div class="content-body">

 <div class="row page-titles mx-0">

    <div class="col p-md-0">

      <ol class="breadcrumb">

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Dashboard</a>

        </li>

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Reports</a>

        </li>

        <li class="breadcrumb-item active">

          <a href="javascript:void(0)">Assets Transfer Report</a>

        </li>

      </ol>

    </div>

  </div>

  <!-- row -->

  <div class="backgroundassetsRegis">

    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-12">

          <div class="card">

            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">

              <div class="card-header">Assets Transfer Report</div>

            </div>

            <div class="card-body">

              <div class="basic-form">
              <fieldset style="border:1px solid #999; border-radius:8px;" class="flex-fill">
              <legend class="w-auto" style="text-align: center;">Assets Transfer Report</legend>
                <form action="<?php echo base_url('index.php/Reports/AssetTransfer');?>" method="POST">

                  <div class="form-group row">

                    <div class="col-lg-6">

                      <label class="col-lg-3 col-form-label">

                        <b>From Date</b>

                      </label>

                      <div class="input-group col-lg-9">

                        <input type="text" class="form-control mydatepicker input-rounded" name="from" value="<?php echo set_value('from'); ?>" placeholder="mm/dd/yyyy" required>

                        <span class="input-group-append">

                          <span class="input-group-text">

                            <i class="mdi mdi-calendar-check"></i>

                          </span>

                        </span>

                      </div>

                    </div>

                    <div class="col-lg-6">

                      <label class="col-sm-2 col-form-label">

                        <b>To Date</b>

                      </label>

                      <div class="input-group col-lg-9">

                        <input type="text" class="form-control mydatepicker input-rounded" name="todate" value="<?php echo set_value('todate'); ?>" placeholder="mm/dd/yyyy" required>

                        <span class="input-group-append">

                          <span class="input-group-text">

                            <i class="mdi mdi-calendar-check"></i>

                          </span>

                        </span>

                      </div>

                    </div>

                  </div>

                  <div class="form-group row ml-2">

                    <div class="col-sm-10">

                      <button type="submit" name="submit" class="btn btn-primary">Search</button>

                    </div>

                  </div>

                </form>
                </fieldset>
              </div>

            </div>

          </div>

        </div>

        <div class="col-12">

          <div class="card">

            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">

              <div class="card-header"></div>

            </div>

            <div class="card-body">

              <div class="table-responsive" style="overflow-x:auto; ">

                <table id="example" class=" table-striped table-bordered zero-configuration">

                  <thead>

                    <tr>

                     <th>Id</th>

                      <th>Serial Number</th>

                      <th>PV Module Name</th>

                      <th>PV Module Manufacturer</th>

                      <th>PV Module Country</th>

                      <th>PV Module Date</th>

                      <th>Cell Manufacturer</th> 

                      <th>Cell Country</th>

                      <th>Cell Date</th>

                      <th>W Max</th>

                      <th>V Max</th>

                      <th>I Max</th>
                      <th>Fill Factor</th>
                      <th>Certification Lab</th>
                      <th>Certification Date</th>
                      <th>Unique Id</th>
                      <th>Tag MFG</th>
                      <th>Created At</th>

                  </tr>

                  </thead>

                  <tfoot>

                    <tr>

                    <th>Id</th>

                      <th>Serial Number</th>

                      <th>PV Module Name</th>

                      <th>PV Module Manufacturer</th>

                      <th>PV Module Country</th>

                      <th>PV Module Date</th>

                      <th>Cell Manufacturer</th> 

                      <th>Cell Country</th>

                      <th>Cell Date</th>

                      <th>W Max</th>

                      <th>V Max</th>

                      <th>I Max</th>
                      <th>Fill Factor</th>
                      <th>Certification Lab</th>
                      <th>Certification Date</th>
                      <th>Unique Id</th>
                      <th>Tag MFG</th>
                      <th>Created At</th>

                  </tr>

                  </tfoot>

                  <tbody>

                    <?php  $count=1;

                        if(!empty($assetdata)){

                        foreach($assetdata as $row){ ?>

                        <tr>

                          <td><?= $count; ?></td>

                          <td><?= $row['serial_no']; ?></td>

                          <td><?= $row['pv_module_name']; ?></td>

                          <td><?= $row['pv_module_manufacturer']; ?></td>

                          <td><?= $row['pv_module_country']; ?></td>

                          <td><?= $row['pv_module_date']; ?></td>

                          <td><?= $row['cell_manufacturer']; ?></td>

                          <td><?= $row['cell_country']; ?></td>

                          <td><?= $row['cell_date']; ?></td>

                          <td><?= $row['w_max']; ?></td>
                          <td><?= $row['v_max']; ?></td>
                          <td><?= $row['i_max']; ?></td>
                          <td><?= $row['fill_factor']; ?></td>
                          <td><?= $row['certification_lab']; ?></td>
                          <td><?= $row['certification_date']; ?></td>
                          <td><?= $row['unique_id']; ?></td>
                          <td><?= $row['tag_mfg']; ?></td>
                          <td><?= $row['created_at']; ?></td>



                          <!-- <td><?php if($row['created_by'] == 'Handler'){echo "HandHeld Reader";}else{echo $row['created_by']; } ?></td>

                          <td><?= date('m-d-Y H-m-s',strtotime($row['created_at'])); ?></td> -->

                        </tr>

                        <?php $count++; }} ?>



                </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<!-- #/ container -->

</div>

<!--**********************************

            Content body end

        ***********************************-->

<!--**********************************

            Footer start

        ***********************************-->