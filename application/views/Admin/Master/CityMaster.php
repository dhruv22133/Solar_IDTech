<!-- 
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
               <a href="javascript:void(0)">City Master</a>
            </li>
         </ol>
      </div>
   </div>
   
   <div class="backgroundassetsRegis">
      <div class="container-fluid">
         <div class="row">
            <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "9") !== false){?>
            <div class="col-lg-12">
               <div class="card">
                  <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
                     <div class="card-header">City Master</div>
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
                        <form action="<?php echo base_url('index.php/Master/CityMaster');?>" method="POST">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>City name</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded" name="city" value="<?php echo set_value('city'); ?>" required>
                                    </div>
                                 </div>
                              </div>
                             
                          
                           <div class="form-group row">
                              <div class="col-sm-10">
                                 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                              </div>
                           </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <?php }?>
            <div class="col-12">
               <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "10") !== false){?>
               <div class="card">
                  <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
                     <div class="card-header"></div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive" style="overflow-x:auto; ">
                        <script>
                           function doconfirm(){
                            job=confirm("Are you sure to delete City permanently?");
                            if(job!=true){
                              return false;
                            }
                          }
                          function docedit(){
                            job=confirm("Are you sure to Edit City name ?");
                            if(job!=true){
                              return false;
                            }
                          }
                        </script>
                        <table id="example" class=" table-striped table-bordered zero-configuration">
                           <thead>
                              <tr>
                                 <th>Sl No.</th>
                                 <th>ID</th>
                                <th>City Name</th>
                               
                                 <th>Created By</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
                                 <th>Sl No.</th>
                                 <th>ID</th>
                                 <th>City Name</th>
                               
                                 <th>Created By</th>
                                 <th>Action</th>
                              </tr>
                           </tfoot>
                           <tbody>
                              <?php  $count=1;
                                 if(!empty($city)){
                                 
                                 foreach($city as $city){ ?>
                              <tr>
                                 <td><?= $count; ?></td>
                                 <td><?= $city['id']; ?></td>
                                 <td><?= $city['city']; ?></td>
                               
                                 <td><?= $city['created_by']; ?></td>
                                 <td>
                                    <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "8") !== false){?>
                                    <a href="<?= base_url('Master/Delete_City/'.$city['id']); ?>">
                                    <button class="btn btn-danger" onClick="return doconfirm();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-trash-o "></i> Delete
                                    </button>
                                    </a>
                                    <?php } ?>
                                    <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "7") !== false){?>
                                    <a href="<?= base_url('Master/Edit_City/'.$city['id']); ?>">
                                    <button class="btn btn-info" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> Edit
                                    </button>
                                    </a>
                                    <?php } ?>
                                 </td>
                              </tr>
                              <?php $count++; }} ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
             <?php }?>
            </div>
         </div>
      </div>
   </div>
   
</div>
  -->