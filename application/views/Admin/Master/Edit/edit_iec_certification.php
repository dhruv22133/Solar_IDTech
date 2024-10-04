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

          <a href="javascript:void(0)">IEC Certification</a>

        </li>

        <li class="breadcrumb-item active">

          <a href="javascript:void(0)">Edit IEC Certification</a>

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

              <div class="card-header">Edit IEC Certification</div>

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
                  <legend class="w-auto" style="text-align: center;">Edit IEC Certification</legend>
                  <form action="<?php echo base_url('index.php/Master/edit_iec_certification/' . $id); ?>" method="POST" class="ml-2">

                    <div class="form-group row">

                      <label class="col-sm-2 col-form-label">

                        <b>IEC Certification</b>

                      </label>

                      <div class="col-sm-8">

                        <input class="form-control input-rounded" name="iec_certificate" value="<?php if (!empty($location_data[0]['iec_certificate'])) { echo $location_data[0]['iec_certificate']; } ?>" required>

                      </div>

                    </div>

                    <div class="form-group row">

                      <div class="col-sm-10">

                        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to Update IEC Certification ?');">Submit</button>



                        <a class="btn btn-warning" href="<?php echo base_url('Master/iec_certification'); ?>"> ❮ Go Back</a>

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