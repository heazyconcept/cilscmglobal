<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<?php $this->load->view("Templates/head"); ?>

<body class="animsition site-navbar-small ">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <?php $this->load->view("Templates/nav"); ?>

    <!-- Page -->
    <div class="page">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Login</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Account</a></li>
                    <li class="breadcrumb-item active">Password - Change</li>
                </ol>

            </div>

        </div>
        <div class="page-content">



            <!-- Panel Pearls -->
            <div class="panel">

                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="offset-md-2 col-md-8">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    Change your Password
                                </div>
                                <hr>
                            </div>
                            <!-- Example Default -->

                            <form id="loginForm">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="example-example">
                                            <!-- <h4 class="example-title">Personal Details</h4> -->
                                            <div class="example">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for=""> New Password</label>
                                                            <input type="password" class="form-control step-two-field"
                                                                id="password" placeholder="Your new password"
                                                                autocomplete="off" />
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for=""> Confirm Password</label>
                                                            <input type="password" class="form-control step-two-field"
                                                                id="passwordConfirm" placeholder="Confirm your password"
                                                                autocomplete="off" />
                                                        </div>

                                                    </div>
                                                  

                                                </div>
                                                <div class="auth-action">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button data-id="<?php echo $resetData->UserId; ?>"  data-code="<?php echo $resetData->VerificationId; ?>" class="btn btn-primary btn-password-change" type="button">Submit</button>

                                                        </div>
                                                        
                                                    </div>
                                                   
                                                </div>



                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                            <!-- End Example Default -->
                        </div>





                    </div>
                </div>
            </div>
            <!-- End Panel Pearls -->
        </div>
    </div>


    <!-- Footer -->
    <?php $this->load->view('Templates/foot'); ?>
    <!-- Core  -->
    <?php $this->load->view("Templates/script"); ?>
    <?php $this->load->view("Templates/endpoints"); ?>
    <script src="<?php echo asset_url('js/application/account.js') ?>"></script>


</body>



</html>