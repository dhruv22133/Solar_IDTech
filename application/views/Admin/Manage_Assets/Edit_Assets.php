

<!-- <link href='<?= base_url() ?>assets/Dropdown_smartseatch/jquery-3.2.1.min.js' rel='stylesheet' type='text/css'>

<script src='<?= base_url() ?>assets/Dropdown_smartseatch/select2/dist/js/select2.min.js' type='text/javascript'></script>

<link href='<?= base_url() ?>assets/Dropdown_smartseatch/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'> -->



<div class="content-body">

  <div class="row page-titles mx-0">

    <div class="col p-md-0">

      <ol class="breadcrumb">

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Dashboard</a>

        </li>

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">View Assets</a>

        </li>

        <li class="breadcrumb-item active">

          <a href="javascript:void(0)">Edit Asset</a>

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

              <div class="card-header"><a class="btn btn-warning" href="<?php echo base_url('index.php/ManageAssets/ManageAsset');?>"><i class="fa fa-arrow-left"></i>  </a>Edit Asset Details</div>

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

              <div class="form-validation">

                <form class="form-valide" action="<?php echo base_url('index.php/Assets/Edit_Asset/'.$id);?>" method="post">

                  <div class="row">

                    

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Tag Id</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" value="<?php if(!empty($assetdata)){echo $assetdata[0]['tag_id'];}?>" class="form-control input-rounded" id="val-username" name="ta_gid" minlength="8" maxlength="24" placeholder="Enter Tag Id.." readonly>

                        </div>

                      </div>

                    </div>

                
                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Asset Name</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" value="<?php if(!empty($assetdata)){echo $assetdata[0]['asset_name'];}?>" name="asset_name" placeholder="asset name." >

                        </div>

                      </div>

                    </div>
                      </div>

                  <div class="row">


                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Category</b>

                        </label>

                        <div class="col-lg-6">

                         <select class="form-control input-rounded" name="cat" disabled>

                            <option value="">Select Category</option>

                            <?php if($cat){ foreach ($cat as $cat){?>

                            <option value="<?php echo $cat['id'] ?>" <?php if($cat['cat'] == $assetdata[0]['cat']){ echo "selected";}?>><?php echo $cat['cat']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>

                

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Select Sub Category</b>

                        </label>

                        <div class="col-lg-6">
                          <select class="form-control input-rounded" name="Assetsubcategory" disabled>

                            <option value="">Select Sub Category</option>

                            <?php if($subcat){ foreach ($subcat as $subcat){?>

                            <option value="<?php echo $subcat['id'] ?>" <?php if($subcat['Assetsubcategory'] == $assetdata[0]['Assetsubcategory']){ echo "selected";}?>><?php echo $subcat['Assetsubcategory']; ?></option>

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

                          <b>Value</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" name="value" value="<?php if(!empty($assetdata)){echo $assetdata[0]['value'];}?>" placeholder="Asset value.." >

                        </div>

                      </div>

                    </div>

                 

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Invoice No.</b>

                        </label>

                        <div class="col-lg-6">
                        <input type="text" class="form-control input-rounded" name="invoice_no" value="<?php if(!empty($assetdata)){echo $assetdata[0]['invoice_no'];}?>" placeholder=" invoice_no.." >

                        </div>

                      </div>

                    </div>

                     </div>
                   <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Facility</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" name="facility" value="<?php if(!empty($assetdata)){echo $assetdata[0]['facility'];}?>" placeholder=" facility.." >

                        </div>

                      </div>

                    </div>

                

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Region</b>

                        </label>

                        <div class="col-lg-6">
                      <select class="form-control input-rounded" name="region" disabled>

                            <option value="">Select Region</option>

                            <?php if($region){ foreach ($region as $region){?>

                            <option value="<?php echo $region['id'] ?>" <?php if($region['region'] == $assetdata[0]['region']){ echo "selected";}?>><?php echo $region['region']; ?></option>

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

                          <b>City</b>

                        </label>

                        <div class="col-lg-6">

                          <select class="form-control input-rounded" name="city" disabled>

                            <option value="">Select City</option>

                            <?php if($city){ foreach ($city as $city){?>

                            <option value="<?php echo $city['id'] ?>" <?php if($city['city'] == $assetdata[0]['city']){ echo "selected";}?>><?php echo $city['city']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>
                      <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Serial No.</b>

                        </label>

                        <div class="col-lg-6">

                        
                          <input type="text" class="form-control input-rounded" value="<?php if(!empty($assetdata)){echo $assetdata[0]['device_sl_no'];}?>" name="device_sl_no" placeholder=" Serial No.."readonly>

                        </div>

                      </div>

                    </div>


                  </div>



                  <div class="row">
                     <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Date of Commissioning</b>

                        </label>

                        <div class="col-lg-6">

                        
                          <input type="date" class="form-control input-rounded" value="<?php if(!empty($assetdata)){echo $assetdata[0]['date_of_commissioning'];}?>" name="date_of_commissioning" placeholder=" Date of Commissioning....">

                        </div>

                      </div>

                    </div>
                      <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Asset Category (Department)</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="department" id="department" class="form-control input-rounded" disabled>

                          <option value="">Select Department</option>

                          <?php if($depts){ foreach ($depts as $dept){?>

                          <option value="<?php echo $dept['id'] ?>" <?php if($dept['id'] == $assetdata[0]['department']){ echo "selected";}?>><?php echo $dept['dep_name']; ?></option>

                          <?php }} ?>

                        </select>

                        </div>

                      </div>

                    </div>
                  </div>
                  <div class="row">


                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Select Asset Type</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="Assettype" class="form-control input-rounded" id="Assettype" disabled>

                            <option value="">Select Asset Type</option>

                            <?php if($asset_type){ foreach ($asset_type as $assets){?>

                            <option value="<?php echo $assets['id']; ?>" <?php if($assets['id'] == $assetdata[0]['asset_type']){ echo "selected";}?>><?php echo $assets['type_name']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b> Equipment Model</b>

                        </label>

                        <div class="col-lg-6">

                        
                          <input type="text" class="form-control input-rounded" name="model" value="<?php if(!empty($assetdata)){echo $assetdata[0]['model'];}?>" placeholder=" Equipment Model.."readonly>

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Vendor </b>

                        </label>

                        <div class="col-lg-6">

                           <select class="form-control input-rounded" name="vendor" >

                            <option value="">Select Vendor</option>

                            <?php if($vendor){ foreach ($vendor as $vendor){?>

                            <option value="<?php echo $vendor['id'] ?>" <?php if($vendor['vendor'] == $assetdata[0]['vendor']){ echo "selected";}?>><?php echo $vendor['vendor']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>


                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Under Warranty </b>

                        </label>

                        <div class="col-lg-6">

                          <input type="date" class="form-control input-rounded" name="warranty" value="<?php if(!empty($assetdata)){echo $assetdata[0]['warranty'];}?>" placeholder="Under Warranty .."required>

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="row">

                 <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Location</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="location" id="locationsel" class="form-control input-rounded" >

                            <option value="">Select Location</option>

                            <?php if($locations){ foreach ($locations as $loc){?>

                            <option value="<?php echo $loc['id'] ?>" <?php if($loc['id'] == $assetdata[0]['location']){ echo "selected";}?>><?php echo $loc['location_name']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Equipment Brand</b>

                        </label>

                        <div class="col-lg-6">

                          <select class="form-control input-rounded" name="equipment_brand" disabled>

                            <option value="">Select Equipment Brand</option>

                            <?php if($equipment_brand){ foreach ($equipment_brand as $equipment_brand){?>

                            <option value="<?php echo $equipment_brand['id'] ?>" <?php if($equipment_brand['equipment_brand'] == $assetdata[0]['equipment_brand']){ echo "selected";}?>><?php echo $equipment_brand['equipment_brand']; ?></option>

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

                          <b>Date of installation</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="date" class="form-control input-rounded" value="<?php if(!empty($assetdata)){echo $assetdata[0]['date_of_installation'];}?>" name="date_of_installation" placeholder="Enter Date of installation..">

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Asset Code </b>

                        </label>

                        <div class="col-lg-6">

                        
                            <input type="text" class="form-control  input-rounded" name="asset_code" value="<?php if(!empty($assetdata)){echo $assetdata[0]['asset_code'];}?>" placeholder="Asset Code"readonly>

                          

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Specification</b>

                        </label>

                        <div class="col-lg-6">

                       
                            <input type="text" class="form-control  input-rounded" name="Specification" value="<?php if(!empty($assetdata)){echo $assetdata[0]['Specification'];}?>" placeholder=" Specification"required>

                        </div>

                      </div>

                    </div>

                  <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Po Number</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" name="po_no" value="<?php if(!empty($assetdata)){echo $assetdata[0]['po_no'];}?>" placeholder="Po Number..">

                        </div>

                      </div>

                    </div>


                  </div>

                 <div class="row">
               

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Select Asset Status</b>

                        </label>

                        <div class="col-lg-6">
                          <select class="form-control input-rounded" name="asset_status" required>

                            <option value="">Select Asset Status</option>

                            <?php if($status){ foreach ($status as $statusts){?>

                            <option value="<?php echo $statusts['id'] ?>" <?php if($statusts['status_name'] == $assetdata[0]['asset_status']){ echo "selected";}?>><?php echo $statusts['status_name']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>

                 
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-username">
                          <b> User Name</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" value="<?php if(!empty($assetdata)){echo $assetdata[0]['asset_user'];}?>" name="asset_user" placeholder=" User Name..">
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                   <!-- <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-username">
                          <b>Unique ID</b>
                        </label>
                        <div class="col-lg-6">
                        
                            <input type="text" class="form-control input-rounded" value="<?php if(!empty($assetdata)){echo $assetdata[0]['UNIQUEID'];}?>" name="UNIQUEID" placeholder="Enter UNIQUEID.."readonly>
                         
                        </div>
                      </div>
                    </div>-->
                     <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-lg-4 col-form-label" for="val-username">
                          <b>Remarks</b>
                        </label>
                        <div class="col-lg-6">
                        
                            <input type="text" class="form-control input-rounded" value="<?php if(!empty($assetdata)){echo $assetdata[0]['Remarks'];}?>" name="Remarks" placeholder="Enter Remarks.."required>
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

<div class="container">

  <!-- row -->

  <!-- #/ container -->

</div>



<script type="text/javascript">

/*$("#Assettype").select2();

$("#Assetclass").select2();

$("#department").select2();

$("#plant").select2();

$("#locationsel").select2();

$("#asset_status").select2();

$("#costcenter").select2();*/

</script>