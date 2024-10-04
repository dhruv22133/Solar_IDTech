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

                                <form action="<?php echo base_url('index.php/Master/edit_company_setting_all/'.$id); ?>" method="post">
                                    <div style="width: 75%; margin-left: 125px;">
                                        <fieldset style="border:1px solid #999; border-radius:8px;" class="">
                                            <legend class="w-auto"></legend>
                                            <div class="row ml-1 mr-1">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">PV Module Name</label>
                                                        <div class="col-lg-8">
                                                            <select name="pv_module" class="form-control" required>
                                                                <option value=""><?php echo $userid[0]['pv_module']; ?></option>
                                                                <?php if($userid[0]['pv_module'] != 100) { ?>
                                                                <option value="100">100</option> <?php } ?>
                                                                <?php if($userid[0]['pv_module'] != 200) { ?>
                                                                <option value="200">200</option> <?php } ?>
                                                                <?php if($userid[0]['pv_module'] != 250) { ?>
                                                                <option value="250">250</option> <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Warranty</label>
                                                        <div class="col-lg-8">
                                                            <select name="warranty" class="form-control" required>
                                                                <option value=""><?php echo $userid[0]['warranty']; ?></option>
                                                                <?php $i = 1;
                                                                while ($i < 30) {   ?>
                                                                    <?php if($userid[0]['warranty'] != $i) { ?>
                                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php } ?>
                                                                    <?php $i++ ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="d-flex flex-row mt-2 mb-2">
                                        <fieldset style="border:1px solid #999; border-radius:8px;" class="flex-fill mr-3">
                                            <legend class="w-auto" style="text-align: center;">PV Module Manufacturer Details</legend>
                                            <div class="ml-1">
                                                <div class="col-lg-10">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Country of Origin</label>
                                                        <div class="col-lg-8">
                                                            <select name="pv_country" class="form-control" required>
                                                                <option value=""><?php echo $userid[0]['pv_country']; ?></option>
                                                                <?php if (!empty($company)) {
                                                                    foreach ($company as $company) { ?>
                                                                        <?php if($userid[0]['pv_country'] !=$company['country_name'] ) { ?>
                                                                        <option value="<?php echo $company['country_name'] ?>"><?php echo $company['country_name']; ?></option>
                                                                        <?php } ?>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-lg-10">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Module Manufacturer</label>
                                                        <div class="col-lg-8">
                                                            <select name="pv_module1" class="form-control" required>
                                                                <option value=""><?php echo $userid[0]['pv_module1']; ?></option>
                                                                <?php if (!empty($module)) {
                                                                    foreach ($module as $module) { ?>
                                                                        <?php if($userid[0]['pv_module1'] != $module['module_manufacture']) { ?>
                                                                        <option value="<?php echo $module['module_manufacture'] ?>"><?php echo $module['module_manufacture']; ?></option>
                                                                        <?php } ?>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-10">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Module Manufacture Date</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-control" type="date" placeholder="Month of Manufacture" name="pv_date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset style="border:1px solid #999; border-radius:8px;" class="flex-fill">
                                            <legend class="w-auto" style="text-align: center;">Cell Manufacturer Details</legend>
                                            <div class="col-lg-10">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Country of Origin</label>
                                                    <div class="col-lg-8">
                                                        <select name="cell_country" class="form-control" required>
                                                            <option value=""><?php echo $userid[0]['cell_country']; ?></option>
                                                            <?php if (!empty($cell_country)) {
                                                                foreach ($cell_country as $cell_country) { ?>
                                                                    <?php if($userid[0]['cell_country'] != $cell_country['country_name']) {?>
                                                                    <option value="<?php echo $cell_country['country_name'] ?>"><?php echo $cell_country['country_name']; ?></option>
                                                                    <?php } ?>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-10">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Cell Manufacturer</label>
                                                    <div class="col-lg-8">
                                                        <select name="cell_module" class="form-control " required>
                                                            <option value=""><?php echo $userid[0]['cell_module']; ?></option>
                                                            <?php if (!empty($cell_module)) {
                                                                foreach ($cell_module as $cell_module) { ?>
                                                                    <?php if($userid[0]['cell_module'] != $cell_module['module_manufacture']) { ?>
                                                                    <option value="<?php echo $cell_module['module_manufacture'] ?>"><?php echo $cell_module['module_manufacture']; ?></option>
                                                                    <?php } ?>
                                                            <?php }
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mt-2">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label">Cell Manufacture Date</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" type="date" placeholder="Month of Manufacture" name="cell_date">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div style="width: 75%; margin-left: 125px;">
                                        <fieldset style="border:1px solid #999; border-radius:8px;">
                                            <legend class="w-auto" style="text-align: center;">IEC Certification</legend>
                                            <div class="row ml-1 mr-1">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">IEC Certificate Name</label>
                                                        <div class="col-lg-8">
                                                            <select name="iec" class="form-control" required>
                                                                <option value=""><?php echo $userid[0]['iec']; ?></option>
                                                                <?php if (!empty($iec)) {
                                                                    foreach ($iec as $iec) { ?>
                                                                        <?php if($userid[0]['iec'] != $iec['iec_certificate']) { ?>
                                                                        <option value="<?php echo $iec['iec_certificate'] ?>"> <?php echo $iec['iec_certificate']; ?> </option>
                                                                        <?php } ?>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">IEC Certificate Date</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-control" type="date" placeholder="Month of Manufacture" name="iec_date">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>

                                    <div class="form-group row mt-2" style="text-align: center; margin-left: 200px;">
                                        <div class="col-lg-8">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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