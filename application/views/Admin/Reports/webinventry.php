<div class="content-body">
  <div class="row page-titles mx-0">
    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="javascript:void(0)">Web Inventry</a>
        </li>
        <li class="breadcrumb-item active">
          <a href="javascript:void(0)">Online Inventry</a>
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
              <div class="card-header">Online Inventry</div>
            </div>
            <div class="card-body">
              <div class="basic-form">
                <form action="<?php echo base_url('index.php/Report/webinventry');?>" method="POST">
                  <div class = "row">
                 
                    <div class="col-lg-6">
                      <div class="form-group row">
                      <label class="col-lg-4 col-form-label">
                        <b>Department</b>
                      </label>
                      <div class="col-lg-6">
                        <select name="department" id="department" class="form-control" >

                            <option value="">Select Department</option>

                            <?php if($depts){ foreach ($depts as $dept){?>

                            <option value="<?php echo $dept['id'] ?>" <?php if(!empty($department) && $dept['id'] == $department){ echo "selected"; }?> ><?php echo $dept['dep_name']; ?></option>

                            <?php }} ?>

                          </select>
                                              </div>
                    </div>
                 </div>
                    <div class="col-lg-6">
                       <div class="form-group row">
                      <label class="col-lg-4 col-form-label">
                        <b> Location</b>
                      </label>
                      <div class="col-lg-6">
                        <select name="sub_location"  id="sub_location" class="form-control" >

                            <option value="">Select  Location </option>

                              <?php if($locations){ foreach ($locations as $loc){?>

                            <option value="<?php echo $loc['id'] ?>" <?php if(!empty($location) && $loc['id'] == $location){ echo "selected"; }?> ><?php echo $loc['location_name']; ?></option>

                            <?php }} ?>

                          </select>
                       
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
              <div class="card-header">Online Inventry Data List</div>
              
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:auto; ">
                <table id="example" class=" table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                    
                      <th>Id</th>

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

                     <!-- <th>Unique ID</th>-->
                      <th>Remarks</th>
                      <th>Tag</th>

                      <th>Created By</th>

                      <th>Created At</th>

                  </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    
                     <th>Id</th>

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

                     <!-- <th>Unique ID</th>-->
                      <th>Remarks</th>
                      <th>Tag</th>

                      <th>Created By</th>

                      <th>Created At</th>

                  </tr>
                  </tfoot>
                  <tbody>
                    <?php  $count=1;
                        if(!empty($webinventry)){
                        foreach($webinventry as $row){ ?>
                        <tr>
                          <td><?= $count; ?></td>
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

                         <!-- <td><?= $row['UNIQUEID']; ?></td>-->
                         <td><?= $row['Remarks']; ?></td>
                         <td><?= $row['Tag']; ?></td>

                         <td><?= $row['created_by']; ?></td>

                         <td><?= date('m-d-Y H-m-s',strtotime($row['created_at'])); ?></td>
                         
                        
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
</div>
<!-- #/ container -->
</div>
