
        
<div class="content-body">

  <div class="row page-titles mx-0">

    <div class="col p-md-0">

      <ol class="breadcrumb">

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Dashboard</a>

        </li>

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">ManageAsset</a>

        </li>

        <li class="breadcrumb-item active">

          <a href="javascript:void(0)">Asset Registration</a>

        </li>

      </ol>

    </div>

  </div>

  <!-- row -->

  <div class="ViewAssets">

    <div class="container-fluid">

      <div class="row justify-content-center">

        <div class="col-lg-12">

          <div class="card">

            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">

              <div class="card-header">Asset Registration</div>

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

                <form class="form-valide" action="<?php echo base_url('index.php/ManageAssets/RegisterAssets');?>" method="post">

                  <div class="row">
                     <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Untagged Assets</b>

                        </label>

                        <div class="col-lg-6">

                          <div class="form-check">

                            <input class="form-check-input" id="non-tagable-assets" type="checkbox" name="non-tagable-assets" value="1">

                          </div>

                        </div>

                      </div>
                    </div>


                    <div class="col-lg-6">

                      <div class="form-group row" id="tag_id">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Tag Id<span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" name="tag_id" class="form-control input-rounded"  minlength="8" maxlength="24"value="<?php echo set_value('tag_id'); ?>" placeholder="Enter Tag ID" >

                        </div>

                      </div>

                    </div>
                  </div>
                     <div class="row">

                      <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Asset Name</b>

                        </label>

                        <div class="col-lg-6">

                           <input type="text" name="asset_name" class="form-control input-rounded" value="<?php echo set_value('asset_name'); ?>" placeholder="Enter Asset Name">

                          </div>

                        </div>

                      </div>

                  

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b> Category<span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                         <select name="cat"  id="cat" class="form-control input-rounded" required>

                            <option value="">Select Category</option>

                            <?php if($cat){ foreach ($cat as $cat){?>

                            <option value="<?php echo $cat['id'] ?>"><?php echo $cat['cat']; ?></option>

                            <?php }} ?>

                          </select>
                        </div>

                      </div>

                    </div>
                      </div>


                  <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Sub Category<span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">
                         <select name="Assetsubcategory"  id="Assetsubcategory" class="form-control input-rounded" required>

                            <option value="">Select Sub Category</option>

                            <?php if($subcat){ foreach ($subcat as $subcat){?>

                            <option value="<?php echo $subcat['id'] ?>"><?php echo $subcat['Assetsubcategory']; ?></option>

                            <?php }} ?>

                          </select>
                         
                        </div>

                      </div>

                    </div>

                
                    <div class="col-lg-6">

                      <div class="form-group row" >

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Value</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" name="value" class="form-control input-rounded"  value="<?php echo set_value('value'); ?>" placeholder="Enter  value">

                        </div>

                      </div>

                    </div>
                      </div>
                  <div class="row">

                      <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Invoice No.</b>

                        </label>

                          <div class="col-lg-6">

                           <input type="text" name="invoice_no" class="form-control input-rounded" value="<?php echo set_value('invoice_no'); ?>" placeholder="Enter invoice_no ">

                          </div>

                        </div>

                      </div>

                   

                    <div class="col-lg-6">

                      <div class="form-group row" id="tag_id">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Facility</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" name="facility" class="form-control input-rounded"  value="<?php echo set_value('facility'); ?>" placeholder="Enter  facility">

                        </div>

                      </div>

                    </div>
                     </div>
                     <div class="row">
                      <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Region</b>

                        </label>

                          <div class="col-lg-6">
                       
                           <select name="region"  id="region" class="form-control input-rounded" >

                            <option value="">Select Region</option>

                            <?php if($region){ foreach ($region as $region){?>

                            <option value="<?php echo $region['id'] ?>"><?php echo $region['region']; ?></option>

                            <?php }} ?>

                          </select>

                          </div>

                        </div>

                      </div>

                   

                    <div class="col-lg-6">

                      <div class="form-group row" id="tag_id">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>City</b>

                        </label>

                        <div class="col-lg-6">

                       <select name="city"  id="city" class="form-control input-rounded" >

                            <option value="">Select City</option>

                            <?php if($city){ foreach ($city as $city){?>

                            <option value="<?php echo $city['id'] ?>"><?php echo $city['city']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>
                     </div>
                     <div class="row"> 
                     <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b> Serial No<span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" name="device_sl_no" value="<?php echo set_value('device_sl_no'); ?>" placeholder=" Serial No.."required>

                        </div>

                      </div>

                    </div>

                   

                    <div class="col-lg-6">

                      <div class="form-group row" >

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Date of Commissioning</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="date" name="date_of_commissioning" class="form-control input-rounded"  value="<?php echo set_value('date_of_commissioning'); ?>" placeholder="Enter  date_of_commissioning">

                        </div>

                      </div>

                    </div>
                     </div>

                    <div class="row">

                      <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b> Department(Asset Category)<span class="text-danger">*</span></b>

                        </label>

                          <div class="col-lg-6"> 
                        
                                  <select name="department" id="department" class="form-control input-rounded" required>

                            <option value="">Select Department</option>

                            <?php if($depts){ foreach ($depts as $dept){?>

                            <option value="<?php echo $dept['id'] ?>"><?php echo $dept['dep_name']; ?></option>

                            <?php }} ?>

                          </select>

                          </div>

                        </div>

                      </div>

                   
                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Select Asset Type</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="Assettype" class="form-control input-rounded" id="Assettype">

                          <option value="">Select Asset Type</option>

                          <?php if($asset_type){ foreach ($asset_type as $assets){?>

                          <option value="<?php echo $assets['id']; ?>"><?php echo $assets['type_name']; ?></option>

                          <?php }} ?>

                        </select>

                        </div>

                      </div>

                    </div>
                     </div>

                    <div class="row">


                     <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b> Equipment Model<span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" name="model" value="<?php echo set_value('model'); ?>" placeholder="Equipment Model.."required>
                        </div>

                      </div>

                    </div>

                  

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Vendor</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="vendor"  id="vendor" class="form-control input-rounded" >

                            <option value="">Select Vendor</option>

                            <?php if($vendor){ foreach ($vendor as $vendor){?>

                            <option value="<?php echo $vendor['id'] ?>"><?php echo $vendor['vendor']; ?></option>

                            <?php }} ?>

                          </select>
                        </div>

                      </div>

                    </div>
                    </div>
                    <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Under Warranty <span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                          <input type="date" class="form-control input-rounded" id="warranty" name="warranty" value="<?php echo set_value('warranty'); ?>" placeholder="Enter warranty.." required>

                        </div>

                      </div>

                    </div>

                 

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Location</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="location" id="locationsel" class="form-control input-rounded" >

                            <option value="">Select Location</option>

                            <?php if($locations){ foreach ($locations as $loc){?>

                            <option value="<?php echo $loc['id'] ?>"><?php echo $loc['location_name']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>
                     </div>
                <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Equipment Brand<span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                         <select name="equipment_brand"  id="equipment_brand" class="form-control input-rounded" required>

                            <option value="">Select Equipment Brand</option>

                            <?php if($equipment_brand){ foreach ($equipment_brand as $equipment_brand){?>

                            <option value="<?php echo $equipment_brand['id'] ?>"><?php echo $equipment_brand['equipment_brand']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>

                 
                     <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Date of installation</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="date" class="form-control input-rounded" name="date_of_installation" value="<?php echo set_value('date_of_installation'); ?>" placeholder="date_of_installation ..">

                        </div>

                      </div>

                    </div>
                     </div>
                  <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Asset Code <span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" name="asset_code" value="<?php echo set_value('asset_code'); ?>" placeholder="asset_code .."required>

                        </div>

                      </div>

                    </div>
                

                      <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Specification<span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" id="Specification" name="Specification" value="<?php echo set_value('Specification'); ?>" placeholder="Specification.."required>

                        </div>

                      </div>

                    </div>
                      </div>

               <div class="row">

                        <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Po Number</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" id="po_no" name="po_no" value="<?php echo set_value('po_no'); ?>" placeholder="Po Number..">

                        </div>

                      </div>

                    </div>

                

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Select Asset Status<span class="text-danger">*</span></b>

                        </label>

                        <div class="col-lg-6">

                          <select name="asset_status"  id="asset_status" class="form-control input-rounded"required >

                            <option value="">Select Asset Status</option>

                            <?php if($status){ foreach ($status as $statusts){?>

                            <option value="<?php echo $statusts['id'] ?>"><?php echo $statusts['status_name']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>
                      </div>


                  <div class="row">


                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b> User Name</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" name="asset_user" value="<?php echo set_value('asset_user'); ?>" placeholder="Asset User Name..">

                        </div>

                      </div>

                    </div>

                 

                  <!--  <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Unique ID<span class="text-danger">*</span> </b>

                        </label>

                        <div class="col-lg-6">
                          
                            <input type="text" class="form-control  input-rounded" name="UNIQUEID" value="<?php echo set_value('UNIQUEID'); ?>" placeholder="UNIQUEID"required>
                        </div>

                      </div>

                    </div>-->
                     
                      <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Remarks<span class="text-danger">*</span> </b>

                        </label>

                        <div class="col-lg-6">
                          
                            <input type="text" class="form-control  input-rounded" name="Remarks" value="<?php echo set_value('Remarks'); ?>" placeholder="Remarks"required>
                        </div>

                      </div>

                    </div>

                  </div>
                  <div class="row">
                  <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Tag </b>

                        </label>

                        <div class="col-lg-6">
                          
                            <input type="text" class="form-control  input-rounded" name="Tag" value="<?php echo set_value('Tag'); ?>" placeholder="Tag">
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

<div class="container">

  <!-- row -->

  <!-- #/ container -->

</div>




<script>

// hide tag id on click non tagable asset 



$("#non-tagable-assets").on('click', function(){



    $("#tag_id").toggle();



})



// Smart Dropdown search

$("#Assettype").select2();

$("#Assetclass").select2();

$("#department").select2();

$("#plant").select2();

$("#locationsel").select2();

$("#asset_status").select2();

$("#costcenter").select2();

</script> 