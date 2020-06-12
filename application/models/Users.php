<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Model
{

    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "users";
    }
    private $Fullname;
    private $EmailAddress;
    private $Dob;
    private $Address;
    private $OlevelCert;
    private $SecondarySchoolCert;
    private $ProfessionalCert;
    private $UniversityCert;
    private $OtherCert;
    private $Resume;
    private $MembershipGroup;
    private $Membership;
    private $Status;
    private $DateCreated;
    private $ModifiedBy;
    private $DateModified;
    private $State;
    private $City;
    private $Password;
    private $Country;
    private $RegNumber;
    private $MembershipId;

    public function Insert(stdClass $request): int
    {
        try {
           $newUser = array(
               "Fullname" => $request->Fullname,
               "EmailAddress" => $request->EmailAddress,
               "Dob" => $request->Dob,
               "Address" => $request->Address,
               "OlevelCert" => $request->OlevelCert,
               "SecondarySchoolCert" => $request->SecondarySchoolCert,
               "ProfessionalCert" => $request->ProfessionalCert,
               "UniversityCert" => $request->UniversityCert,
               "OtherCert" => $request->OtherCert,
               "Resume" => $request->Resume,
               "MembershipGroup" => $request->MembershipGroup,
               "Membership" => $request->Membership,
               "Status" => $request->Status,
               "DateCreated" => $this->utilities->DbTimeFormat(),
               "State" => $request->State,
               "City" => $request->City,
               "Country" => $request->Country,
               "RegNumber" => $request->RegNumber??0,
               "MembershipId" => $request->MembershipId??"",
               "Password" => password_hash($request->Password, PASSWORD_DEFAULT),
               "PhoneNumber" => $request->PhoneNumber
           );
           $this->db->insert($this->TableName, $newUser);
           return $this->db->insert_id();
        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());
            return -1;
        }
        return 0;

    }
    public function GetLastRegNumberByMembership(string $membership):int
    {
       try {
           $this->db->select("RegNumber");
           $this->db->where("Membership", $membership);
           $this->db->order_by("RegNumber", "DESC");
           $this->db->limit(1);
           $dbResult = $this->db->get($this->TableName)->result();
           if (!empty($dbResult)) {
               return $dbResult[0]->RegNumber;
           }
       }  catch (\Throwable $th) {

        log_message('error', $th->getMessage());
        return -1;
    }
    return 0;
    }
    // public function update(stdClass $UserData, int $UserId): int
    // {
    //     try {
    //         $UserDB = $this->Get($UserId);
    //         $UserUpdate = array(
    //             "EmailAddress" => (isset($UserData->EmailAddress) && $UserData->EmailAddress != $UserDB->EmailAddress) ? $UserData->EmailAddress : $UserDB->EmailAddress,
    //             "PhoneNumber" => (isset($UserData->PhoneNumber) && $UserData->PhoneNumber != $UserDB->PhoneNumber) ? $UserData->PhoneNumber : $UserDB->PhoneNumber,
    //             "FullName" => (isset($UserData->FullName) && $UserData->FullName != $UserDB->FullName) ? $UserData->FullName : $UserDB->FullName,
    //             "ModifiedBy" => (isset($UserData->ModifiedBy) && $UserData->ModifiedBy != $UserDB->ModifiedBy) ? $UserData->ModifiedBy : $UserDB->ModifiedBy,
    //             "DateModified" => $this->utilities->DbTimeFormat(),
    //         );
    //         $dbOptions = array(
    //             "table_name" => $this->TableName,
    //             "process_data" => (object) $UserUpdate,
    //             "targets" => (object) array("Id" => $UserId),
    //         );
    //         $DbResponse = $this->connectDb->modify_data((object) $dbOptions);
    //         if (!empty($DbResponse)) {
    //             return 1;
    //         }

    //     } catch (\Throwable $th) {
    //         log_message('error', $th->getMessage());
    //         return -1;
    //     }
    //     return 0;

    // }
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
    // public function GetName(int $UserId): string
    // {
    //     try {
    //         $dbOptions = array(
    //             "table_name" => $this->TableName,
    //             "targets" => (object) array("Id" => $UserId),
    //         );
    //         $dbResult = $this->connectDb->select_data((object) $dbOptions);
    //         if (!empty($dbResult)) {
    //             return $dbResult[0]->FullName;
    //         }

    //     } catch (\Throwable $th) {

    //         log_message('error', $th->getMessage());

    //     }
    //     return "";

    // }
    // public function DeleteUser(int $UserId): bool
    // {
    //     try {
    //         $dbOptions = array(
    //             "table_name" => $this->TableName,
    //             "targets" => (object) array("Id" => $UserId),
    //         );
    //         $dbResult = $this->connectDb->delete_data((object) $dbOptions);
    //         if (!empty($dbResult)) {
    //             return true;
    //         }

    //     } catch (\Throwable $th) {

    //         log_message('error', $th->getMessage());

    //     }
    //     return false;

    // }

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

    public function GetByMembershipId(string $membershipId): stdClass
    {
        try {
            $this->db->where("MembershipId", $membershipId);
           $dbResult =  $this->db->get($this->TableName)->row();
           if (!empty((array) $dbResult)) {
              return $dbResult;
           }

        } catch (\Throwable $th) {

            log_message('error', $th->getMessage());

        }
        return (object) array();

    }
    public function UpdateStatus(int $userId, string $Status):bool
    {
        try {
           $this->db->set("Status", $Status);
           $this->db->where("Id", $userId);
           $this->db->update($this->TableName);
           $affectedRows = $this->db->affected_rows();
           if ($affectedRows > 0) {
                return true;
           }
        } catch (\Throwable $th) {
          $this->utilities->LogError($th);
        }
        return false;
    }
    // public function ListByEmail(string $EmailAddress): array
    // {
    //     try {
    //         $dbOptions = array(
    //             "table_name" => $this->TableName,
    //             "targets" => (object) array("EmailAddress" => $EmailAddress),
    //         );
    //         $dbResult = $this->connectDb->select_data((object) $dbOptions);
    //         if (!empty($dbResult)) {
    //             return $dbResult;
    //         }

    //     } catch (\Throwable $th) {

    //         log_message('error', $th->getMessage());

    //     }
    //     return  array();

    // }
    public function ChangePassword(string $Password, int $UserId): int
    {
        try {
           
           $newPassword = password_hash($Password, PASSWORD_DEFAULT);
           $this->db->set("Password", $newPassword);
           $this->db->where("Id", $UserId);
           $this->db->update($this->TableName);
           return $this->db->affected_rows();

        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
            return -1;
        }
        return 0;

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
    // public function SearchUser(int $limit = 0, int $start = 0, string $SearchParam, $Targets = array()): array
    // {

    //     try {
    //         $_table = $this->TableName;
    //         $sec_table = 'clients';
    //         $_targets = '';
    //         if (!empty($Targets)) {
    //             $_key = key($Targets[0]);
    //             $_value = $Targets[0];
    //             $_targets = " AND $_key = '$_value'";
    //         }
    //         $query = "SELECT a.*, b.FullName, b.EmailAddress, b.PhoneNumber, b.ResidentialAddress, b.Company FROM $_table a inner join $sec_table b on a.ClientId = b.Id where
    //         CONCAT(a.Amount, b.FullName, b.EmailAddress, b.PhoneNumber, b.ResidentialAddress, b.Company) LIKE '%$SearchParam%' " . $_targets . "
    //          LIMIT $limit OFFSET $start ";
    //         $dbOptions = array(
    //             "my_query" => $query,
    //             "query_action" => "select",
    //         );
    //         $dbResult = $this->connectDb->custom_query((object) $dbOptions);
    //         return $dbResult;

    //     } catch (\Throwable $th) {
    //         log_message('error', $th->getMessage());
    //     }
    //     return array();

    // }
    // public function SearchUserCount(string $SearchParam, $Targets = array()): int
    // {

    //     try {
    //         $_table = $this->TableName;
    //         $sec_table = 'clients';
    //         $_targets = '';
    //         if (!empty($Targets)) {
    //             $_key = key($Targets[0]);
    //             $_value = $Targets[0];
    //             $_targets = " AND $_key = '$_value'";
    //         }
    //         $query = "SELECT a.*, b.FullName, b.EmailAddress, b.PhoneNumber, b.ResidentialAddress, b.Company FROM $_table a inner join $sec_table b on a.ClientId = b.Id where
    //         CONCAT(a.Amount, b.FullName, b.EmailAddress, b.PhoneNumber, b.ResidentialAddress, b.Company) LIKE '%$SearchParam%' " . $_targets;
    //         $dbOptions = array(
    //             "my_query" => $query,
    //             "query_action" => "select",
    //         );
    //         $dbResult = $this->connectDb->custom_query((object) $dbOptions);
    //         return count($dbResult);

    //     } catch (\Throwable $th) {
    //         log_message('error', $th->getMessage());
    //     }
    //     return 0;

    // }

}

/* End of file ModelName.php */
