<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionLogs extends CI_Model {

    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "transactionlogs";
    }
    private $TransactionRef;
    private $Amount;
    private $TransactionStatus;
    private $TransactionResponse;
    private $DateCreated;

    public function Insert(stdClass $logData): int
    {
            try {
                $newLog = array(
                    "TransactionRef" => $logData->TransactionRef,
                    "Amount" => $logData->Amount,
                    "TransactionStatus" => $logData->TransactionStatus,
                    "TransactionResponse" => $logData->TransactionResponse,
                    "DateCreated" => $this->utilities->DbTimeFormat(),
                );
                $this->db->insert($this->TableName, $newLog);
                return $this->db->insert_id();
                
            } catch (\Throwable $th) {
                $this->utilities->LogError($th);
                return -1;
            }
            return 0;
    }

}

/* End of file TransactionLogs.php */
