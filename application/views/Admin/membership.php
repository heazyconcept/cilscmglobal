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
                <h1 class="page-title">Membership</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Membership</li>
                </ol>

            </div>

        </div>
        <div class="page-content container-fluid">
            <!-- Panel Tabs -->
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Membership</h3>
                </div>
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <div class="col-md-12">
                            <!-- Example Tabs -->
                            <div class="example-wrap">
                                <div class="nav-tabs-horizontal" data-plugin="tabs">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item" role="presentation"><a class="nav-link active"
                                                data-name="All" role="tab">All</a></li>
                                        <?php if (!empty($allMembership)): ?>
                                        <?php foreach ($allMembership as $member): ?>
                                        <li class="nav-item" role="presentation"><a class="nav-link"
                                                data-name="<?php echo $member->Membership?>"
                                                role="tab"><?php echo ucwords(strtolower($member->MenuName)); ?></a>
                                        </li>

                                        <?php endforeach;?>
                                        <?php endif;?>




                                    </ul>
                                    <div class="tab-content pt-20">
                                        <div class="tab-pane active" id="exampleTabsOne" role="tabpanel">
                                            <div class="panel">
                                                <header class="panel-heading">
                                                    <div class="panel-actions"></div>
                                                    <h3 class="panel-title">All Membership</h3>
                                                </header>
                                                <div class="panel-body">
                                                    <table class="table table-hover table-responsive member-table table-striped w-full">
                                                        <thead>
                                                            <tr>
                                                                <th>MembershipId</th>
                                                                <th>Name</th>
                                                                <th>Membership</th>
                                                                <th>Status</th>
                                                                <th>Email Address</th>
                                                                <th>Date of Birth</th>
                                                                <th>Address</th>
                                                                <th>Olevel Certificate</th>
                                                                <th>Sec School Certificate</th>
                                                                <th>Professional Certificate</th>
                                                                <th>University Certificate</th>
                                                                <th>Other Certificate</th>
                                                                <th>Resume</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                        <tr>
                                                                <th>MembershipId</th>
                                                                <th>Name</th>
                                                                <th>Membership</th>
                                                                <th>Status</th>
                                                                <th>Email Address</th>
                                                                <th>Date of Birth</th>
                                                                <th>Address</th>
                                                                <th>Olevel Certificate</th>
                                                                <th>Sec School Certificate</th>
                                                                <th>Professional Certificate</th>
                                                                <th>University Certificate</th>
                                                                <th>Other Certificate</th>
                                                                <th>Resume</th>
                                                                <th></th>
                                                            </tr>
                                                        </tfoot>
                                                        
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

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