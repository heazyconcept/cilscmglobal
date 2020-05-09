<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("users");
        $this->load->model("transactions");
        $this->load->model("membership");
    }
    
    public function count_users():int
    {
        try {
           
           return $this->users->CountAll();
        } catch (\Throwable $th) {
          $this->utilities->LogError($th);
        }
        return 0;
    }
    public function filter_users():array
    {
        try {
           $allMembership = $this->membership->LIstAll();
           $finalResult = array();
           foreach ($allMembership as $membership) {
             $targets = array("Membership" => $membership->Membership);
             $_result = array(
               "name" => $membership->Membership,
               "count" => $this->users->CountAll($targets)
             );
             $finalResult[] = (object) $_result;
           }
           return $finalResult;
        } catch (\Throwable $th) {
          $this->utilities->LogError($th);
        }
        return array();
    }
    public function registration():stdClass
    {
        try {
           $targets = array(
             "TransactionType" =>"Registration"
           );
          $count = $this->transactions->CountAll($targets);
          $sum = $this->transactions->GetSum($targets);
          $response = array(
            "count" => $count,
            "sum" => $sum
          );
            return (object) $response;
         } catch (\Throwable $th) {
           $this->utilities->LogError($th);
         }
         return (object) array();
    }
    public function membership():stdClass
    {
        try {
           $targets = array(
             "TransactionType" =>"Certificate"
           );
          $count = $this->transactions->CountAll($targets);
          $sum = $this->transactions->GetSum($targets);
          $response = array(
            "count" => $count,
            "sum" => $sum
          );
            return (object) $response;
         } catch (\Throwable $th) {
           $this->utilities->LogError($th);
         }
         return (object) array();
    }

}

/* End of file Statistics.php */
