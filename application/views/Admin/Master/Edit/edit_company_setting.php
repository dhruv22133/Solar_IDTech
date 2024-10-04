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

        <li class="breadcrumb-item">

          <a href="javascript:void(0)">Company Setting</a>

        </li>

        <li class="breadcrumb-item active">

          <a href="javascript:void(0)">Edit Company Setting</a>

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

              <div class="card-header">Edit Company Setting</div>

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
                  <legend class="w-auto" style="text-align: center;">Edit Company Setting Status</legend>
                  <form action="<?php echo base_url('index.php/Master/edit_company_setting/' . $id); ?>" method="POST" class="ml-2">

                    <div class="form-group row">

                      <label class="col-sm-2 col-form-label">

                        <b>Company Setting Status</b>

                      </label>

                      <div class="col-sm-8">


                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="company_setting" id="inlineRadio1" value="1" required>
                          <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="company_setting" id="inlineRadio2" value="0" required>
                          <label class="form-check-label" for="inlineRadio2">De - Active</label>
                        </div>

                        <!-- <input class="form-control input-rounded" name="company_setting" value="<?php if (!empty($location_data[0]['company_setting'])) { echo $location_data[0]['company_setting']; } ?>" required> -->

                      </div>

                    </div>

                    <div class="form-group row">

                      <div class="col-sm-10">

                        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to Update Company Setting Status ?');">Submit</button>



                        <a class="btn btn-warning" href="<?php echo base_url('Master/company_settings'); ?>"> ❮ Go Back</a>

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