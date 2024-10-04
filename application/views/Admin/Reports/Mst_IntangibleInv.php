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
          <a href="javascript:void(0)">Web inventry report</a>
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
            <div class="col-lg-12 bg-primary text-white" style="background-color:#0C044F!important;">
              <div class="card-header">Web inventry report</div>
            </div>
            <div class="card-body">
              <div class="basic-form">
                <form action="<?php echo base_url('index.php/Report/Mst_IntangibleInv');?>" method="POST">
                  <div class="form-group row">
                    <div class="col-lg-6">
                      <label class="col-lg-3 col-form-label">
                        <b>From Date</b>
                      </label>
                      <div class="col-lg-9">
                        <input type="date" class="form-control" name="from" value="<?php echo set_value('from'); ?>" placeholder="mm/dd/yyyy" required>
                                              </div>
                    </div>
                    <div class="col-lg-6">
                      <label class="col-sm-2 col-form-label">
                        <b>To Date</b>
                      </label>
                      <div class="col-lg-9">
                        <input type="date" class="form-control" name="todate" value="<?php echo set_value('todate'); ?>" placeholder="mm/dd/yyyy" required>
                       
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
            <div class="col-lg-12 bg-primary text-white" style="background-color:#0C044F!important;">
              <div class="card-header">Web Inventory </div>
              
            </div>
            <div class="card-body">
              <div class="table-responsive" style="overflow-x:auto; ">
                <table id="example" class=" table-striped table-bordered zero-configuration">
                  <thead>
                    <tr>
                     <th>Sl.No</th>
                     <!-- <th>Inventory Id</th>-->
                      <th>Inventory Date</th>
                      <th>Total</th>
                      <th>Found</th>
                      <th>Not Found</th>
                      <th>Created By</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Sl.No</th>
                     <!-- <th>Inventory Id</th>-->
                      <th>Inventory Date</th>
                      <th>Total</th>
                      <th>Found</th>
                      <th>Not Found</th>
                      <th>Created By</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    <?php  $count=1;
                        if(!empty($Inventry)){
                        foreach($Inventry as $row){ ?>
                        <tr>
                          <td><?= $count; ?></td>
                          <!--<td><?= $row['inventry_id']; ?></td>-->
                          <td><?= date('m-d-Y H-m-s',strtotime($row['inventary_date'])); ?></td>
                          <td><?= $row['total']; ?></td>
                          <td><?= $row['found']; ?></td>
                          <td><?= $row['notfound']; ?></td>
                          <td><?= $row['created_by']; ?></td>
                          
                          <td>
                          <a href="<?php echo base_url('index.php/Report/Detail_intangibleInv/').$row['inventry_id'];?>">
                                    <button class="btn btn-info"><i class="glyphicon glyphicon-eye"></i> <i class="fa fa-eye"></i> View
                                    </button></a>
                                    </td>
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
