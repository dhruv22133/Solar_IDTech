<div class="content-body">

 <div class="row page-titles mx-0">

    <div class="col p-md-0">

      <ol class="breadcrumb">

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Dashboard</a>

        </li>

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Manage Asset</a>

        </li>

        <li class="breadcrumb-item active">

          <a href="javascript:void(0)">Asset Transfer</a>

        </li>

      </ol>

    </div>

  </div>

  <!-- row -->

  <div class="ViewAssets">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <div class="card">

            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">

              <div class="card-header">Assets Transfer</div>

            </div>

            <div class="card-body">
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
              <div class="table-responsive" style="overflow-x:auto; ">

                <table id="example" class=" table-striped table-bordered zero-configuration">
                  <script>
                    function delcon() {
                      job = confirm("Do you want to cancel the transfer request ?");
                      if(job != true) {
                        return false;
                      }
                    }

                    function transfer() {
                      job = confirm("Do you want to Accept the transfer request  ?");
                      if(job != true) {
                        return false;
                      }
                    }
            </script>
                  <thead>

                    <tr>
                     <th>Id</th>
                     <th>Tag Id</th>
                     <th>Asset Code</th>
                    <!-- <th>Unique ID</th>-->
                     <th>Source Location</th>
                     <th>Source Department</th>
                     <th>Destination Location</th>
                     <th>Destination Department</th>
                     <th>Asset User</th>
                     <th>Asset Status</th>
                     <th>Remarks</th>
                     <th>Created At</th>
                     <th>Action</th>
                    </tr>

                  </thead>

                  <tfoot>

                    <tr>
                     <th>Id</th>
                     <th>Tag Id</th>
                     <th>Asset Code</th>
                    <!-- <th>Unique ID</th>-->
                     <th>Source Location</th>
                     <th>Source Department</th>
                     <th>Destination Location</th>
                     <th>Destination Department</th>
                     <th>Asset User</th>
                     <th>Asset Status</th>
                     <th>Remarks</th>
                     <th>Created At</th>
                     <th>Action</th>
                    </tr>

                  </tfoot>
                  
                  <tbody>
                    <?php  $count=1;
                    if(!empty($list)){

                      foreach($list as $row){ ?>
                        <tr>
                          <td><?= $count; ?></td>
                          <td><?= $row['tag_id']; ?></td>
                          <td><?= $row['asset_code']; ?></td>
                          
                          <td><?= $row['source_loc']; ?></td>
                          <td><?= $row['source_dept']; ?></td>
                          <td><?= $row['destination_loc']; ?></td>
                          <td><?= $row['desc_dept']; ?></td>
                          <td><?= $row['asset_user']; ?></td>
                          <td><?= $row['statusname']; ?></td>
                          <td><?= $row['Remarks']; ?></td>
                          <td><?= date('m-d-Y H-m-s',strtotime($row['created_at'])); ?></td>
                          <td><a href="<?= base_url('index.php/Assets/TransferAssetNow/'.$row['id']); ?>">
                            <button class="btn btn-info" onClick="return transfer();"><i class="fa fa-check-square-o"></i> Accept</button>
                          </a>
                          <a href="<?= base_url('index.php/Assets/Deletetransfermanufest/'.$row['id']); ?>">
                            <button class="btn btn-danger" onClick="return delcon();"><i class="fa fa-trash"></i> Deny </button>
                          </a></td>
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
