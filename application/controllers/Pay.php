<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pay extends CI_Controller {


    public function membership($paymentCode)
    {
        $this->load->model("payments");
        $this->load->model("users");
        $data["status"] = false;
        $data["paymentDetails"] = $paymentDetails = $this->payments->GetByCode($paymentCode);
        if ($paymentDetails->PaymentStatus == "Paid" ) { 
            $data["status"] = true;
        }
        $data["userData"] = $this->users->Get($paymentDetails->UserId);
        $data["transactionRef"] = $this->utilities->GenerateGUID();
        $this->utilities->SetPageTitle("Make Payment");
        $this->load->view("Payment/make_payment", $data);
    }

}

/* End of file Pay.php */
