<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class PasswordReset extends CI_Model {

    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "passwordreset";
    }
    public function Insert(stdClass $request): int
    {
        try {
           $newReset = array(
               "UserId" => $request->UserId,
               "VerificationId" => $request->VerificationId,
               "DateCreated" => $this->utilities->DbTimeFormat(),
              
           );
           $this->db->insert($this->TableName, $newReset);
           return $this->db->insert_id();
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
            return -1;
        }
        return 0;

    }
    public function Get(string $verificationCode): stdClass
    {
       try {
           $this->db->where("VerificationId", $verificationCode);
           return $this->db->get($this->TableName)->row();
       } catch (\Throwable $th) {
        log_message('error', $th->getMessage());
    }
    return (object) array();
    }
    public function Delete(int $userId):int
    {
        try {
           $this->db->where("UserId", $userId);
           $this->db->delete($this->TableName);
           return $this->db->affected_rows();
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
            return -1;
        }
        return 0;
    }

}

/* End of file PasswordReset.php */
