<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {

    public function index()
    {
        $this->utilities->SetPageTitle("CILSCM - Get a Membership Certificate");
        $this->load->view('Account/join');
    }

}

/* End of file Join.php */
