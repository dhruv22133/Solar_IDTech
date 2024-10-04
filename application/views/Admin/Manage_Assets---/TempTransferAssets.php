<!--**********************************

            Sidebar end

        ***********************************-->
<!--**********************************

            Content body start

        ***********************************-->
<link href='<?= base_url() ?>assets/Dropdown_smartseatch/jquery-3.2.1.min.js' rel='stylesheet' type='text/css'>
<script src='<?= base_url() ?>assets/Dropdown_smartseatch/select2/dist/js/select2.min.js' type='text/javascript'></script>
<link href='<?= base_url() ?>assets/Dropdown_smartseatch/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
<div class="content-body">
  <div class="row page-titles mx-0">
    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="javascript:void(0)">Dashboard</a> </li>
        <li class="breadcrumb-item"> <a href="javascript:void(0)">Manage Assets</a> </li>
        <li class="breadcrumb-item active"> <a href="javascript:void(0)">Mapp Temp Assets</a> </li>
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
              <div class="card-header">Temp Asset</div>
            </div>
            <div class="card-body">
              <div class="basic-form">
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert !</h4>
                    <?= validation_errors();?>
                      <?= isset($msg)? $msg: ''; ?>
                  </div>
                  <?php endif; ?>
              <?php if($this->session->flashdata('msg') != ''): ?>
            <div class="alert alert-success flash-msg alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4> Success !</h4>
              <?= $this->session->flashdata('msg'); ?>
            </div>
            <?php endif; ?>
              <?php if($this->session->flashdata('faliour') != ''): ?>
                <div class="alert alert-danger flash-msg alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4> Error !</h4>
                  <?= $this->session->flashdata('msg'); ?>
                </div>
                <?php endif; ?>
                <form action="<?php echo base_url('index.php/Assets/Search_TempAsset');?>" method="POST">
                  <div class="form-group row">
                    <label class="col-sm-1 col-form-label"> <b>Asset Code</b> </label>
                    <div class="col-sm-5">
                      <select name="asset_code"  id="asset_code" class="form-control input-rounded">
                        <option value="">Select Asset Code</option>
                        <?php if($asset_code){ foreach ($asset_code as $asset_code){?>
                          <option value="<?php echo $asset_code['asset_code'] ?>" <?php if(!empty($asset_code) && $asset_code['asset_code'] ==$asset_code ){echo "selected";}?>><?php echo $asset_code['asset_code']; ?></option>
                          <?php }} ?>
                        </select>
                    </div>
                      <label class="col-sm-1.5 col-form-label"> <b>Unique ID</b> </label>
                    <div class="col-sm-4">
                      <select name="UNIQUEID"  id="UNIQUEID" class="form-control input-rounded">
                        <option value="">Select Unique ID</option>
                        <?php if($UNIQUEID){ foreach ($UNIQUEID as $UNIQUEID){?>
                          <option value="<?php echo $UNIQUEID['UNIQUEID'] ?>" <?php if(!empty($UNIQUEID) && $UNIQUEID['UNIQUEID'] ==$UNIQUEID ){echo "selected";}?>><?php echo $UNIQUEID['UNIQUEID']; ?></option>
                          <?php }} ?>
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
            <script>
            function doconfirm() {
              job = confirm("Are you sure to delete Location permanently?");
              if(job != true) {
                return false;
              }
            }

            function docedit() {
              job = confirm("Are you sure to Map Asset with Tag ?");
              if(job != true) {
                return false;
              }
            }
            </script>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:auto; ">
                <table id="example" class=" table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                      <th>Sl No.</th>
                      <th>Asset Code</th>
                      <th>Unique ID</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Location </th>
                      <th>Department </th>
                      <th>Asset User</th>
                      <th>Asset Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Sl No.</th>
                      <th>Asset Code</th>
                      <th>Unique ID</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Location </th>
                      <th>Department </th>
                      <th>Asset User</th>
                      <th>Asset Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php  $count=1;

                    if(!empty($assetdata)){

                    foreach($assetdata as $loc){ ?>
                      <tr>
                        <td><?= $count; ?></td>
                        <td><?= $loc['asset_code']; ?></td>
                        <td><?= $loc['UNIQUEID']; ?></td>
                        <td><?= $loc['cat']; ?></td>
                        <td><?= $loc['Assetsubcategory']; ?></td>
                         <td><?= $loc['location']; ?></td>
                        <td><?= $loc['dep_name']; ?></td>
                        <td><?= $loc['asset_user']; ?></td>
                        
                        <td><?= $loc['status_name']; ?></td>
                        <td>
                          <!-- <a href="<?= base_url('#'.$loc['id']); ?>">
                            <button class="btn btn-danger" onClick="return doconfirm();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-trash-o "></i> Delete </button>
                          </a> -->
                          <a href="<?= base_url('index.php/Assets/AddTidTempasset/'.$loc['id']); ?>">
                            <button class="btn btn-info" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> Mapp With Tag </button>
                          </a>
                        </td>
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
  <!-- #/ container -->
</div>
<script type="text/javascript">
$("#asset_code").select2();
$("#UNIQUEID").select2();
</script>
<!--**********************************

            Content body end

        ***********************************-->
<!--**********************************

            Footer start

        ***********************************-->