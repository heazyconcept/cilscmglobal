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


}

/* End of file Transactions.php */
