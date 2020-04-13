<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    protected $userId;
    
    public function __construct()
    {
        parent::__construct();
        $this->CheckUserSession();
        $this->userId = (int) $this->utilities->GetSessionId();
        
    }
    
    public function dashboard()
    {
        $this->load->model("transactions");
        $data["allTransactions"] = $this->transactions->ListByUserId($this->userId);
        $this->utilities->SetPageTitle("CILSCM - User Dashboard");
        $this->load->view("User/dashboard", $data);
        
    }

    private function CheckUserSession()
    {
        $userId = $this->utilities->GetSessionId();
        if (empty($userId)) {
            redirect('Account/login', 'refresh');
        }

    }

}

/* End of file User.php */
