
<div class="content-body">
   <div class="row page-titles mx-0">
      <div class="col p-md-0">
         <ol class="breadcrumb">
            <li class="breadcrumb-item">
               <a href="javascript:void(0)">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
               <a href="javascript:void(0)">Masters</a>
            </li>
            <li class="breadcrumb-item active">
               <a href="javascript:void(0)">Edit  Category</a>
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
                     <div class="card-header">Edit Category</div>
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
                        <form action="<?php echo base_url('index.php/Master/Edit_AssetClass/').$id;?>" method="POST">
                           <div class="row">
                             
                              <div class="col-lg-12">
                                 <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">
                                    <b>Category Name </b>
                                    </label>
                                    <div class="col-lg-8">
                                       <input class="form-control input-rounded" name="cat" value="<?php if(!empty($cat)){echo $cat[0]['cat'];}?>" required>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-sm-10">
                                 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-warning" href="<?php echo base_url('Master/Asset_Class_master');?>"> ❮ Go Back</a>
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
</div>

