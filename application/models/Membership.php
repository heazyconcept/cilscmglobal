<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Membership extends CI_Model {

    protected $TableName;

    public function __construct()
    {
       $this->TableName =  "membership";
    }
    private $Membership;
    private $Amount;

    public function GetMembership(string $membershipName): stdClass
    {
        try {
            $this->db->where("Membership", $membershipName);
            return $this->db->get($this->TableName)->row();
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        return (object) array();
    }

}

/* End of file Membership.php */
