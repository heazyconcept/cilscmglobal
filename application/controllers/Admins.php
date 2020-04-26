<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admins extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->ConfirmSession();

    }
    public function index()
    {

        redirect('admins/dashboard');

    }
    public function dashboard()
    {
        
        $this->load->view('Admin/dashboard');

    }
    public function membership($member = "all")
    {
        $this->utilities->SetPageTitle("Membership - CILSCM");
        $data["member"] = $member;
        $data["allMembership"] = $this->membership->LIstAll();
        $this->load->view('Admin/membership', $data);
    }
    public function transactions()
    {
        $this->utilities->SetPageTitle("Transactions - CILSCM");
        $this->load->view('Admin/transactions');
    }

    private function ConfirmSession()
    {
        $userId = $this->utilities->GetSessionId();
        if (empty($userId)) {
            redirect('Account/login/admin', 'refresh');
        }else {
            $userRole = $this->utilities->GetSession("Role");
            if ($userRole != 'admin') {
                redirect('Account/login', 'refresh');
            }
        }
       

    }

}

/* End of file Admin.php */
