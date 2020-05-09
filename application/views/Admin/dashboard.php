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
                <h1 class="page-title">Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

            </div>

        </div>
        <div class="page-content container">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
        <!-- First Row -->
        <!-- Completed Options Pie Widgets -->
        <div class="col-xxl-3">
          <div class="row h-full" data-plugin="matchHeight">
            <div class="col-xxl-12 col-lg-4 col-sm-4">
              <div class="card card-shadow card-completed-options">
                <div class="card-block p-30">
                  <div class="row">
                    <div class="col-6">
                      <div class="counter text-left blue-grey-700">
                        <div class="counter-label mt-10">Total Member
                        </div>
                        <div class="counter-number font-size-40 mt-10">
                          <?php echo number_format($this->statistics->count_users()); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                        data-barcolor="#57c7d4" data-size="100" data-barsize="10"
                        data-goal="86" aria-valuenow="86" role="progressbar">
                        <span class="pie-progress-number blue-grey-700 font-size-20">
                          <!-- 86% -->
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-12 col-lg-4 col-sm-4">
              <div class="card card-shadow card-completed-options">
                <div class="card-block p-30">
                  <div class="row">
                    <div class="col-6">
                      <div class="counter text-left blue-grey-700">
                        <div class="counter-label mt-10">Registration
                        </div>
                        <div class="counter-number font-size-40 mt-10">
                        <?php $regData = $this->statistics->registration();?>
                          <?php echo $this->utilities->FormatAmount($regData->sum); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                        data-barcolor="#62a8ea" data-size="100" data-barsize="10"
                        data-goal="62" aria-valuenow="62" role="progressbar">
                        <span class="pie-progress-number blue-grey-700 font-size-20">
                          <?php echo number_format($regData->count); ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-12 col-lg-4 col-sm-4">
              <div class="card card-shadow card-completed-options">
                <div class="card-block p-30">
                  <div class="row">
                    <div class="col-6">
                      <div class="counter text-left blue-grey-700">
                        <div class="counter-label mt-10">Membership
                        </div>
                        <div class="counter-number font-size-40 mt-10">
                        <?php $memberData = $this->statistics->membership();?>
                        <?php echo $this->utilities->FormatAmount($memberData->sum); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                        data-barcolor="#926dde" data-size="100" data-barsize="10"
                        data-goal="56" aria-valuenow="56" role="progressbar">
                        <span class="pie-progress-number blue-grey-700 font-size-20">
                        <?php echo number_format($memberData->count); ?>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $userFilter = $this->statistics->filter_users(); ?>
            <?php if (!empty($userFilter)): ?>
              <?php foreach ($userFilter as $filter): ?>
                <div class="col-xxl-12 col-lg-4 col-sm-4">
              <div class="card card-shadow card-completed-options">
                <div class="card-block p-30">
                  <div class="row">
                    <div class="col-6">
                      <div class="counter text-left blue-grey-700">
                        <div class="counter-label mt-10"><?php echo $filter->name; ?>
                        </div>
                        <div class="counter-number font-size-40 mt-10">
                        <?php echo number_format($filter->count); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="pie-progress pie-progress-sm" data-plugin="pieProgress" data-valuemax="100"
                        data-barcolor="#926dde" data-size="100" data-barsize="10"
                        data-goal="56" aria-valuenow="56" role="progressbar">
                        <span class="pie-progress-number blue-grey-700 font-size-20">
                       
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <?php endforeach;?>
              <?php endif;?>
          </div>
        </div>
       
       
        <!-- End To Do List -->
        <!-- Recent Activity -->
      
        <!-- End Recent Activity -->
        <!-- End Second Row -->
      </div>
           
        </div>
    </div>


    <!-- Footer -->
    <?php $this->load->view('Templates/foot'); ?>
    <!-- Core  -->
    <?php $this->load->view("Templates/script"); ?>
    <?php $this->load->view("Templates/endpoints"); ?>


</body>



</html>