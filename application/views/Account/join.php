<!DOCTYPE html>
<?php $this->load->library('utilities'); ?>
<?php $states = json_decode($this->utilities->GetStates()); ?>
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
                <h1 class="page-title">Join</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">membership</a></li>
                    <li class="breadcrumb-item active">join</li>
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
                                    Become a CILSCM member
                                </div>
                                <hr>
                            </div>
                            <!-- Example Default -->
                            <div class="example-wrap">

                                <div class="example">
                                    <div class="pearls row">
                                        <div class="pearl step-one current col-3">
                                            <span class="pearl-number">1</span>
                                            <!-- <span class="pearl-title">Account Info</span> -->
                                        </div>
                                        <div class="pearl step-two col-3">
                                            <span class="pearl-number">2</span>
                                            <!-- <span class="pearl-title">Billing Info</span> -->
                                        </div>
                                        <div class="pearl step-three col-3">
                                            <span class="pearl-number">3</span>
                                            <!-- <span class="pearl-title">Confirmation</span> -->
                                        </div>
                                        <div class="pearl step-four col-3">
                                            <span class="pearl-number">4</span>
                                            <!-- <span class="pearl-title">Confirmation</span> -->
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <form id="regForm">
                                <div class="step-one-wrapper">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="example">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label">Select State:

                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="state" name="State" data-plugin="select2">
                                                            <option value="">Select your state</option>
                                                            <?php foreach ($states as $state): ?>
                                                            <option value="<?php echo $state; ?>"><?php echo $state; ?>
                                                            </option>

                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="example-example">
                                                <h4 class="example-title">Select CILSCM Membership</h4>
                                                <div class="example">
                                                    <div class="pricing-table">
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">10,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Student Membership</div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ea dignissimos iure magni molestiae iste. Autem in
                                                                    sapiente rem ipsa minus similique dignissimos
                                                                    cupiditate
                                                                    ut, nam facere cumque nulla vitae nihil?</p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="10000"
                                                                    data-member="Student Membership"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Select</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">30,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Affiliate Member</div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ea dignissimos iure magni molestiae iste. Autem in
                                                                    sapiente rem ipsa minus similique dignissimos
                                                                    cupiditate
                                                                    ut, nam facere cumque nulla vitae nihil?</p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="30000"
                                                                    data-member="Affiliate Member"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Select</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">50,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Graduate Member</div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ea dignissimos iure magni molestiae iste. Autem in
                                                                    sapiente rem ipsa minus similique dignissimos
                                                                    cupiditate
                                                                    ut, nam facere cumque nulla vitae nihil?</p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="50000" data-member="Graduate Member"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Select</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">80,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Associate (ACILSCM)
                                                                    Certificate
                                                                </div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ea dignissimos iure magni molestiae iste. Autem in
                                                                    sapiente rem ipsa minus similique dignissimos
                                                                    cupiditate
                                                                    ut, nam facere cumque nulla vitae nihil?</p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="80000"
                                                                    data-member="Associate (ACILSCM) Certificate"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Select</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">100,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Full Member (MCILSCM)
                                                                    Certificate
                                                                </div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ea dignissimos iure magni molestiae iste. Autem in
                                                                    sapiente rem ipsa minus similique dignissimos
                                                                    cupiditate
                                                                    ut, nam facere cumque nulla vitae nihil?</p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="100000"
                                                                    data-member="Full Member (MCILSCM) Certificate"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Select</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">150,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Fellowship (FCILSCM)
                                                                    Certificate
                                                                </div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ea dignissimos iure magni molestiae iste. Autem in
                                                                    sapiente rem ipsa minus similique dignissimos
                                                                    cupiditate
                                                                    ut, nam facere cumque nulla vitae nihil?</p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="150000"
                                                                    data-member="Fellowship (FCILSCM) Certificate"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Select</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">200,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Doctoral Fellow Certificate
                                                                </div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ea dignissimos iure magni molestiae iste. Autem in
                                                                    sapiente rem ipsa minus similique dignissimos
                                                                    cupiditate
                                                                    ut, nam facere cumque nulla vitae nihil?</p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="200000"
                                                                    data-member="Doctoral Fellow Certificate"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Select</button>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="step-two-wrapper" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="example-example">
                                                <h4 class="example-title">Personal Details</h4>
                                                <div class="example">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control step-two-field" name="Fullname" id="FullName"
                                                                    placeholder="Full Name" autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control step-two-field"
                                                                    id="EmailAddress" name="EmailAddress" placeholder="Email address"
                                                                    autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="date" name="Dob" class="form-control step-two-field" id="DOB"
                                                                    placeholder="Date of birth" autocomplete="off" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> O/level Certificate</label>
                                                                <input type="file" name="OlevelCert" class="form-control step-two-field" id=""
                                                                     autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Secondary School Certificate</label>
                                                                <input type="file" name="SecondarySchoolCert" class="form-control step-two-field" id=""
                                                                     autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Professional Certificate</label>
                                                                <input type="file" name="ProfessionalCert" class="form-control step-two-field" id=""
                                                                     autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> University Degree</label>
                                                                <input type="file" name="UniversityCert" class="form-control step-two-field" id=""
                                                                     autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Other Relevant Certificate</label>
                                                                <input type="file" name="OtherCert" class="form-control step-two-field" id=""
                                                                     autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Current CV</label>
                                                                <input type="file" name="Resume" class="form-control step-two-field" 
                                                                     autocomplete="off" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                        <div class="form-group">
                                                                <input type="password" name="Password"  class="form-control step-two-field" 
                                                                    placeholder="Password" autocomplete="off" />
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="step-three-wrapper" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="example-example">
                                                <h4 class="example-title">Address Details</h4>
                                                <div class="example">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control step-three-field" id="Address"
                                                            placeholder="Address " name="Address" autocomplete="off" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="City" class="form-control step-three-field" id="City"
                                                            placeholder="City" autocomplete="off" />
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="step-four-wrapper" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="example-example">
                                                <h4 class="example-title">Payment Details</h4>
                                                <div class="example">
                                                    <div class="payment-details">
                                                        <p><strong>Membership:</strong> <span
                                                                class="member-value"></span></p>
                                                        <p><strong>Amount:</strong> <span class="price-value"></span>
                                                        </p>
                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-pay">PAY
                                                        ONLINE</button>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="next-previous" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <button class="btn btn-primary btn-next" type="button">Next</button>
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
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="<?php echo asset_url('js/application/account.js') ?>"></script>


</body>



</html>