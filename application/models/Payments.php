<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Model {

    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "payments";
    }
    
    
    public function Insert(stdClass $request)
    {
        try {
            $newPayment = array(
                "PaymentLink" => $request->PaymentLink,
                "UserId" => $request->UserId,
                "Amount" => $request->Amount,
                "CreatedBy" => $this->utilities->GetSessionId(),
                "DateCreated" => $this->utilities->DbTimeFormat(),
                "PaymentStatus" => $request->PaymentStatus,
                "PaymentCode" => $request->PaymentCode,
            );
            $this->db->insert($this->TableName, $newPayment);
            return $this->db->insert_id();
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        return 0;
    }

    public function GetByCode(string $paymentCode): stdClass
    {
        try {
            $this->db->where("PaymentCode", $paymentCode);
            return $this->db->get($this->TableName)->row();
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        return (object) array();
    }
    public function UpdateStatus(string $paymentCode, string $status): int
    {
        try {
            $this->db->set("PaymentStatus", $status);
            $this->db->where("PaymentCode", $paymentCode);
           $this->db->update($this->TableName);
           return $this->db->affected_rows();

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        return 0;
    }
    public function LIstAll(): array
    {
        try {
            return $this->db->get($this->TableName)->result();
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        return array();
    }

}

/* End of file Payments.php */
