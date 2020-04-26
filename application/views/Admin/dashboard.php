<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<?php $this->load->view("Templates/admin-head"); ?>

<body class="animsition site-navbar-small ">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    <?php $this->load->view("Templates/admin-nav"); ?>

    <!-- Page -->
    <div class="page">
        <div class="container">
            <div class="page-header">
                <h1 class="page-title">Login</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Account</a></li>
                    <li class="breadcrumb-item active">Login</li>
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
                                    Admin Login
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
                                                            <label for=""> Email Address</label>
                                                            <input type="text" class="form-control step-two-field"
                                                                id="LoginId" placeholder="Email Address"
                                                                autocomplete="off" />
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for=""> Your password</label>
                                                            <input type="Password" id="Password"
                                                                class="form-control step-two-field"
                                                                placeholder="Password" autocomplete="off" />
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="auth-action">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary btn-login-admin" type="button">Login</button>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <a class="forgot-password" href="#">Forgot password?</a>
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


</body>



</html>