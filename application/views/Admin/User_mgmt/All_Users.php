<!--**********************************
            Sidebar end
        ***********************************-->
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="row page-titles mx-0"><div class="col p-md-0"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin Role Listing</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">User List</a></li></ol></div></div>
           
  <div class="adminrolelisting">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
              <div class="card-header">User List</div>
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
              <div class="basic-form">
                <div class="table-responsive" style="overflow-x:auto; ">
                  <table id="example">
                    <thead>
                      <tr>
                       <th>Id</th>
                        <th>User Name</th>
                        <th>Mobile No</th>
                        <th>Email Id</th>
                        <th>Address</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>Id</th>
                        <th>User Name</th>
                        <th>Mobile No</th>
                        <th>Email Id</th>
                        <th>Address</th>
                        <th>Option</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        <?php  $count=1;
                            if(!empty($all_users) && $all_users){
                            foreach($all_users as $row){ ?>
                            <tr>
                              <td><?= $count; ?></td>
                              <td><?= $row['first_name']." ".$row['last_name']; ?></td>
                              <td><?= $row['mobile_no']; ?></td>
                              <td><?= $row['email']; ?></td>
                              <td><?= $row['address']; ?></td>
                             
                              

                              <td>
                                <!-- <a href="<?= base_url('index.php/Users/Edit_user/'.$row['id']); ?>" class="btn btn-info"><i class="fa fa-edit "></i> Edit</a> -->
                                <!-- <a href="<?= base_url('index.php/Admin/DeleteAdmin/'.$row['id']); ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td> -->
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
      <!-- #/ container -->
    </div>
  </div>
  <!--**********************************
            Content body end
        ***********************************-->