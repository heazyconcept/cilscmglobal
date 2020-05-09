<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Model {

    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "transactions";
    }
    private $TransactionRef;
    private $Amount;
    private $Membership;
    private $PaidBy;
    private $DateCreated;
    private $Certificate;

    public function Insert(stdClass $transaction): int
    {
        try {
            $newTransaction = array(
                "TransactionRef" => $transaction->TransactionRef,
                "Amount" => $transaction->Amount,
                "Membership" => $transaction->Membership,
                "PaidBy" => $transaction->PaidBy,
                "DateCreated" => $this->utilities->DbTimeFormat(),
                "Certificate" => $transaction->Certificate?? "",
                "TransactionType" => $transaction->TransactionType
            );
            $this->db->insert($this->TableName, $newTransaction);
            return $this->db->insert_id();

        } catch (\Throwable $th) {
           $this->utilities->LogError($th);
           return -1;
        }
        return 0;
    
    }
    public function ListByUserId(int $userId): array
    {
       try {
           $this->db->where("PaidBy", $userId);
           return $this->db->get($this->TableName)->result();
       } catch (\Throwable $th) {
        $this->utilities->LogError($th);
        
     }
     return array();
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
    public function GetSum(array $targets = array()): float
    {
        try {
          
           if (!empty($targets)) {
               foreach ($targets as $key => $value) {
                   if (!empty($value)) {
                       $this->db->where($key, $value);
                   }
               }
           }
           $this->db->select_sum("Amount", "TotalAmount");
           $dbResult = $this->db->get($this->TableName)->row();
           return $dbResult->TotalAmount;

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
               "EmailAddress" => $search,
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
            "EmailAddress" => $search,
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

/* End of file Transactions.php */
