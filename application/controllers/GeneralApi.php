<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralApi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('siteOptions');
    }
    
    public function GetPaymentKey()
    {
        try {
            $key = $this->siteOptions->GetPaymentKey();
            if (!empty($key)) {
                echo $this->utilities->outputMessage("success", $key);
                return;
            }
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("fatal");
            return;
        }
        echo $this->utilities->outputMessage("error", "your request cannot be processed at this moment. Please try again later");
        
    }
    public function GetTransactionRef()
    {
        try {
           $guid = $this->utilities->GenerateGUID();
            if (!empty($guid)) {
                echo $this->utilities->outputMessage("success", $guid);
                return;
            }
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("fatal");
            return;
        }
        echo $this->utilities->outputMessage("error", "your request cannot be processed at this moment. Please try again later");
        
    }

}

/* End of file GeneralApi.php */
