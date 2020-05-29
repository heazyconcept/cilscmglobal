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
                <h1 class="page-title">Transactions</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Transactions</li>
                </ol>

            </div>

        </div>
        <div class="page-content container-fluid">
            <!-- Panel Tabs -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Transactions</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <!-- Example Tabs -->
                            <div class="example-wrap">
                            <div class="panel">
                                                <header class="panel-heading">
                                                    <div class="panel-actions"></div>
                                                    <h3 class="panel-title">All Transactions</h3>
                                                </header>
                                                <div class="panel-body">
                                                    <table class="table table-hover  certificate-table table-striped w-full">
                                                        <thead>
                                                            <tr>
                                                                <th>Transaction Ref</th>
                                                                <th>Amount</th>
                                                                <th>Transaction Date</th>
                                                                <th>Full Name</th>
                                                                <th>Email Address</th>
                                                                <th >Membership Id</th>
                                                                <th>Certificate</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                        <tr>
                                                                <th>Transaction Ref</th>
                                                                <th>Amount</th>
                                                                <th>Transaction Date</th>
                                                                <th>Full Name</th>
                                                                <th>Email Address</th>
                                                                <th >Membership Id</th>
                                                                <th>Certificate</th>
                                                            </tr>
                                                        </tfoot>
                                                        
                                                    </table>
                                                </div>
                                            </div>
                            </div>
                            <!-- End Example Tabs -->
                        </div>


                    </div>








                </div>
            </div>
            <!-- End Panel Tabs -->









        </div>
    </div>


    <!-- Footer -->
    <?php $this->load->view('Templates/foot'); ?>
    <!-- Core  -->
    <?php $this->load->view("Templates/script"); ?>
    <?php $this->load->view("Templates/endpoints"); ?>
    <script src="<?php echo asset_url('js/application/admin.js') ?>"></script>


</body>



</html>