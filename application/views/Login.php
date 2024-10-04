<!DOCTYPE html>

<html class="h-100" lang="en">



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>Login</title>

    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/').'images/logo/cropped-id-tech-fvicon-1-32x32.jpg';?>">

    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->

    <link href="<?php echo base_url('assets/'); ?>css/style.css" rel="stylesheet">

</head>



<style>
    .card1 {

        position: relative;

        display: flex;

        flex-direction: column;

        min-width: 0;

        word-wrap: break-word;

        background-color: #ffffff82;

        background-clip: border-box;

        border: 1px solid rgba(0, 0, 0, 0.125);

        border-radius: 0.25rem;

    }
</style>

<body class="h-100">



    <!--*******************

        Preloader start

    ********************-->

    <div id="preloader">

        <div class="loader">

            <svg class="circular" viewBox="25 25 50 50">

                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />

            </svg>

        </div>

    </div>

    <!--*******************

        Preloader end  background-image: url("./images/loggin/.jpg");

    ********************-->

    <div class="login-form-bg h-100 w-100" style="background-image: url('<?php echo base_url();?>assets/images/login/solar-panels-8593759_1920.png'); background-repeat: no-repeat;  /* Center and scale the image nicely */

    background-position: center;

    background-repeat: no-repeat;

    background-size: cover;">

        <div class="container h-100">

            <div class="row justify-content-center h-100">

                <div class="col-xl-4">

                    <div class="form-input-content">

                        <div class="card1 login-form mb-0">

                            <div class="card-body pt-4" style="background-color: #ffffff7a!important;">

                                <h4 class="text-center">SOLAR TRACKING SOLUTION</h4>

                                <?php if (!empty(validation_errors())) : ?>

                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">

                                        <strong> Alert! </strong> <?= !empty(validation_errors()) ? validation_errors() : ''; ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                            <span aria-hidden="true">&times;</span>

                                        </button>

                                    </div>

                                <?php endif; ?>

                                <?php if (!empty($msg)) { ?>

                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">

                                        <strong> Alert! </strong> <?php echo $msg; ?>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                            <span aria-hidden="true">&times;</span>

                                        </button>

                                    </div>

                                <?php } ?>



                                <form class="mt-4 mb-4 login-input" method="POST" action="<?php echo base_url('index.php/Auth/Login'); ?>">

                                    <div class="form-group">

                                        <input type="text" name="username" class="form-control" placeholder="User Name" required>

                                    </div>

                                    <div class="form-group">

                                        <input type="password" name="password" class="form-control" placeholder="Password" required>

                                    </div>

                                    <button class="btn login-form__btn submit w-100" name="submit" type="submit">Sign In</button>

                                </form>

                                <p class="mt-3 login-form__footer">Designed & Developed by:

                                    <span><img src="<?php echo base_url('assets/'); ?>images/logo/id-logo-160x32.png" style="width:90px; height:30px;" alt=""></span>

                                </p>
                                <!-- <p class="mt-3 login-form__footer"><a href="<?php echo base_url(); ?>assets/PaloAltov1_3_24_4_25.apk" download> Handheld Application </a></p> -->

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
    <script src="<?php echo base_url('assets/'); ?>plugins/common/common.min.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/custom.min.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/settings.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/gleek.js"></script>

    <script src="<?php echo base_url('assets/'); ?>js/styleSwitcher.js"></script>

</body>

</html>