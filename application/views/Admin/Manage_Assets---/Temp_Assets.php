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

        <li class="breadcrumb-item"> <a href="javascript:void(0)">Dashboard</a> </li>

        <li class="breadcrumb-item"> <a href="javascript:void(0)">Manage Asset</a> </li>

        <li class="breadcrumb-item active"> <a href="javascript:void(0)">View Assets</a> </li>

      </ol>

    </div>

  </div>

  <!-- row -->

  <div class="ViewAssets">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">

          <div class="card">

            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">

              <div class="card-header">View Assets</div>
              <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "4") !== false){?>
              <button style="margin-bottom: 10px" class="btn btn-danger delete_all float-right" id="delete_all" data-url="<?php echo base_url();?>index.php/Assets/deleteSelectedTemp">Delete All Selected <i class="fa fa-trash"></i></button>
              <?php }?>

            </div>

            <div class="card-body">

              <!-- Dialog show event handler -->

                <script>

                  function doconfirm()

                  {

                      job=confirm("Are you sure to delete temp asset permanently?");

                      if(job!=true)

                      {

                          return false;

                      }

                  }



                  function docedit()

                  {

                      job=confirm("Are you sure to Edit temp asset ?");

                      if(job!=true)

                      {

                          return false;

                      }

                  }

                  </script>

                <!-- Dialog show event handler -->   

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
                    <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "4") !== false){?>
                      <th width="50px"><input type="checkbox" id="master"></th>
                    <?php } ?>
                      <th>Sl No</th>
                       <th>Tag Id</th>
                      <th>Asset Name</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Value</th>
                      <th>Invoice NO.</th>
                      <th>Facility</th>
                      <th>Region</th>
                      <th>City</th>
                      <th>Equipment Model</th>
                      <th>Serial No.</th>
                      <th>Date of Commissioning</th>
                      <th>Asset Category(Department)</th>
                      <th>Asset Type</th>
                     
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $count=1;
                      if(!empty($assets)){
                      foreach($assets as $row){ ?>
                      <tr>
                      	<?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "4") !== false){?>
                        <td><input type="checkbox" class="sub_chk" data-id="<?php echo $row['id']; ?>"></td>
                        <?php }?>
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

                        <td><?= $row['model']; ?></td>

                        <td><?= $row['device_sl_no']; ?></td>

                        <td><?= $row['date_of_commissioning']; ?></td>

                        <td><?= $row['dept_name']; ?></td>

                        <td><?= $row['asset_type_name']; ?></td>

                      

                        <td><?= $row['vendor']; ?></td>

                        <td><?= $row['warranty']; ?></td>

                        <td><?= $row['loc_name']; ?></td>

                        <td><?= $row['equipment_brand']; ?></td>

                        <td><?= $row['date_of_installation']; ?></td>

                        <td><?= $row['asset_code']; ?></td>
                    
                        <td><?= $row['Specification']; ?></td>

                        <td><?= $row['po_no']; ?></td>

                        <td><?= $row['asset_status']; ?></td>

                        <td><?= $row['asset_user']; ?></td>

                        <td><?= $row['UNIQUEID']; ?></td>
                        <td><?= $row['Remarks']; ?></td>

                      

                        <!-- <td><?php foreach ($mst_role as $role){ if($row['role_id']==$role['role_id']){ echo $role['role_name'];}} ?></td>

                        <td><?php if($row['status']=='1'){?>

                         <div> <a style="cursor:default;" class="label label-success" href="javascript:void(0);">Active</a> </div>

                        <?php }elseif($row['status']=='0'){ ?>

                            <div> <a style="cursor:default;" class="label label-danger" href="javascript:void(0);">Inactive</a> </div>

                        <?php } ?>

                        </td>-->



                        <td>
                          <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "4") !== false){?>
                          <a href="<?= base_url('index.php/Assets/Delete_Temp_Asset/'.$row['id']); ?>">

                             <button class="btn btn-danger" onClick="return doconfirm();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-trash-o "></i> Delete

                              </button>

                          </a>
                        <?php } if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "3") !== false){?>

                          <a href="<?= base_url('index.php/Assets/Edit_Temp_Asset/'.$row['id']); ?>">

                             <button class="btn btn-info" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> Edit

                              </button>

                          </a>
                        <?php } ?>



                            <!-- <a href="<?= base_url('#'.$row['id']); ?>" class="btn btn-info"><i class="fa fa-edit "></i></a>

                            <a href="<?= base_url('#'.$row['id']); ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a></td> -->

                            <!-- <form method="POST" action="<?= base_url('Assets/Delete_Temp_Asset/'.$row['id']); ?>" accept-charset="UTF-8" style="display:inline">

                              <button class="btn btn-danger" type="button submit" data-toggle="modal" data-target="#confirmDelete" data-title="Delete Asset From Temp " data-message="Are you sure you want to delete this Asset permanently from Temp ?"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-trash-o "></i> Delete

                              </button>

                            </form> -->

                            

                          </td>

                      </tr>

                      <?php $count++; }} ?>

                  </tbody>

                  <tfoot>

                    <tr>
                    <?php if (!empty($privilledge) && strpos($privilledge[0]['pr_id'], "4") !== false){?>
                      <th></th>
                    <?php }?>
                       <th>Sl No</th>
                       <th>Tag Id</th>
                      <th>Asset Name</th>
                      <th>Category</th>
                      <th>Sub Category</th>
                      <th>Value</th>
                      <th>Invoice NO.</th>
                      <th>Facility</th>
                      <th>Region</th>
                      <th>City</th>
                      <th>Equipment Model</th>
                      <th>Serial No.</th>
                      <th>Date of Commissioning</th>
                      <th>Asset Category(Department)</th>
                      <th>Asset Type</th>
                      
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
                      <th>Action</th>

                    </tr>

                  </tfoot>

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
 <script type="text/javascript">
  $(document).ready(function () {
 
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))  
         {
            $(".sub_chk").prop('checked', true);  
         } else {  
            $(".sub_chk").prop('checked',false);  
         }  
        });
 
        $('.delete_all').on('click', function(e) {
 
            var allVals = [];  
            $(".sub_chk:checked").each(function() {  
                allVals.push($(this).attr('data-id'));
            });  
 
            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
 
                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  
 
                    var join_selected_values = allVals.join(","); 
 
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                          console.log(data);
                          $(".sub_chk:checked").each(function() {  
                              $(this).parents("tr").remove();
                          });
                          alert("Item Deleted successfully.");
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
 
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });
    });
</script>