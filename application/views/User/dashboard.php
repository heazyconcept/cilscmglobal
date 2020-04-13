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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ol>
                <h1 class="page-title">My Account</h1>

            </div>

        </div>
        <div class="page-content">



            <!-- Panel Pearls -->
            <div class="panel">

                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-8 offset-md-2">
                            <div class="row ">
                                <div class="col-md-3">
                                    <div class="user-sidebar user-eq-height">
                                        <div class="account-wrapper">
                                            <div class="member-details">
                                                <div class="row gutters-10 align-items-center mb-3">
                                                    <div class="col col-md-12 col-xl">
                                                        <h4 class="account-name">
                                                            <?php echo $this->utilities->GetSession("FullName"); ?></h4>
                                                    </div>
                                                    <div class="col-auto col-md-12 col-xl-auto">
                                                        <img class="member-image"
                                                            src="<?php echo asset_url('images/NoProfileImage.jpg'); ?>"
                                                            alt="">
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="member-membership">
                                                <h4><?php echo $this->utilities->GetSession("Membership"); ?></h4>
                                            </div>
                                            <div class="details-action">
                                                <a href="#" class="btn btn-block btn-primary btn-pri-design">Update
                                                    Profile</a>
                                            </div>

                                        </div>




                                    </div>

                                </div>
                                <div class="col-md-9">
                                    <div class="certificate-wrapper user-eq-height">
                                        <div class="example-example">
                                            <h4 class="example-title">My Certificates</h4>
                                            <div class="example">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Certificate</th>
                                                            <th>Type</th>
                                                            <th>Date Issued</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($allTransactions)): ?>
                                                            <?php foreach ($allTransactions as $tran): ?>
                                                                <tr>
                                                                    <td>Membership</td>
                                                                    <td><?php echo $tran->Membership; ?></td>
                                                                    <td><?php echo $this->utilities->formatDate($tran->DateCreated); ?></td>
                                                                    <td><a href="<?php echo $tran->Certificate ?>" target="_blank">View Certificate</a></td>
                                                                </tr>

                                                            <?php endforeach;?>
                                                        <?php endif;?>
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
            </div>
            <!-- End Panel Pearls -->
        </div>
    </div>


    <!-- Footer -->
    <?php $this->load->view('Templates/foot'); ?>
    <!-- Core  -->
    <?php $this->load->view("Templates/script"); ?>
    <?php $this->load->view("Templates/endpoints"); ?>
    <script src="<?php echo asset_url('js/application/user.js') ?>"></script>


</body>



</html>