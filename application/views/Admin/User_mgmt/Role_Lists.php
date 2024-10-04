<!--**********************************
            Sidebar end
        ***********************************-->
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
   <div class="row page-titles mx-0"><div class="col p-md-0"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Role Listing</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">View Roles</a></li></ol></div></div>
  <!-- row -->
  <div class="adminrolelisting">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
              <div class="card-header">View Roles</div>
            </div>
            <div class="card-body">
              <div>
                <div class="table-responsive" style="overflow-x:auto; ">
                  <table id="example" cellspacing="0" class="table table-striped table-bordered zero-configuration">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Role Name</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Id</th>
                        <th>Role Name</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php  $count=1;
                        if(!empty($roles) && $roles){
                        foreach($roles as $row){ ?>
                        <tr>
                          <td><?= $count; ?></td>
                          <td><?= $row['role_name']; ?></td>
                          <td>
                              <a href="<?= base_url('index.php/Users/Edit_Role/'.$row['role_id']); ?>" class="btn btn-info"><i class="fa fa-edit "></i></a>
                              <!-- <a href="<?= base_url('index.php/Admin/UpdateRole/'.$row['role_id']); ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a> --></td>
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
  <!--**********************************
            Content body end
        ***********************************-->
  <!--**********************************
            Footer start
        ***********************************-->