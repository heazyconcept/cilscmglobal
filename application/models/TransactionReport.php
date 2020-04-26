<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TransactionReport extends CI_Model
{

    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "transactionreport";
    }
   
    public function Get(int $UserId): stdClass
    {
        try {
            $this->db->where("Id", $UserId);
            $dbResult = $this->db->get($this->TableName)->row();
            if (!empty((array)$dbResult)) {
                return $dbResult;
            }

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return (object) array();

    }
  
    public function ListAll(int $limit = 0, int $start = 0, array $targets = array()): array
    {
        try {
           if (!empty($limit)) {
               $this->db->limit($limit);
           }
           if (!empty($start)) {
               $this->db->offset($start);
           }
           if (!empty($targets)) {
               foreach ($targets as $key => $value) {
                   if (!empty($value)) {
                       $this->db->where($key, $value);
                   }
               }
           }
           $dbResult = $this->db->get($this->TableName)->result();
           return $dbResult;

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return array();

    }
    public function CountAll(array $targets = array()): int
    {
        try {
          
           if (!empty($targets)) {
               foreach ($targets as $key => $value) {
                   if (!empty($value)) {
                       $this->db->where($key, $value);
                   }
               }
           }
           $dbResult = $this->db->get($this->TableName)->num_rows();
           return $dbResult;

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return 0;

    }
    public function SearchAll(string $search, int $limit = 0, int $start = 0, array $targets = array()): array
    {
        try {
           if (!empty($limit)) {
               $this->db->limit($limit);
           }
           if (!empty($start)) {
               $this->db->offset($start);
           }
           if (!empty($targets)) {
               foreach ($targets as $key => $value) {
                   if (!empty($value)) {
                       $this->db->where($key, $value);
                   }
               }
           }
           $searchArray = array(
               "Fullname" => $search,
               "MembershipId" => $search,
               "Membership" => $search,
               "EmailAddress" => $search,
               "Amount" => $search,
           );
           $this->db->like($searchArray);
           $dbResult = $this->db->get($this->TableName)->result();
           return $dbResult;

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return array();

    }
    public function CountSearch(string $search,array $targets = array()): int
    {
        try {
          
           if (!empty($targets)) {
               foreach ($targets as $key => $value) {
                   if (!empty($value)) {
                       $this->db->where($key, $value);
                   }
               }
           }
           $searchArray = array(
            "Fullname" => $search,
            "MembershipId" => $search,
            "Membership" => $search,
            "EmailAddress" => $search,
            "Amount" => $search,
        );
        $this->db->like($searchArray);
           $dbResult = $this->db->get($this->TableName)->num_rows();
           return $dbResult;

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return 0;

    }
    

}

/* End of file TransactionReport.php */
