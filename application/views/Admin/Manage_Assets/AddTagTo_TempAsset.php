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
            <li class="breadcrumb-item active"> <a href="javascript:void(0)">Tag Registration</a> </li>
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
                     <div class="card-header"> <a class="btn btn-warning" href="<?php echo base_url('index.php/Assets/Search_TempAsset');?>"><i class="fa fa-arrow-left"></i>  </a>Asset Map With Tag</div>
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
                        <form action="<?php echo base_url('index.php/Assets/AddTidTempasset/'.$id);?>" method="POST">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Tag ID</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="tagid" minlength="8" maxlength="24" value="<?php echo set_value('tagid'); ?>" required>
                                    </div>
                                 </div>
                              </div>
                         
                              <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Asset Code</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="asset_code" value="<?php if(!empty($assetdata)){ echo $assetdata[0]['asset_code'];}?>" readonly>
                                    </div>
                                 </div>
                              </div>
                            </div>
                            <div class="row">

                             <!-- <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Unique ID</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="UNIQUEID" value="<?php if(!empty($assetdata)){echo $assetdata[0]['UNIQUEID'];}?>" readonly>
                                    </div>
                                 </div>
                              </div>-->
                             
                               <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Department</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="dept" value="<?php if(!empty($assetdata)){ echo $assetdata[0]['dep_name'];}?>" readonly>
                                    </div>
                                 </div>
                              </div>
                              
                               <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Location</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="location" value="<?php if(!empty($assetdata)){ echo $assetdata[0]['location'];}?>" readonly>
                                    </div>
                                 </div>
                              </div>
                               </div>
                           <div class="row">

                              <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Category</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="cat" value="<?php if(!empty($assetdata)){echo $assetdata[0]['cat'];}?>" readonly>
                                    </div>
                                 </div>
                              </div>
                              
                           
                           
                              <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Sub Category</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="Assetsubcategory" value="<?php if(!empty($assetdata)){ echo $assetdata[0]['Assetsubcategory'];}?>" readonly>
                                    </div>
                                 </div>
                              </div>
                           
                              </div>
                            <div class="row">
                           
                              <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Asset User Name</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="assetuser" value="<?php if(!empty($assetdata)){ echo $assetdata[0]['asset_user'];}?>" readonly>
                                    </div>
                                 </div>
                              </div>
                           
                           
                              <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Asset Status</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="assetstatus" value="<?php if(!empty($assetdata)){echo $assetdata[0]['status_name'];}?>" readonly>
                                    </div>
                                 </div>
                              </div>
                           </div>
                       
                           <div class="form-group row">
                              <div class="col-sm-10">
                                 <button type="submit" name="submit" class="btn btn-primary"><li class="fa fa-upload"> Mapped Now </li> </button>
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