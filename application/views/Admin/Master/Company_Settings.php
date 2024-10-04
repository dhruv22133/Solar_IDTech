<head>
    <style>
        .field_set {
            border-color: #F00;
        }
    </style>
</head>



<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Company Settings</a></li>
            </ol>
        </div>
    </div>



    <!-- row -->
    <?php if ($_SESSION['user_type'] == 1) { ?>
        <div class="adminrolelisting">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
                                <div class="card-header">Company Settings</div>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <?php if (isset($msg) || validation_errors() !== '') : ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4><i class="icon fa fa-warning"></i> Alert !</h4>
                                            <?= validation_errors(); ?>
                                            <?= isset($msg) ? $msg : ''; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($this->session->flashdata('msg') != '') : ?>
                                        <div class="alert alert-success flash-msg alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4> Success !</h4>
                                            <?= $this->session->flashdata('msg'); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('faliour') != '') : ?>
                                        <div class="alert alert-danger flash-msg alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h4> Error !</h4>
                                            <?= $this->session->flashdata('msg'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <form action="<?php echo base_url('index.php/Master/company_settings'); ?>" method="post">
                                        <div style="width: 75%; margin-left: 125px;">
                                            <fieldset style="border:1px solid #999; border-radius:8px;" class="">
                                                <legend class="w-auto"></legend>
                                                <div class="row ml-1 mr-1">
                                                    <div class="col-lg-6">
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label">PV Module Name</label>
                                                            <div class="col-lg-8">
                                                                <select name="pv_module" class="form-control" required>
                                                                    <option value="">PV Module Name</option>
                                                                    <option value="100">100</option>
                                                                    <option value="200">200</option>
                                                                    <option value="250">250</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group row">
                                                            <label class="col-lg-4 col-form-label">Warranty</label>
                                                            <div class="col-lg-8">
                                                                <select name="warranty" class="form-control" required>
                                                                    <option value="">Warranty In Years</option>
                                                                    <?php $i = 1;
                                                                    while ($i < 30) {   ?>
                                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
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
                                                                    <option value="">Country Name</option>
                                                                    <?php if (!empty($company)) {
                                                                        foreach ($company as $company) { ?>
                                                                            <option value="<?php echo $company['country_name'] ?>"><?php echo $company['country_name']; ?></option>
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
                                                                    <option value="">Module Manufacture</option>
                                                                    <?php if (!empty($module)) {
                                                                        foreach ($module as $module) { ?>
                                                                            <option value="<?php echo $module['module_manufacture'] ?>"><?php echo $module['module_manufacture']; ?></option>
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
                                                                <option value="">Country Name</option>
                                                                <?php if (!empty($cell_country)) {
                                                                    foreach ($cell_country as $cell_country) { ?>
                                                                        <option value="<?php echo $cell_country['country_name'] ?>"><?php echo $cell_country['country_name']; ?></option>
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
                                                                <option value="">Cell Manufacture</option>
                                                                <?php if (!empty($cell_module)) {
                                                                    foreach ($cell_module as $cell_module) { ?>
                                                                        <option value="<?php echo $cell_module['module_manufacture'] ?>"><?php echo $cell_module['module_manufacture']; ?></option>
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
                                                                    <option value="">IEC Certification</option>
                                                                    <?php if (!empty($iec)) {
                                                                        foreach ($iec as $iec) { ?>
                                                                            <option value="<?php echo $iec['iec_certificate'] ?>"> <?php echo $iec['iec_certificate']; ?> </option>
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
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="col-12 mt-2">
                    <div class="card">
                        <div class="col-lg-12 bg-primary text-white" style="background-color:#495057!important;">
                            <div class="card-header"></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-x:auto; ">
                                <table id="example" class=" table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>ID</th>
                                            <th>Module Name</th>
                                            <th>Warranty</th>
                                            <th>PV Manufacturer</th>
                                            <th>PV Manufacturer Country</th>
                                            <th>PV Manufacturer Date</th>
                                            <th>Cell Manufacturer</th>
                                            <th>Cell Manufacturer Country</th>
                                            <th>Cell Manufacturer Date</th>
                                            <?php if ($_SESSION['user_type'] == 1) { ?>
                                                <th>Status</th>
                                            <?php } ?>
                                            <?php if ($_SESSION['user_type'] == 1) { ?>
                                                <th>Edit</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>ID</th>
                                            <th>Module Name</th>
                                            <th>Warranty</th>
                                            <th>PV Manufacturer</th>
                                            <th>PV Manufacturer Country</th>
                                            <th>PV Manufacturer Date</th>
                                            <th>Cell Manufacturer</th>
                                            <th>Cell Manufacturer Country</th>
                                            <th>Cell Manufacturer Date</th>
                                            <?php if ($_SESSION['user_type'] == 1) { ?>
                                                <th>Status</th>
                                            <?php } ?>
                                            <?php if ($_SESSION['user_type'] == 1) { ?>
                                                <th>Edit</th>
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
                                                    <td><?= $loc['pv_module']; ?></td>
                                                    <td><?= $loc['warranty']; ?></td>
                                                    <td><?= $loc['pv_module1']; ?></td>
                                                    <td><?= $loc['pv_country']; ?></td>
                                                    <td><?= $loc['pv_date']; ?></td>
                                                    <td><?= $loc['cell_module']; ?></td>
                                                    <td><?= $loc['cell_country']; ?></td>
                                                    <td><?= $loc['cell_date']; ?></td>

                                                    <?php
                                                    if ($_SESSION['user_type'] == 1) {
                                                    ?>
                                                        <td>
                                                            <a href="<?= base_url('Master/edit_company_setting/' . $loc['id']); ?>">
                                                                <?php if ($loc['company_setting_status'] == 0) { ?>
                                                                    <button class="btn btn-info btn-danger" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> De-Active
                                                                    </button>
                                                                <?php } else { ?>
                                                                    <button class="btn btn-info" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> Active
                                                                    </button>
                                                                <?php } ?>
                                                            </a>
                                                        </td>
                                                    <?php } ?>

                                                    <?php
                                                    // print_r($user1);
                                                    if ($_SESSION['user_type'] == 1) {
                                                    ?>
                                                        <td>
                                                            <a href="<?= base_url('Master/edit_company_setting_all/' . $loc['id']); ?>">
                                                                <button class="btn btn-info" onClick="return docedit();"><i class="glyphicon glyphicon-trash"></i> <i class="fa fa-edit "></i> Edit </button>
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
                <!-- #/ container -->
            </div>
            <!--**********************************

            Content body end

        ***********************************-->