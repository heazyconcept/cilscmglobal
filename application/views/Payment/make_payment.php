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
                <h1 class="page-title">Membership Payment</h1>

            </div>

        </div>
        <div class="page-content">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="panel panel-bordered">
                        <div class="panel-heading">
                            <h3 class="panel-title">Membership Payment</h3>
                        </div>
                        <div class="panel-body">
                        <?php if ($status): ?>
  <div class="payment-paid">
      <p>Payment Already made</p>
  </div>

<?php else: ?>
    <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Full Name</th>
                                        <td><?php echo $userData->Fullname; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email Address</th>
                                        <td><?php echo $userData->EmailAddress; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Membership</th>
                                        <td><?php echo $userData->Membership; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Amount</th>
                                        <td><?php echo $this->utilities->FormatAmount($paymentDetails->Amount); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Reference</th>
                                        <td><?php echo $transactionRef; ?></td>
                                    </tr>
                                </tbody>

                            </table>
                            <div class="payment-action">
                                <button style="color: white!important" class="btn btn-primary btn-pay btn-outline" data-code="<?php echo $paymentDetails->PaymentCode; ?>" data-ref="<?php echo $transactionRef; ?>"
                                    data-id="<?php echo $userData->Id; ?>"
                                    data-email="<?php echo $userData->EmailAddress; ?>" data-amount="<?php echo $paymentDetails->Amount; ?>" type="button">Make Payment</button>
                            </div>

<?php endif; ?>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </div>


    <!-- Footer -->
    <?php $this->load->view('Templates/foot'); ?>
    <!-- Core  -->
    <?php $this->load->view("Templates/script"); ?>
    <?php $this->load->view("Templates/endpoints"); ?>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="<?php echo asset_url('js/application/payment.js') ?>"></script>


</body>



</html>