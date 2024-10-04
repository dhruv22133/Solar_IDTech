<!--**********************************
   Sidebar end
   
   ***********************************-->
<!--**********************************
   Content body start
   
   ***********************************-->
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
               <a href="javascript:void(0)">View Assets</a>
            </li>
         </ol>
      </div>
   </div>
   <!-- row -->
   <div class="ViewAssets">
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
               <div class="card">
                  <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
                     <div class="card-header">Search Assets</div>
                  </div>
                  <div class="card-body">
                     <div class="basic-form">
                        <form action="<?php echo base_url('ManageAssets/ManageAsset');?>" method="POST">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">
                                    <b>Tag ID</b>
                                    </label>
                                    <div class="col-sm-8">
                                       <input class="form-control input-rounded"name="tagid" name="tagid" value="<?php echo set_value('tagid'); ?>" required>
                                    </div>
                                 </div>
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
                     <div class="card-header">View Assets</div>
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
                           <thead>
                              <tr>
                                 <th>Id</th>
                                 <th>Action</th>
                      <th>Tag Id</th>
                      <th>Asset Name</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Value</th>
                      <th>Invoice NO.</th>
                      <th>Facility</th>
                      <th>Region</th>
                      <th>City</th>
                      <th>Serial No.</th>
                      <th>Date of Commissioning</th>
                      <th>Asset Category(Department)</th>
                      <th>Asset Type</th>
                      <th>Equipmement Model</th>
                       <th>Vendor</th>
                      <th>Under Warranty</th>
                      <th>Location</th>
                      <th>Equipment Brand</th>
                       <th>Date of Installation</th>
                        <th>Asset Code</th>
                         <th>Specification</th>
                      <th>Po Number</th>
                       <th>Asset Status</th>
                      <th> Username</th>
                      <th>Unique ID</th>
                      <th>Remarks</th>
                      <th>Created By</th>
                      <th>Created At</th>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
                                   <th>Id</th>
                                   <th>Action</th>
                      <th>Tag Id</th>
                      <th>Asset Name</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Value</th>
                      <th>Invoice NO.</th>
                      <th>Facility</th>
                      <th>Region</th>
                      <th>City</th>
                      <th>Serial No.</th>
                      <th>Date of Commissioning</th>
                      <th>Asset Category(Department)</th>
                      <th>Asset Type</th>
                      <th>Equipmement Model</th>
                       <th>Vendor</th>
                      <th>Under Warranty</th>
                      <th>Location</th>
                      <th>Equipment Brand</th>
                       <th>Date of Installation</th>
                        <th>Asset Code</th>
                         <th>Specification</th>
                      <th>Po Number</th>
                       <th>Asset Status</th>
                      <th> Username</th>
                      <th>Unique ID</th>
                      <th>Remarks</th>
                      <th>Created By</th>
                      <th>Created At</th>
                              </tr>
                           </tfoot>
                           <tbody>
                              <?php  $count=1;
                                 if(!empty($assets)){
                                 foreach($assets as $row){ ?>
                              <tr>
                                 <td><?= $count; ?></td>
                                  <td>
                                    <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "4") !== false){?>
                                    <a href="<?= base_url('index.php/Assets/Delete_Asset/'.$row['id']); ?>">
                                    <button class="btn btn-danger" onClick="return doconfirm();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-trash-o "></i> Delete
                                    </button></a>
                                    <?php } ?>
                                    <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "3") !== false){?>
                                    <a href="<?= base_url('index.php/Assets/Edit_Asset/'.$row['id']); ?>">
                                    <button class="btn btn-info" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> Edit
                                    </button></a>
                                    <?php } ?>
                                 </td>
                                <td><?= $row['tag_id']; ?></td>
                        <td><?= $row['asset_name']; ?></td>
                        <td><?= $row['cat']; ?></td>
                        <td><?= $row['Assetsubcategory']; ?></td>
                        <td><?= $row['value']; ?></td>
                        <td><?= $row['invoice_no']; ?></td>
                        <td><?= $row['facility']; ?></td>
                        <td><?= $row['region']; ?></td>
                        <td><?= $row['city']; ?></td>
                        <td><?= $row['device_sl_no']; ?></td>
                        <td><?= $row['date_of_commissioning']; ?></td>
                        <td><?= $row['dep_name']; ?></td>
                        <td><?= $row['type_name']; ?></td>
                        <td><?= $row['model']; ?></td>
                        <td><?= $row['vendor']; ?></td>
                        <td><?= $row['warranty']; ?></td>
                        <td><?= $row['location_name']; ?></td>
                        <td><?= $row['equipment_brand']; ?></td>
                        <td><?= $row['date_of_installation']; ?></td>
                        <td><?= $row['asset_code']; ?></td>
                    
                        <td><?= $row['Specification']; ?></td>
                        <td><?= $row['po_no']; ?></td>
                         <td><?= $row['status_name']; ?></td>
                        <td><?= $row['asset_user']; ?></td>
                        <td><?= $row['UNIQUEID']; ?></td>
                        <td><?= $row['Remarks']; ?></td>
                        <td><?= $row['created_by']; ?></td>
                        <td><?= $row['created_at']; ?></td>
                                
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
<!-- Dialog show event handler -->
<script>
   function doconfirm()
   
   {
   
       job=confirm("Are you sure to delete this asset permanently?");
   
       if(job!=true)
   
       {
   
           return false;
   
       }
   
   }
   
   
   
   function docedit()
   
   {
   
       job=confirm("Are you sure to Edit this asset ?");
   
       if(job!=true)
   
       {
   
           return false;
   
       }
   
   }
   
</script>
<!-- Dialog show event handler -->