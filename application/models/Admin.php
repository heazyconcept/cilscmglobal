<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {

    
    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "admin";
    }
    public function Insert(stdClass $request): int
    {
        try {
           $newUser = array(
               "EmailAddress" => $request->EmailAddress,
               "Fullname" => $request->Fullname,
               "PhoneNumber" => $request->PhoneNumber,
               "Role" => $request->Role?? "",
               "DateCreated" => $this->utilities->DbTimeFormat(),
               "IsPasswordChanged" => $request->IsPasswordChanged,
               "Password" => password_hash($request->Password, PASSWORD_DEFAULT),
               "Status" => $request->Status,
           );
           $this->db->insert($this->TableName, $newUser);
           return $this->db->insert_id();
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
            return -1;
        }
        return 0;

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
    public function ConfirmPassword(string $Password, int $UserId): bool
    {
        try {
            $userdata = $this->Get($UserId);
           return  password_verify($Password, $userdata->Password);

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());

        }
        return false;

    }
    public function CheckExist(string $EmailAddress): bool
    {
        try {
            $this->db->where("EmailAddress", $EmailAddress);
            $DbResponse = $this->db->get($this->TableName)->result();
            if (empty($DbResponse)) {
                return false;
            }

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            return true;

        }
        return true;

    }
    public function GetByEmail(string $EmailAddress): stdClass
    {
        try {
            $this->db->where("EmailAddress", $EmailAddress);
           $dbResult =  $this->db->get($this->TableName)->row();
           if (!empty((array) $dbResult)) {
              return $dbResult;
           }

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return (object) array();

    }

}

/* End of file Admin.php */
