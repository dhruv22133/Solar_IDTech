<!--**********************************

            Content body start

        ***********************************-->
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="adminrolelisting">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
                            <div class="card-header">Edit User</div>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
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
                                <form class="form-valide" action="<?php echo base_url('index.php/Users/Edit_user/'.$id);?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" name="firstname" for="val-username"><b>First Name</b> <span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control input-rounded" id="firstname" name="firstname" value="<?php if(!empty($userdata)){echo $userdata[0]['first_name'];}?>" placeholder="Enter First Name.." required> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username"><b>Last Name</b> <span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control input-rounded" id="val-username" name="lastname" value="<?php if(!empty($userdata)){echo $userdata[0]['last_name'];}?>" placeholder="Enter Last Name.." required> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email"><b>User Email</b><span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="email" name="user_email" value="<?php if(!empty($userdata)){echo $userdata[0]['email'];}?>" class="form-control input-rounded" placeholder="Enter valid email.." readonly> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-password"><b>Mobile Number</b><span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="user_mobile" value="<?php if(!empty($userdata)){echo $userdata[0]['mobile_no'];}?>" class="form-control input-rounded" placeholder="Enter Mobile Number.." readonly> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-skill"> <b>Select Plant</b><span class="text-danger">*</span> </label>
                                        <div class="col-lg-9">
                                            <select name="plant" class="form-control input-rounded" required>
                                            <option value=" ">Select Plant</option>
                                            <?php if(!empty($plants)){ foreach ($plants as $plant){?>
                                            <option value="<?php echo $plant['id']; ?>" <?php if(!empty($userdata) && $plant['id'] == $userdata[0]['plant']){ echo "selected";}?>><?php echo $plant['plant_name']; ?></option>
                                            <?php }} ?>
                                          </select>
                                        </div>
                                    </div>-->
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-skill"> <b>Select Role</b><span class="text-danger">*</span> </label>
                                        <div class="col-lg-9">
                                            <select name="user_role" class="form-control input-rounded" required>
                                            <option value=" ">Select Role</option>
                                            <?php if(!empty($roles)){ foreach ($roles as $role){?>
                                            <option value="<?php echo $role['role_id'] ?>" <?php if(!empty($userdata) && $role['role_id'] == $userdata[0]['user_type']){ echo "selected";}?>><?php echo $role['role_name']; ?></option>
                                            <?php }} ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-skill"> <b>Select Status</b><span class="text-danger">*</span> </label>
                                        <div class="col-lg-9">
                                            <select name="user_status" class="form-control input-rounded" required>
                                            <option value="1" <?php if(!empty($userdata) && $userdata[0]['status'] =='1'){ echo "selected";}?>>Active</option>
                                            <option value="0" <?php if(!empty($userdata) && $userdata[0]['status'] =='0'){ echo "selected";}?>>Inactive</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label" for="val-username"><b>Password</b> <span class="text-danger"></span> </label>
                                                <div class="col-lg-9">
                                                    <input type="password" class="form-control input-rounded" id="password"minlength='6' name="password" placeholder="Enter Password.."> </div>
                                            </div>
                                        </div>
                                        <!---<div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username"><b>Confirm Password</b> <span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control input-rounded" id="con_password" name="con_password" placeholder="Enter Confirm Password"> </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group row">
                                        <div class="col-lg-8 ml-auto">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

        ***********************************