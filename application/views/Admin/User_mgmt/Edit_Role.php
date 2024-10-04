<!--**********************************
            Sidebar end
        ***********************************-->
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
  <div class="row page-titles mx-0"><div class="col p-md-0"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Role Listing</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Role</a></li></ol></div></div>
  <!-- row -->
  <div class="adminrolelisting">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
              <div class="card-header">Edit Role </div>
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
                <form action="<?php echo base_url('index.php/Users/Edit_Role/'.$id);?>" method="POST">
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Role Name</label>
                    <div class="col-sm-8">
                      <input class="form-control input-rounded" name="Role_name" value="<?= $mst_role['role_name']; ?>"  required>
                    </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                      <div class="form-check">
                        <?php foreach ($arr_mst_privileges as $key => $privilege) { ?>
                            <input  type="checkbox" dir="ltr" readonly  name="role_privileges[]" id="role_privileges" value="<?php echo $privilege['privileges_id'] ?>"   <?php
                            //if (isset($edit_id) && $edit_id != '') {
                                if(!empty($arr_role_privileges)){
                                if (in_array($privilege['privileges_id'], $arr_role_privileges)) {
                                    ?> checked <?php
                                       }
                                   }
                            //}
                                   ?>/> <?php echo ucwords($privilege['privilege_name']); ?><br />
                        <?php } ?>  
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                      <button type="submit" name="submit" class="btn btn-primary"> Update </button>
                    </div>
                  </div>
                </form>
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