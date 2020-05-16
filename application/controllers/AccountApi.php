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
        $this->load->library("emailservices");
        $this->request = (object) $_POST;
        $this->config->load('options', true);
        $this->staticOptions = (object) $this->config->item('options');

    }
    public function Register()
    {
        try {
          
            $this->load->model("transactionLogs");
            $this->load->model('transactions');
            $this->load->model('membership');
            $this->load->library("certificate");
           
            
            $standardPackage = $this->staticOptions->package_group["Standard"];
            if (in_array($this->request->Membership, $standardPackage)) {
                $logResponse = $this->transactionLogs->Insert($this->request);
                if ($logResponse > 0) {
                   
                    $userData = $this->prepareUserData("Active", "Standard");
                    $userId = $this->users->Insert($userData);
                    if ($userId > 0) {
                        $userData = $this->utilities->AddPropertyToObJect($userData, "PaidBy", $userId);
                        $userData = $this->utilities->AddPropertyToObJect($userData, "TransactionType", "Certificate");
                        $membershipData = $this->membership->GetMembership($this->request->Membership);
                        if (!empty($membershipData->Template)) {
                            $pdfURl = $this->certificate->ProcessCertificate($userData, $membershipData);
                            $userData = $this->utilities->AddPropertyToObJect($userData, "Certificate", $pdfURl);
                        }
                        $modelResponse = $this->transactions->Insert($userData);
                        if ($modelResponse > 0) {
                            $mailHtml = $this->emailservices->processRegHtml($userData, $membershipData->Registration);
                            $this->emailservices->SendDynamicMail($userData->EmailAddress, $mailHtml, "CILSCM Registration");
                            echo $this->utilities->outputMessage("success", "Registration Successful");
                            return;
                        }
                        
                    }
                   
                }
                
               
            }else {
                $logResponse = $this->transactionLogs->Insert($this->request);
                if ($logResponse > 0) {
                   
                    $userData = $this->prepareUserData("Pending", "Premium");
                    $userId = $this->users->Insert($userData);
                    if ($userId > 0) {
                        $userData = $this->utilities->AddPropertyToObJect($userData, "PaidBy", $userId);
                        $userData = $this->utilities->AddPropertyToObJect($userData, "TransactionType", "Registration");
                        $membershipData = $this->membership->GetMembership($this->request->Membership);
                        
                        $modelResponse = $this->transactions->Insert($userData);
                        if ($modelResponse > 0) {
                            $mailHtml = $this->emailservices->processRegHtml($userData, $membershipData->Registration);
                            $this->emailservices->SendDynamicMail($userData->EmailAddress, $mailHtml, "CILSCM Registration");
                            echo $this->utilities->outputMessage("success", "Registration Successful. Kindly hold on while we review your details");
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
            
            $isExists = $this->users->CheckExist($this->request->EmailAddress);
            if ($isExists) {
                echo $this->utilities->outputMessage("error", "User already exists");
                return;
            }
            $ref = $this->utilities->GenerateGUID();
            $premiumPackage = $this->staticOptions->package_group["Premium"];
            if (in_array($this->request->Membership, $premiumPackage)) {
            //    $userData = $this->prepareUserData("Pending", "Premium");
            //     $userId = $this->users->Insert($userData);
            //     if ($userId > 0) {
            //         $membershipData = $this->membership->GetMembership($this->request->Membership);
            //         $mailHtml = $this->emailservices->processRegHtml($userData, $membershipData->Registration);
            //         $this->emailservices->SendDynamicMail($userData->EmailAddress, $mailHtml, "CILSCM Registration");
            //       
            //     }
                    $message = "premium;{$ref};10000";
                   echo $this->utilities->outputMessage("success", $message);
                   return;

            }else {
                
                echo $this->utilities->outputMessage("success", "standard;{$ref}");
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
    public function RegisterAdmin()
    {
        try {
            $this->load->model("admin");
           $isExists = $this->admin->CheckExist($this->request->EmailAddress);
           if ($isExists) {
               echo $this->utilities->outputMessage("error", "User already exists");
               return;
           }
           $userData = $this->utilities->AddPropertyToObJect($this->request,"Status", "Active");
           $userData = $this->utilities->AddPropertyToObJect($userData, "IsPasswordChanged", false);
           $modelResponse = $this->admin->Insert($userData);
           if ($modelResponse > 0) {
               echo $this->utilities->outputMessage("success", "User registered successfully");
               return;
           }
        }catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->outputMessage("fatal");
            return;
        }
        echo $this->utilities->outputMessage("error", "Your request cannot be processed at this moment. Please try again later");
        return;
    }
    public function MakePayment()
    {
        try {
            $this->load->model("transactionLogs");
            $this->load->model('transactions');
            $this->load->model('membership');
            $this->load->model('payments');
            $this->load->library("certificate");
            $logResponse = $this->transactionLogs->Insert($this->request);
            if ($logResponse > 0) {
                $userData = $this->users->Get($this->request->UserId);
                $PaymentData = $this->payments->GetByCode($this->request->PaymentCode);
                $membershipData = $this->membership->GetMembership($userData->Membership);
                $cert = $this->certificate->ProcessCertificate($userData, $membershipData);
                $tranData = $this->utilities->AddPropertyToObJect($this->request, "Certificate", $cert);
                $tranData = $this->utilities->AddPropertyToObJect($tranData, "PaidBy", $this->request->UserId);
                $tranData = $this->utilities->AddPropertyToObJect($tranData, "TransactionType", "Certificate");
                $tranData = $this->utilities->AddPropertyToObJect($tranData, "Membership", $userData->Membership);
                $tranResponse = $this->transactions->Insert($tranData);
                if ($tranResponse > 0) {
                    $this->users->UpdateStatus($this->request->UserId, "Active");
                    $this->payments->UpdateStatus($this->request->PaymentCode, "Paid");
                    $message = "<p>Your payment is successfull</p><p>Please <a href ='{$cert}' target ='_blank'> Click Here </a> to download your certificate</p>";
                    $this->emailservices->SendGeneralMail($userData->EmailAddress, $message, $userData->Fullname, "Payment Successful");
                    echo $this->utilities->SuccessMessage("Payment Successful. Please check you mail to download your certificate");
                    return;
                }

            }
           
        } catch (\Throwable $th) {
           $this->utilities->LogError($th);
           echo $this->utilities->FatalMessage();
           return;
        }
        echo $this->utilities->GenericErrorMessage();
        return;
    }
    public function AdminLogin()
    {
        try {
            $this->load->model("admin");
            $adminData = $this->admin->GetByEmail($this->request->EmailAddress);
            if (empty((array) $adminData)) {
                echo $this->utilities->outputMessage("error", "User does not exist");
                return;
            }
            $passwordCorrect = $this->admin->ConfirmPassword($this->request->Password, $adminData->Id);
            if (!$passwordCorrect) {
                echo $this->utilities->outputMessage("error", "Invalid password");
                return;
            }
            $adminSession = $this->utilities->PrepareAdminSession($adminData);
            $this->utilities->SetSession($adminSession);
            $url = base_url("admins/dashboard");
            echo $this->utilities->SuccessMessage("", $url);
            return;

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->FatalMessage();
            return;
        }
        echo $this->utilities->GenericErrorMessage();
        return;
    }

    public function Login()
    {
        try {
          
            $isEmail = $this->utilities->IsEmail($this->request->LoginId);
             if ($isEmail) {
                 $userData = $this->users->GetByEmail($this->request->LoginId);
             }else {
                 $userData = $this->users->GetByMembershipId($this->request->LoginId);
             }
             if (empty((array) $userData)) {
                 echo $this->utilities->outputMessage("error", "User Does not Exist");
                 return;
             }
             $passwordCorrect = $this->users->ConfirmPassword($this->request->Password, $userData->Id);
             if (!$passwordCorrect) {
                 echo $this->utilities->outputMessage("error", "Password is incorrect");
                 return;
             }
           
            $userSession = $this->utilities->PrepareUserSession($userData);
            $this->utilities->SetSession($userSession);
            echo $this->utilities->outputMessage("success", "Login Successful", base_url('user/dashboard'));
            return;
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
                $lastId = $this->users->GetLastRegNumberByMembership($this->request->Membership);
                $newId = (int) $lastId + 1;
                $membershipId = $this->GenerateMembershipId($newId,$this->request->Membership);
                $userData = $this->utilities->AddPropertyToObJect($userData, "RegNumber", $newId);
                $userData = $this->utilities->AddPropertyToObJect($userData, "MembershipId", $membershipId);
            return $userData;
        } catch (\Throwable $th) {
           $this->utilities->LogError($th);
        }
        return (object) array();

    }
    public function GenerateMembershipId(int $regNumber, string $membership)
    {
       $number =   str_pad($regNumber,  4, "000",STR_PAD_LEFT);
       $prefix = substr($membership, 0, 2);
       $foo = uniqid();
       return "{$prefix}-{$number}";
    }
    public function PasswordReset()
    {
        try {
            $this->load->model("passwordReset");
           $userData = $this->users->GetByEmail($this->request->EmailAddress);
           if (empty((array) $userData)) {
               echo $this->utilities->ErrorMessage("User Does not exist");
               return;
           }
           $verificationCode  = $this->utilities->GenerateGUID();
           $newResetData = array(
               "UserId" => $userData->Id,
               "VerificationId" => $verificationCode
           );
           $modelResponse = $this->passwordReset->Insert((object) $newResetData);
           if ($modelResponse > 0) {
               $url = base_url("account/resetpassword/{$verificationCode}");
               $message = "<p>You have requested to reset your password </p><p> Please <a href='{$url}' target='_blank'> click here </a> to change your password/p>";
               $this->emailservices->SendGeneralMail($userData->EmailAddress, $message, $userData->Fullname, "Password Change");
               echo $this->utilities->SuccessMessage("Password reset has been initiated. Please check your mail for the reset link");
               return;
           }

        }catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->FatalMessage();
            return;
        }
        echo $this->utilities->GenericErrorMessage();
        return;
    }
    public function ChangePassword()
    {
        try {
            $this->load->model("passwordReset");
           $userData = $this->users->Get($this->request->UserId);
           if (empty((array) $userData)) {
               echo $this->utilities->ErrorMessage("User Does not exist");
               return;
           }
           $resetData  = $this->passwordReset->Get($this->request->VerificationId);
           if (empty((array) $resetData)) {
            echo $this->utilities->ErrorMessage("Invalid Verification Code");
            return;
            }
            if ($userData->Id != $resetData->UserId) {
                echo $this->utilities->ErrorMessage("Invalid Verification Code");
                return;
            }
            $userResponse = $this->users->ChangePassword($this->request->Password, $userData->Id);
            if ($userResponse > 0) {
               $this->passwordReset->Delete($resetData->UserId);
               $url = base_url('account/login');
               echo $this->utilities->SuccessMessage("Password Changed Successfully. You can now procced to login",$url);
               return;
            }
           

        }catch (\Throwable $th) {
            $this->utilities->LogError($th);
            echo $this->utilities->FatalMessage();
            return;
        }
        echo $this->utilities->GenericErrorMessage();
        return;
    }

}

/* End of file AccountApi.php */
