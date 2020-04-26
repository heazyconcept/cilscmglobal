<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminApi extends CI_Controller
{

    public $UserID;
    private $siteOptions;
    private $request;

    public function __construct()
    {
        parent::__construct();
        $this->UserID = $this->utilities->GetSessionId();
        $this->config->load('options', true);
        $this->siteOptions = (object) $this->config->item('options');
        $this->request = (object) $_POST;

    }

  
    public function ViewMembership()
    {
        $this->load->model('users');
        $Result = array();
        $data = array();
        $totalData = 0;
        $totalFiltered = 0;
        $targets = array();

        try {

            $limit = $this->input->get('length') ?? 0;
            $start = $this->input->get('start') ?? 0;
            $memberName = $this->input->get('MemberName');
            $parameters = array(
                "Membership" => ($memberName == "All")? "" : $memberName
            );
            
            $totalData = $this->users->CountAll($parameters);
            $totalFiltered = $totalData;
            if (empty($this->input->get('search')['value'])) {
               
                $Result = $this->users->ListAll($limit, $start, $parameters);
            } else {
                $search = $this->input->get('search')['value'];
                $Result = $this->users->SearchAll($search, $limit, $start, $parameters);
                $totalFiltered = $this->users->CountSearch($search, $parameters);
            }
            if (!empty($Result)) {

                foreach ($Result as $obj) {
                    $nestedData['MembershipId'] = $obj->MembershipId;
                    $nestedData['Name'] = $obj->Fullname;
                    $nestedData['Membership'] = $obj->Membership;
                    $nestedData['Status'] = $obj->Status;
                    $nestedData['EmailAddress'] = $obj->EmailAddress;
                    $nestedData['DOB'] = $obj->Dob;
                    $nestedData['Address'] = "{$obj->Address}<br>{$obj->City}<br>{$obj->State}<br>{$obj->Country}";
                    $nestedData['Olevel'] = "<a href='{$obj->OlevelCert}' class='btn btn-secondary btn-block' target='_blank'>VIEW</a>" ;
                    $nestedData['SecSchool'] = "<a href='{$obj->SecondarySchoolCert}' class='btn btn-secondary btn-block' target='_blank'>VIEW</a>";
                    $nestedData['ProfessionalCert'] = "<a href='{$obj->ProfessionalCert}' class='btn btn-secondary btn-block' target='_blank'>VIEW</a>";
                    $nestedData['UniversityCert'] = "<a href='{$obj->UniversityCert}' class='btn btn-secondary btn-block' target='_blank'>VIEW</a>";
                    $nestedData['OtherCert'] = "<a href='{$obj->OtherCert}' class='btn btn-secondary btn-block' target='_blank'>VIEW</a>";
                    $nestedData['Resume'] = "<a href='{$obj->Resume}' class='btn btn-secondary btn-block' target='_blank'>VIEW</a>";
                    $nestedData['Action'] = ($obj->Status == 'Pending')?  "<button data-id='{$obj->Id}' class='btn btn-success btn-block btn-approve'>Approve</button>
                    <button data-id='{$obj->Id}' class='btn btn-danger btn-block btn-reject'>Reject</button>" : "";
                    $data[] = $nestedData;

                }

            }

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        $json_data = array(
            "draw" => intval($this->input->get('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        echo json_encode($json_data);

    }
    public function ApproveMember($userId)
    {
        try {
           
            $this->load->model("users");
            $this->load->model("payments");
            $this->load->library("emailservices");
            $paymentCode = $this->utilities->GenerateGUID();
            $paymentUrl = base_url("pay/membership/{$paymentCode}");
            $userData = $this->users->Get($userId);
            if (!empty((array)$userData)) {
                $membershipData = $this->membership->GetMembership($userData->Membership);
                $newPayment = array(
                    "PaymentLink" =>$paymentUrl,
                    "UserId" => $userId,
                    "Amount" =>$membershipData->Amount,
                    "PaymentStatus" =>"NotPaid",
                    "PaymentCode" =>$paymentCode,
                );
                $paymentResponse = $this->payments->Insert((object) $newPayment);
                if ($paymentResponse > 0) {
                    $statusUpdated = $this->users->UpdateStatus($userId, "Approved");
                    if ($statusUpdated) {
                        $approvalhtml = $this->emailservices->processApprovalHtml($userData, $membershipData->Approval, $paymentUrl);
                        $this->emailservices->SendDynamicMail($userData->EmailAddress, $approvalhtml, "You have been approved!");
                        echo $this->utilities->SuccessMessage("User approved successfully");
                        return;
                    }
                    
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
    public function RejectMember($userId)
    {
        try {
           
            $this->load->model("users");
            $this->load->library("emailservices");
            $userData = $this->users->Get($userId);
            if (!empty((array)$userData)) {
                    $statusUpdated = $this->users->UpdateStatus($userId, "Rejected");
                    if ($statusUpdated) {
                        $rejectionhtml = $this->emailservices->processRejHtml($userData);
                        $this->emailservices->SendDynamicMail($userData->EmailAddress, $rejectionhtml, "Thank you for your application");
                        echo $this->utilities->SuccessMessage("User rejected successfully");
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
    public function ViewTransactions()
    {
        $this->load->model('transactionReport');
        $Result = array();
        $data = array();
        $totalData = 0;
        $totalFiltered = 0;
        $targets = array();

        try {

            $limit = $this->input->get('length') ?? 0;
            $start = $this->input->get('start') ?? 0;
          
            $totalData = $this->transactionReport->CountAll();
            $totalFiltered = $totalData;
            if (empty($this->input->get('search')['value'])) {
               
                $Result = $this->transactionReport->ListAll($limit, $start);
            } else {
                $search = $this->input->get('search')['value'];
                $Result = $this->transactionReport->SearchAll($search, $limit, $start);
                $totalFiltered = $this->transactionReport->CountSearch($search);
            }
            if (!empty($Result)) {

                foreach ($Result as $obj) {
                    $nestedData['TransactionRef'] = $obj->TransactionRef;
                    $nestedData['Amount'] = $this->utilities->FormatAmount($obj->Amount); 
                    $nestedData['TransactionDate'] = $this->utilities->DateFormat($obj->DateCreated);
                    $nestedData['FullName'] = $obj->Fullname;
                    $nestedData['EmailAddress'] = $obj->EmailAddress;
                    $nestedData['MembershipId'] = $obj->MembershipId;
                    $nestedData['Certificate'] = (empty($obj->Certificate))?"N/A" : "<a href='{$obj->Certificate}' class='btn btn-secondary btn-block' target='_blank'>VIEW</a>" ;
                    $data[] = $nestedData;

                }

            }

        } catch (\Throwable $th) {
            $this->utilities->LogError($th);
        }
        $json_data = array(
            "draw" => intval($this->input->get('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        );

        echo json_encode($json_data);

    }
    // public function GetReportCSV()
    // {
    //     try {
    //         $this->load->model('paymentReport');
    //         $filterParameters = $this->utilities->GetSession("filterParameters");
    //         $result = $this->paymentReport->GetLastQueriedCSV((object) $filterParameters);
    //         echo $this->utilities->outputMessage("success", $result);
    //         return;
    //     } catch (\Throwable $th) {
    //         $this->utilities->LogError($th);
    //         echo $this->utilities->outputMessage("fatal");
    //         return;

    //     }
    //     echo $this->utilities->outputMessage("error", "Your request cannot be proccessed at this moment please try again later");
    //     return;
    // }

    

}

/* End of file AdminApi.php */
