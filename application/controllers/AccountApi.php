<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AccountApi extends CI_Controller
{

    private $request;
    private $staticOptions;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users');
        $this->request = (object) $_POST;
        $this->config->load('options', true);
        $this->staticOptions = (object) $this->config->item('options');

    }
    public function Register()
    {
        try {
          
            $this->load->model("transactionLogs");
            $this->load->model('transactions');
            
            $standardPackage = $this->staticOptions->package_group["Standard"];
            if (in_array($this->request->Membership, $standardPackage)) {
                $logResponse = $this->transactionLogs->Insert($this->request);
                if ($logResponse > 0) {
                    // $OlevelCert = $this->utilities->UploadFile("OlevelCert", "Certificates");
                    // $SecondarySchoolCert = $this->utilities->UploadFile("SecondarySchoolCert", "Certificates");
                    // $ProfessionalCert = $this->utilities->UploadFile("ProfessionalCert", "Certificates");
                    // $UniversityCert = $this->utilities->UploadFile("UniversityCert", "Certificates");
                    // $OtherCert = $this->utilities->UploadFile("OtherCert", "Certificates");
                    // $Resume = $this->utilities->UploadFile("Resume", "Certificates");
                    // $userData = $this->utilities->AddPropertyToObJect($this->request, "OlevelCert", $OlevelCert);
                    // $userData = $this->utilities->AddPropertyToObJect($userData, "SecondarySchoolCert", $SecondarySchoolCert);
                    // $userData = $this->utilities->AddPropertyToObJect($userData, "ProfessionalCert", $ProfessionalCert);
                    // $userData = $this->utilities->AddPropertyToObJect($userData, "UniversityCert", $UniversityCert);
                    // $userData = $this->utilities->AddPropertyToObJect($userData, "OtherCert", $OtherCert);
                    // $userData = $this->utilities->AddPropertyToObJect($userData, "Resume", $Resume);
                    // $userData = $this->utilities->AddPropertyToObJect($userData, "Status", "Active");
                    // $userData = $this->utilities->AddPropertyToObJect($userData, "MembershipGroup", "Standard");
                    $userData = $this->prepareUserData("Active", "Standard");
                    $userId = $this->users->Insert($userData);
                    if ($userId > 0) {
                        $userData = $this->utilities->AddPropertyToObJect($userData, "PaidBy", $userId);
                        $modelResponse = $this->transactions->Insert($userData);
                        if ($modelResponse > 0) {
                            echo $this->utilities->outputMessage("success", "Registration Successful");
                            return;
                        }
                        
                    }
                   
                }
                
               
            }

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("fatal");
            return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be processed at this moment. Please try again later");
        return;
    }
    public function ValidatePackage()
    {
        try {
            $premiumPackage = $this->staticOptions->package_group["Premium"];
            if (in_array($this->request->Membership, $premiumPackage)) {
               $userData = $this->prepareUserData("Pending", "Premium");
                $userId = $this->users->Insert($userData);
                if ($userId > 0) {
                   $message = "premium;Congratulations! Your registration is successful. Kindly exercise Patience while we verify your details";
                   echo $this->utilities->outputMessage("success", $message);
                   return;
                }

            }else {
                $message = $this->utilities->GenerateGUID();
                echo $this->utilities->outputMessage("success", "standard;{$message}");
                return;
            }

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("fatal");
            return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be processed at this moment. Please try again later");
        return;
    }

    public function login()
    {
        try {
            $request = (object) $_POST;
            $userData = $this->users->GetByEmail($request->EmailAddress);
            if (empty((array) $userData)) {
                echo $this->utilities->outputMessage("error", "user does not exist");
                return;
            }
            $isCorrectPassword = $this->users->ConfirmPassword($request->Password, $userData->Id);
            if (!$isCorrectPassword) {
                echo $this->utilities->outputMessage("error", "your password is incorrect");
                return;
            }
            $userSession = $this->utilities->PrepareUserSession($userData);
            $this->utilities->SetSession($userSession);
            echo $this->utilities->outputMessage("success", "Login Successful", base_url('Admin/dashboard'));
            return;
        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("fatal");
            return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be processed at this moment. Please try again later");
        return;
    }
    public function ChangePassword()
    {
        try {
            $this->load->model('users');
            $request = (object) $_POST;
            $userId = $this->utilities->GetSessionId();
            $modelResponse = $this->users->ChangePassword($request->Password, $userId);
            if ($modelResponse > 0) {
                $userData = $this->users->Get($userId);
                $userSession = $this->utilities->PrepareUserSession($userData);
                $this->utilities->SetSession($userSession);
                echo $this->utilities->outputMessage("success", "Password changed successfully", base_url('admin/dashboard'));
                return;
            }

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("fatal");
            return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be processed at this moment. Please try again later");
        return;
    }
    public function PasswordChange()
    {
        try {
            $this->load->model('users');
            $request = (object) $_POST;
            $userId = $this->utilities->GetSessionId();
            $isRightPassword = $this->users->ConfirmPassword($request->OldPassword, $userId);
            if ($isRightPassword) {
                $modelResponse = $this->users->ChangePassword($request->Password, $userId);
                if ($modelResponse > 0) {
                    $userData = $this->users->Get($userId);
                    $userSession = $this->utilities->PrepareUserSession($userData);
                    $this->utilities->SetSession($userSession);
                    echo $this->utilities->outputMessage("success", "Password changed successfully", base_url('admin/dashboard'));
                    return;
                }

            } else {
                echo $this->utilities->outputMessage("error", "your old password is not correct");
                return;

            }

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("fatal");
            return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be processed at this moment. Please try again later");
        return;
    }
    private function prepareUserData(string $status, string $membershipGroup): stdClass
    {
        try {
            $OlevelCert = $this->utilities->UploadFile("OlevelCert", "Certificates");
            $SecondarySchoolCert = $this->utilities->UploadFile("SecondarySchoolCert", "Certificates");
            $ProfessionalCert = $this->utilities->UploadFile("ProfessionalCert", "Certificates");
            $UniversityCert = $this->utilities->UploadFile("UniversityCert", "Certificates");
            $OtherCert = $this->utilities->UploadFile("OtherCert", "Certificates");
            $Resume = $this->utilities->UploadFile("Resume", "Certificates");
            $userData = $this->utilities->AddPropertyToObJect($this->request, "OlevelCert", $OlevelCert);
            $userData = $this->utilities->AddPropertyToObJect($userData, "SecondarySchoolCert", $SecondarySchoolCert);
            $userData = $this->utilities->AddPropertyToObJect($userData, "ProfessionalCert", $ProfessionalCert);
            $userData = $this->utilities->AddPropertyToObJect($userData, "UniversityCert", $UniversityCert);
            $userData = $this->utilities->AddPropertyToObJect($userData, "OtherCert", $OtherCert);
            $userData = $this->utilities->AddPropertyToObJect($userData, "Resume", $Resume);
            $userData = $this->utilities->AddPropertyToObJect($userData, "Status", $status);
            $userData = $this->utilities->AddPropertyToObJect($userData, "MembershipGroup", $membershipGroup);
            return $userData;
        } catch (\Throwable $th) {
           $this->utilities->LogError($th);
        }
        return (object) array();

    }

}

/* End of file AccountApi.php */
