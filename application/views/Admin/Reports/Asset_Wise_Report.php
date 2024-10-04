

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

          <a href="javascript:void(0)">Reports</a>

        </li>

        <li class="breadcrumb-item active">

          <a href="javascript:void(0)">Asset Wise Report</a>

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

              <div class="card-header">Asset Wise Report</div>

            </div>

            <div class="card-body">

              <div class="basic-form">

                <form action="<?php echo base_url('index.php/Reports/AssetWise');?>" method="POST">

                  <div class="row">

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Tag Id</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" name="tag_id" value="<?php echo set_value('tag_id'); ?>" placeholder="Enter Tag Id..">

                        </div>

                      </div>

                    </div>

                  <!--  <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Unique ID</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" class="form-control input-rounded" value="<?php echo set_value('UNIQUEID'); ?>" name="UNIQUEID" placeholder="Enter UNIQUEID ..">

                        </div>

                      </div>

                    </div>-->

               

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-username">

                          <b>Asset Code</b>

                        </label>

                        <div class="col-lg-6">

                          <input type="text" name="asset_code" class="form-control input-rounded" id="asset_code" value="<?php echo set_value('asset_code'); ?>" placeholder="Enter  Asset Code..">

                        </div>

                      </div>

                    </div>
                       </div>

                  <div class="row">

                  

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Category</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="cat"  id="cat" class="form-control input-rounded">

                            <option value="">Select  Category</option>

                            <?php if($cat){ foreach ($cat as $cat){?>

                            <option value="<?php echo $cat['id']; ?>" <?php if(!empty($cat) && $cat['id'] == $cat){ echo "selected"; }?> ><?php echo $cat['cat']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                    </div>


                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Sub Category</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="Assetsubcategory" id="Assetsubcategory" class="form-control input-rounded">

                            <option value="">Select Sub Category</option>

                            <?php if($Assetsubcategory){ foreach ($Assetsubcategory as $Assetsubcategory){?>

                            <option value="<?php echo $Assetsubcategory['id'] ?>" <?php if(!empty($Assetsubcategory) && $Assetsubcategory['id'] == $Assetsubcategory){ echo "selected"; }?> ><?php echo $Assetsubcategory['Assetsubcategory']; ?></option>

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

                          <b>Department</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="department" id="department" class="form-control input-rounded">

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

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Location</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="location" id="locationsel" class="form-control input-rounded">

                            <option value="">Select Location</option>

                            <?php if($locations){ foreach ($locations as $loc){?>

                            <option value="<?php echo $loc['id'] ?>" <?php if(!empty($location) && $loc['id'] == $location){ echo "selected"; }?> ><?php echo $loc['location_name']; ?></option>

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

                          <b>Asset Type</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="Assettype" class="form-control input-rounded" id="Assettype">

                            <option value="">Select Asset Type</option>

                            <?php if($asset_type){ foreach ($asset_type as $assets){?>

                            <option value="<?php echo $assets['id']; ?>" <?php if(!empty($Assettype) && $assets['id'] == $Assettype){ echo "selected"; }?>><?php echo $assets['type_name']; ?></option>

                            <?php }} ?>

                          </select>

                        </div>

                      </div>

                  </div>

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>Asset Status</b>

                        </label>

                        <div class="col-lg-6">

                          <select name="asset_status"  id="asset_status" class="form-control input-rounded">

                            <option value="">Select Asset Status</option>

                            <?php if($status){ foreach ($status as $statusts){?>

                            <option value="<?php echo $statusts['id'] ?>" <?php if(!empty($asset_status) &&  $statusts['id'] == $asset_status){ echo "selected"; }?> ><?php echo $statusts['status_name']; ?></option>

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

                          <b>From Date</b>

                        </label>

                        <div class="col-lg-6">

                          <div class="input-group">

                            <input type="text" class="form-control mydatepicker input-rounded" name="frome" value="<?php echo set_value('frome'); ?>" placeholder="mm/dd/yyyy" required>

                            <span class="input-group-append">

                              <span class="input-group-text">

                                <i class="mdi mdi-calendar-check"></i>

                              </span>

                            </span>

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-6">

                      <div class="form-group row">

                        <label class="col-lg-4 col-form-label" for="val-skill">

                          <b>To Date</b>

                        </label>

                        <div class="input-group col-lg-6">

                          <input type="text" class="form-control mydatepicker input-rounded" name="todate" value="<?php echo set_value('todate'); ?>" placeholder="mm/dd/yyyy" required>

                          <span class="input-group-append">

                            <span class="input-group-text">

                              <i class="mdi mdi-calendar-check"></i>

                            </span>

                          </span>

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

              <div class="card-header"></div>

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

                    <!--  <th>Unique ID</th>-->
                      <th>Remarks</th>
                      <th>Tag</th>

                      <th>Created By</th>

                      <th>Created At</th>

                  </tr>

                  </tfoot>

                  <tbody>

                    <?php  $count=1;

                        if(!empty($assetdata)){

                        foreach($assetdata as $row){ ?>

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

  <!-- #/ container -->

</div>

<!--**********************************

            Content body end

        ***********************************-->

<!--**********************************

            Footer start

        ***********************************-->