
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
          <a href="javascript:void(0)">Edit Plant(Office)</a>
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
              <div class="card-header">Edit Plant(Office)</div>
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
                <form action="<?php echo base_url('index.php/Master/Edit_Plant/'.$id);?>" method="POST">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">
                          <b>City(Office) name</b>
                        </label>
                        <div class="col-sm-8">
                          <input class="form-control input-rounded" name="plant_name" value="<?php if(!empty($plant_name)){echo $plant_name[0]['plant_name'];}?>" required>
                        </div>
                      </div>
                    </div>
                   </div>
                

                   <div class="form-group row">

                    <div class="col-sm-10">

                      <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to Update City(Office) Name ?');">Submit</button>



                      <a class="btn btn-warning" href="<?php echo base_url('Master/Plant_Master');?>"> ❮ Go Back</a>

                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-12">
          <div class="card">
            <div class="col-lg-12 bg-primary text-white" style="background-color:#1168f9!important;">
              <div class="card-header"></div>
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:auto; ">
                <table id="example" class=" table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                     <th>Sl No.</th>
                     <th>ID</th>
                      <th>Plant Name</th>
                      <th>Plant Email</th>
                      <th>Created By</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     <th>Sl No.</th>
                     <th>ID</th>
                      <th>Plant Name</th>
                      <th>Plant Email</th>
                      <th>Created By</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    <?php  $count=1;
                        if(!empty($plants)){
                        foreach($plants as $plant){ ?>
                        <tr>
                          <td><?= $count; ?></td>
                          <td><?= $plant['id']; ?></td>
                          <td><?= $plant['plant_name']; ?></td>
                          <td><?= $plant['plant_email']; ?></td>
                          <td><?= $plant['created_by']; ?></td>
                          
                          <td>
                            <!-- <a href="<?= base_url('Master/#/'.$dep['id']); ?>">
                               <button class="btn btn-danger" onClick="return doconfirm();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-trash-o "></i> Delete
                                </button>
                            </a>
                            <a href="<?= base_url('Master/#/'.$dep['id']); ?>">
                               <button class="btn btn-info" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> Edit
                                </button>
                            </a> -->
                          </td>
                        </tr>
                        <?php $count++; }} ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> -->
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
        ***********************************