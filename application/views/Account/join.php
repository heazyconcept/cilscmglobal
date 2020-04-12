<!DOCTYPE html>
<?php $countries = json_decode($this->utilities->GetCountries()); ?>
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
                                    Get a Membership Certificate
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
                                                    <label class="col-md-3 col-form-label">Select Country:

                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="country" name="Country"
                                                            data-plugin="select2">
                                                            <option value="">Select your country</option>
                                                            <?php foreach ($countries as $country): ?>
                                                            <option value="<?php echo $country->name; ?>">
                                                                <?php echo $country->name; ?>
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
                                                                <div class="price-image">
                                                                    <img src="<?php echo asset_url('images/Student Member.png') ?>"
                                                                        alt="">
                                                                </div>
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">10,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Student Membership</div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Any full-time student attending a college or
                                                                    university with minimum of 5 credits including
                                                                    Mathematics and English and any other 3 subjects in
                                                                    SSCE Results from NECO, NABTEB WAEC/GCE or its
                                                                    equivalents.... <a href="#" target="_blank">Read more</a> </p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="10000"
                                                                    data-member="Student Membership"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Apply</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="price-image">
                                                                    <img src="<?php echo asset_url('images/Affiliate Member.png') ?>"
                                                                        alt="">
                                                                </div>
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">30,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Affiliate Member</div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>CILSCM offers Affiliate membership to undergraduate
                                                                    students pursuing a professional programme or
                                                                    graduate degree whose relates to Transport,
                                                                    Logistics and Supply Chain, Procurement, Business,
                                                                    Management Science or Social Sciences.... <a href="#" target="_blank">Read more</a> </p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="30000"
                                                                    data-member="Affiliate Member"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Apply</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="price-image">
                                                                    <img src="<?php echo asset_url('images/Graduate Member.png') ?>"
                                                                        alt="">
                                                                </div>
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">50,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Graduate Member</div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>The gateway to Associate Membership status. <br>
                                                                    Graduate Members have achieved a recognised and
                                                                    relevant degree-level or similar programmes or
                                                                    qualifications and are working towards the goal of
                                                                    Chartered status.
                                                                ... <a href="#" target="_blank">Read more</a> </p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="50000" data-member="Graduate Member"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Apply</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="price-image">
                                                                    <img src="<?php echo asset_url('images/Associate Member.png') ?>"
                                                                        alt="">
                                                                </div>
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
                                                                <p>Entry Requirements: Diploma, HND, B.Sc or Professional Certificates in any course of study and  years work experience in areas aspect of Logistics and Supply Chain Management. ... <a href="#" target="_blank">Read more</a> </p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="80000"
                                                                    data-member="Associate (ACILSCM) Certificate"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Apply</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="price-image">
                                                                    <img src="<?php echo asset_url('images/Full Member.png') ?>"
                                                                        alt="">
                                                                </div>
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
                                                                <p>As the only organisation in the Africa that offers Chartered membership certifications for Logistics and Supply  Chain Management professionals, we can help you achieve the highest professional standards and gain international recognition.... <a href="#" target="_blank">Read more</a> </p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="100000"
                                                                    data-member="Full Member (MCILSCM) Certificate"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Apply</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="price-image">
                                                                    <img src="<?php echo asset_url('images/Fellowship membe.png') ?>"
                                                                        alt="">
                                                                </div>
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
                                                                <p>As the only organisation in the Africa that offers Chartered membership certifications for Logistics and Supply  Chain Management professionals, we can help you achieve the highest professional standards and gain international recognition.... <a href="#" target="_blank">Read more</a> </p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="150000"
                                                                    data-member="Fellowship (FCILSCM) Certificate"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Apply</button>
                                                            </div>
                                                        </div>
                                                        <div class="pricing-column-three">
                                                            <div class="pricing-header">
                                                                <div class="price-image">
                                                                    <img src="<?php echo asset_url('images/Doctoral Fellow.png') ?>"
                                                                        alt="">
                                                                </div>
                                                                <div class="pricing-price">
                                                                    <span class="pricing-currency">NGN</span>
                                                                    <span class="pricing-amount">200,000</span>
                                                                    <!-- <span class="pricing-period">/ mo</span> -->
                                                                </div>
                                                                <div class="pricing-title">Doctoral Fellow Certificate
                                                                </div>
                                                            </div>
                                                            <div class="pricing-features">
                                                                <p>Doctoral Fellowship is the Institute's elite level of professional membership. Doctoral Fellowship is only awarded to Masters degrees, PhD holders or Qualified Professional Members of CIPS, CIPSM, APICS,  CILT, CILSCM, CISCM, CIWM, CIS CIoTA or its equivalents... <a href="#" target="_blank">Read more</a> </p>
                                                            </div>
                                                            <div class="pricing-footer">
                                                                <button data-price="200000"
                                                                    data-member="Doctoral Fellow Certificate"
                                                                    class="btn btn-primary btn-outline btn-package"
                                                                    role="button" type="button"><i
                                                                        class="icon wb-arrow-right font-size-16 mr-15"
                                                                        aria-hidden="true"></i>Apply</button>
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
                                        <div class="col-md-10 offset-md-1">
                                            <div class="example-example">
                                                <h4 class="example-title">Personal Details</h4>
                                                <div class="example">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Full name</label>
                                                                <input type="text" class="form-control step-two-field"
                                                                    name="Fullname" id="FullName"
                                                                    placeholder="Full Name" autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Email address</label>
                                                                <input type="email" class="form-control step-two-field"
                                                                    id="EmailAddress" name="EmailAddress"
                                                                    placeholder="Email address" autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Date of birth</label>
                                                                <input type="date" name="Dob"
                                                                    class="form-control step-two-field" id="DOB"
                                                                    placeholder="Date of birth" autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> O/level Certificate</label>
                                                                <input type="file" name="OlevelCert"
                                                                    class="form-control step-two-field"
                                                                    autocomplete="off" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Secondary School Certificate</label>
                                                                <input type="file" name="SecondarySchoolCert"
                                                                    class="form-control step-two-field"
                                                                    autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Professional Certificate</label>
                                                                <input type="file" name="ProfessionalCert"
                                                                    class="form-control step-two-field"
                                                                    autocomplete="off" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> University Degree</label>
                                                                <input type="file" name="UniversityCert"
                                                                    class="form-control step-two-field"
                                                                    autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Other Relevant Certificate</label>
                                                                <input type="file" name="OtherCert"
                                                                    class="form-control step-two-field"
                                                                    autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Current CV</label>
                                                                <input type="file" name="Resume"
                                                                    class="form-control step-two-field"
                                                                    autocomplete="off" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Your password</label>
                                                                <input type="password" name="Password"
                                                                    class="form-control step-two-field"
                                                                    placeholder="Password" autocomplete="off" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">

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
                                                        <label for=""> Contact Address</label>
                                                        <input type="text" class="form-control step-three-field"
                                                            id="Address" placeholder="Address " name="Address"
                                                            autocomplete="off" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""> City</label>
                                                        <input type="text" name="City"
                                                            class="form-control step-three-field" id="City"
                                                            placeholder="City" autocomplete="off" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for=""> State</label>
                                                        <input type="text" name="State"
                                                            class="form-control step-three-field" id="State"
                                                            placeholder="State" autocomplete="off" />
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="step-four-wrapper" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3">
                                            <div class="example-example standard" style="display: none;">
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
                                            <div class="example-example premium" style="display: none;">
                                                <h4 class="example-title">Registration Successful</h4>
                                                <div class="example premium-content">


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="next-previous" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 offset-md-1">
                                            <button class="btn btn-primary btn-next" type="button">Next</button>
                                            <button class="btn-previous" type="button">Previous</button>
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