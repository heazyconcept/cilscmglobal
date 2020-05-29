<?php $userId = $this->utilities->GetSessionId(); ?>
<nav class="hidden-sm-flex site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse" role="navigation">

    <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
            data-toggle="menubar">
            <span class="sr-only">Toggle navigation</span>
            <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
            data-toggle="collapse">
            <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="hidden-sm hidden xs">
            <a class="navbar-brand navbar-brand-center" href="<?php echo base_url(); ?>">
                <img class="navbar-brand-logo navbar-brand-logo-normal"
                    src="https://www.cilscmglobal.org/wp-content/uploads/2018/06/cilscm_logo.png" title="cilscmglobal">
                <img class="navbar-brand-logo navbar-brand-logo-special"
                    src="https://www.cilscmglobal.org/wp-content/uploads/2018/06/cilscm_logo.png" title="cilscmglobal">
            </a>

        </div>
    </div>
       

        <div class="navbar-container container-fluid">
            <!-- Navbar Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                <!-- Navbar Toolbar -->
                <ul class="nav navbar-toolbar">




                </ul>
                <!-- End Navbar Toolbar -->
               
                <!-- Navbar Toolbar Right -->
                <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                    <?php if (empty($userId)): ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('account/login') ?>" class="nav-link btn btn-info">LOGIN</a>
                    </li>

                    <?php else: ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('account/logout') ?>"
                            class="nav-link btn btn-info btn-danger">LOGOUT</a>
                    </li>
                    <?php endif; ?>


                    <!-- <li class="nav-item dropdown">
                  <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                    data-animation="scale-up" role="button">
                    <span class="avatar avatar-online">
                      <img src="<?php  // echo asset_url('portraits/5.jpg') ?>" alt="...">
                      <i></i>
                    </span>
                  </a>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                    <div class="dropdown-divider" role="presentation"></div>
                    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                  </div>
                </li>
              -->


                </ul>
                <!-- End Navbar Toolbar Right -->
            </div>
            <!-- End Navbar Collapse -->

            <!-- Site Navbar Seach -->

            <!-- End Site Navbar Seach -->
        </div>
    <!-- </div> -->
</nav>
<div class="mobile-header hidden-lg">
  <div class="container">
  <div class="row">
    <div class="col-8 align-self-center">
      <a href="<?php echo base_url(); ?>">
      <img class="mw-100 mobile-logo" src="https://www.cilscmglobal.org/wp-content/uploads/2018/06/cilscm_logo.png" title="cilscmglobal">
      </a>
    </div>
    <?php if (empty($userId)): ?>
      <div class="col-4 align-self-center mobile-login">
      <a class="btn btn-info" href="<?php echo base_url('account/login') ?>"><i class="icon wb-lock" aria-hidden="true"></i> LOGIN</a>
    </div>

<?php else: ?>
  <div class="col-2 align-self-center mobile-login">
      <a class="mobile-icon" href="<?php echo base_url('user') ?>"><i class="icon wb-user" aria-hidden="true"></i></a>
    </div>
    <div class="col-2 align-self-center mobile-login">
      <a class="mobile-icon" href="<?php echo base_url('account/logout') ?>"><i class="icon wb-power" aria-hidden="true"></i></a>
    </div>
<?php endif; ?>
   
  </div>

  </div>
 
</div>