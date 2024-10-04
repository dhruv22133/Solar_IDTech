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
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" name="submit" class="btn btn-primary">Search</button>
                    </div>
                  </div>
                </form>
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
                      <th>Tag Id</th>
                      <th>Source Location</th>
                      <th>Source Plant</th>
                      <th>Destination Location</th>
                      <th>Destination Plant</th>
                      <th>Finance Asset Id</th>
                      <th>Departmant</th>
                      <th>Asset User</th>
                      <th>Description</th>
                      <th>It Asset Code</th>
                      <th>Asset Status</th>
                      <th>Transfer By</th>
                      <th>Transection Time</th>
                  </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Id</th>
                      <th>Tag Id</th>
                      <th>Source Location</th>
                      <th>Source Plant</th>
                      <th>Destination Location</th>
                      <th>Destination Plant</th>
                      <th>Finance Asset Id</th>
                      <th>Departmant</th>
                      <th>Asset User</th>
                      <th>Description</th>
                      <th>It Asset Code</th>
                      <th>Asset Status</th>
                      <th>Transfer By</th>
                      <th>Transection Time</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    <?php  $count=1;
                        if(!empty($assetdata)){
                        foreach($assetdata as $row){ ?>
                        <tr>
                          <td><?= $count; ?></td>
                          <td><?= $row['tagid']; ?></td>
                          <td><?= $row['source_loc']; ?></td>
                          <td><?= $row['source_plant']; ?></td>
                          <td><?= $row['desc_loc_name']; ?></td>
                          <td><?= $row['desc_plant_name']; ?></td>
                          <td><?= $row['finance_asset_id']; ?></td>
                          <td><?= $row['deptname']; ?></td>
                          <td><?= $row['asset_user']; ?></td>
                          <td><?= $row['description']; ?></td>
                          <td><?= $row['it_asset_code']; ?></td>
                          <td><?= $row['status_name']; ?></td>
                          <td><?php if($row['created_by'] == 'Handler'){echo "HandHeld Reader";}else{echo $row['created_by']; } ?></td>
                          <td><?= $row['created_at']; ?></td>
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