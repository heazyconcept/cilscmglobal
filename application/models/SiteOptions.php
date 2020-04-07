<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class SiteOptions extends CI_Model {

    
    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "siteoptions";
    }
    private $Key ;
    private $Value;

    public function GetSiteStatus(): string
    {
       try {
          $this->db->select("Value");
          $this->db->where("Key", "site_status");
          $query = $this->db->get($this->TableName);
          return $query->row()->Value ?? "";
       } catch (\Throwable $th) {
          $this->utilities->LogError($th);
       }
       return "";
    }

    public function GetPaymentKey(): string
    {
        try {
            $siteStatus = $this->GetSiteStatus();
            if (!empty($siteStatus)) {
                $this->db->select("Value");
                $this->db->where("Key", "paystack_{$siteStatus}");
                $query = $this->db->get($this->TableName);
                return $query->row()->Value ?? "";
            }
            
         } catch (\Throwable $th) {
            $this->utilities->LogError($th);
         }
         return "";
    }
    

}

/* End of file SiteOptions.php */
