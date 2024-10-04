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
          <a href="javascript:void(0)">Physical inventory report</a>
        </li>
      </ol>
    </div>
  </div>
  <!-- row -->
  <div class="backgroundassetsRegis">
    <div class="container-fluid">
      <div class="row">        
        </div>
        <div class="col-12">
          <div class="card">
            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
              <div class="card-header"><a href="<?php echo base_url('index.php/Report/Mst_Inv');?>"> <button style="margin-bottom: 10px" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</button></a></div>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:auto; ">
                <table id="example" class=" table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                     <th>Sl.No</th>
                       <th>Inventory Id</th>
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
                      <th>Scan Status</th>
                      <th>Scan At</th>
                  </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Sl.No</th>
                       <th>Inventory Id</th>
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
                      <th>Scan Status</th>
                      <th>Scan At</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    <?php  $count=1;
                        if(!empty($Inventry)){
                        foreach($Inventry as $row){ ?>
                        <tr>
                          <td><?= $count; ?></td>
                        <td><?= $row['inventry_id']; ?></td>
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
                        <td><?= $row['department']; ?></td>
                        <td><?= $row['asset_type']; ?></td>
                        <td><?= $row['model']; ?></td>
                        <td><?= $row['vendor']; ?></td>
                        <td><?= $row['warranty']; ?></td>
                        <td><?= $row['location']; ?></td>
                        <td><?= $row['equipment_brand']; ?></td>
                        <td><?= $row['date_of_installation']; ?></td>
                        <td><?= $row['asset_code']; ?></td>
                    
                        <td><?= $row['Specification']; ?></td>
                        <td><?= $row['po_no']; ?></td>
                         <td><?= $row['asset_status']; ?></td>
                        <td><?= $row['asset_user']; ?></td>
                       <!-- <td><?= $row['UNIQUEID']; ?></td>-->
                          <td><?= $row['scan_status']; ?></td>
                          <td><?= $row['scan_at']; ?></td>
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
<!--**********************************
            Content body end
        ***********************************-->
<!--**********************************
            Footer start
        ***********************************-->
