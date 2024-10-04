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
                            <div class="card-header">User Registration</div>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <?php if (isset($msg) || validation_errors() !== ''): ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-warning"></i> Alert !</h4>
                                        <?= validation_errors(); ?>
                                        <?= isset($msg) ? $msg : ''; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($this->session->flashdata('msg') != ''): ?>
                                    <div class="alert alert-success flash-msg alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4> Success !</h4>
                                        <?= $this->session->flashdata('msg'); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('faliour') != ''): ?>
                                    <div class="alert alert-danger flash-msg alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4> Error !</h4>
                                        <?= $this->session->flashdata('msg'); ?>
                                    </div>
                                <?php endif; ?>
                                <form class="form-valide" action="<?php echo base_url('index.php/UserManagement/UserRegistration'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" name="firstname" for="val-username"><b>First Name</b> <span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control input-rounded" id="firstname" name="firstname" placeholder="Enter First Name.." value="<?php echo set_value('firstname'); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username"><b>Last Name</b> <span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control input-rounded" id="val-username" name="lastname" value="<?php echo set_value('lastname'); ?>" placeholder="Enter Last Name.." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-email"><b>User Email</b><span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="email" name="user_email" class="form-control input-rounded" value="<?php echo set_value('user_email'); ?>" placeholder="Enter valid email.." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-password"><b>Mobile Number</b><span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="number" name="user_mobile" class="form-control input-rounded" minlength="10" maxlength="10" value="<?php echo set_value('user_mobile'); ?>" placeholder="Enter Mobile Number.." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-password"><b>User Name</b><span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="text" name="user_name" class="form-control input-rounded" value="<?php echo set_value('user_name'); ?>" placeholder="Enter User Name.." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-confirm-password"><b>Site Address</b><span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input class="form-control input-rounded" name="siteadd" value="<?php echo set_value('siteadd'); ?>" placeholder="Enter Site Address.." required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-skill"> <b>Select Role</b><span class="text-danger">*</span> </label>
                                        <div class="col-lg-9">
                                            <select name="user_role" class="form-control input-rounded" required>
                                            <option value=" ">Select Role</option>
                                            <?php if (!empty($roles)) {
                                                foreach ($roles as $role) { ?>
                                            <option value="<?php echo $role['role_id'] ?>"><?php echo $role['role_name']; ?></option>
                                            <?php }
                                            } ?>
                                          </select>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="val-skill"> <b>Select Status</b><span class="text-danger">*</span> </label>
                                        <div class="col-lg-9">
                                            <select name="user_status" class="form-control input-rounded" required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                          </select>
                                        </div>
                                    </div>-->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username"><b>Password</b> <span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control input-rounded" id="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,16}$" name="password" minlength="6" maxlength="20" placeholder="Enter Password.." required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username"><b>Confirm Password</b> <span class="text-danger">*</span> </label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control input-rounded" id="con_password" name="con_password" minlength="6" maxlength="20" placeholder="Enter Confirm Password" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label" for="val-username"><b>Choose Role</b> <span class="text-danger">*</span> </label>
                                                <div class="col-sm-8 mt-2">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="role" id="inlineRadio1" value="1" required>
                                                        <label class="form-check-label" for="inlineRadio1">Admin</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="role" id="inlineRadio2" value="0" required>
                                                        <label class="form-check-label" for="inlineRadio2">User</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

        ***********************************-->