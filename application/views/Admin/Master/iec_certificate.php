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
               <a href="javascript:void(0)">IEC Certification Master</a>
            </li>
         </ol>
      </div>

   </div>
   <!-- row -->
   <div class="backgroundassetsRegis">
      <div class="container-fluid">
         <div class="row">
            <?php if($_SESSION['user_type'] == 1) { ?>
            <div class="col-lg-12">
               <div class="card">
                  <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
                     <div class="card-header">IEC Certification Master</div>
                  </div>
                  <div class="card-body">
                     <div class="basic-form">
                        <?php if (isset($msg) || validation_errors() !== ''): ?>
                           <div class="alert alert-danger alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h4><i class="icon fa fa-warning"></i> Alert !</h4>
                              <?= validation_errors(); ?>
                              <?= isset($msg) ? $msg : ''; ?>
                           </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('msg') != ''): ?>
                           <div class="alert alert-success flash-msg alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h4> Success !</h4>
                              <?= $this->session->flashdata('msg'); ?>
                           </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('faliour') != ''): ?>
                           <div class="alert alert-danger flash-msg alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <h4> Error !</h4>
                              <?= $this->session->flashdata('msg'); ?>
                           </div>
                        <?php endif; ?>
                        <fieldset style="border:1px solid #999; border-radius:8px;" class="flex-fill">
                           <legend class="w-auto" style="text-align: center;">IEC Certification</legend>
                           <form action="<?php echo base_url('index.php/Master/iec_certification'); ?>" method="POST" class="ml-2">
                              <div class="form-group row">
                                 <label class="col-sm-2 col-form-label">
                                    <b>Certification Name</b>
                                 </label>
                                 <div class="col-sm-6">
                                    <input class="form-control input-rounded" name="iec_certificate" value="<?php echo set_value('iec_certificate'); ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-sm-2 col-form-label">
                                    <b>Certification Date</b>
                                 </label>
                                 <div class="col-sm-6">
                                    <input class="form-control input-rounded date" type="date" name="iec_certificate_date" value="<?php echo set_value('iec_certificate_date'); ?>" required>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                 </div>
                              </div>
                           </form>
                        </fieldset>
                     </div>
                  </div>
               </div>
            </div>
         <?php } ?>
            <div class="col-12">
               <div class="card">
                  <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
                     <div class="card-header"></div>
                  </div>
                  <script>
                     function doconfirm()

                     {

                        job = confirm("Are you sure to delete IEC Certification?");

                        if (job != true)

                        {

                           return false;

                        }

                     }



                     function docedit()

                     {

                        job = confirm("Are you sure to Edit  IEC Certification ?");

                        if (job != true)

                        {

                           return false;

                        }

                     }
                  </script>

                  <div class="card-body">
                     <div class="table-responsive" style="overflow-x:auto; ">
                        <table id="example" class=" table-striped table-bordered zero-configuration">
                           <thead>
                              <tr>
                                 <th>Sl No.</th>
                                 <th>ID</th>
                                 <th>Certification Name</th>
                                 <th>Certification Date</th>
                                 <th>Created By</th>
                                 <?php if($_SESSION['user_type'] == 1) { ?>
                                 <th>Action</th>
                                 <?php } ?>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
                                 <th>Sl No.</th>
                                 <th>ID</th>
                                 <th>Certification Name</th>
                                 <th>Certification Date</th>
                                 <th>Created By</th>
                                 <?php if($_SESSION['user_type'] == 1) { ?>
                                 <th>Action</th>
                                 <?php } ?>
                              </tr>
                           </tfoot>
                           <tbody>
                              <?php $count = 1;
                              if (!empty($locations) && $locations) {

                                 foreach ($locations as $loc) { ?>
                                    <tr>
                                       <td><?= $count; ?></td>
                                       <td><?= $loc['id']; ?></td>
                                       <td><?= $loc['iec_certificate']; ?></td>
                                       <td><?= $loc['iec_certificate_date']; ?></td>
                                       <td><?= $loc['created_by']; ?></td>
                                       <?php if($_SESSION['user_type'] == 1) { ?>
                                       <td>

                                          <a href="<?= base_url('Master/Delete_iec_certification/' . $loc['id']); ?>">
                                             <button class="btn btn-danger" onClick="return doconfirm();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-trash-o "></i> Delete
                                             </button>
                                          </a>

                                          <a href="<?= base_url('Master/Edit_iec_certification/' . $loc['id']); ?>">
                                             <button class="btn btn-info" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> Edit
                                             </button>
                                          </a>

                                       </td>
                                       <?php } ?>
                                    </tr>
                              <?php $count++;
                                 }
                              } ?>
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