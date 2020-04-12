<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Emailservices
{
    protected $ci;
    public $emailTemplate;
    public $primaryLogo;
    public $secondaryLogo;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function processRegHtml(stdClass $userData): string
    {
        try {
           
            $actionReplace = array(
                '#firstName',
                '#transactionRef',
                '#startDate',
                '#fullAddress',
                '#expiryDate',
                '#membershipId',
                '#loginUrl',
                '#pdfUrl',
                '#amountPaid',
            );
             $nameArray = explode(" ", $userData->Fullname);
             $fullAddress = "{$userData->Address}<br>{$userData->City}<br>{$userData->State}<br>{$userData->Country}";
            $actionWith = array(
                $nameArray[0],
                strtoupper($userData->TransactionRef),
                $this->FormatDate($this->ci->utilities->DbTimeFormat()),
                $fullAddress,
                $this->AyearfromNow($this->ci->utilities->DbTimeFormat()),
                strtoupper($userData->MembershipId),
                base_url("account/login"),
                $userData->Certificate,
                number_format($userData->Amount)
            );
            $actionTemplate = file_get_contents('maitemplate/receipt.html', true);
            $mailString = str_replace($actionReplace, $actionWith, $actionTemplate);
           return $mailString;
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        return "";
    }
   
    public function SetEmailTemplate(string $template, string $receiptId)
    {
        $emailData = array(
            $receiptId => $template,
        );
        $this->emailTemplate = $emailData;
    }
    public function GetEmailTemplate(string $receiptId): string
    {
        return $this->emailTemplate[$receiptId] ?? "";
    }

    public function SendGeneralMail(string $to, string $message, string $name, string $subject)
    {
        // $userData = $this->ci->users->Get($userId);
        $sourceMail = "no-reply@cilscmglobal.org";
        $sourceName = 'CILSCM Global';
        $subject = $subject;
        $actionReplace = array(
            '{{customerName}}',
            '{{mailBody}}',
        );
        $actionWith = array(
            $name,
            $message,
        );
        $actionTemplate = file_get_contents('maitemplate/general.html', true);
        $mailString = str_replace($actionReplace, $actionWith, $actionTemplate);
        $this->SendMail($sourceMail, $sourceName, $to, $subject, $mailString);

    }
    public function SendDynamicMail(string $to, string $message, string $subject)
    {
        $sourceMail = "no-reply@cilscmglobal.org";
        $sourceName = 'CILSCM Global';
        $subject = $subject;
        $this->SendMail($sourceMail, $sourceName, $to, $subject, $message);
    }

    private function SendMail(string $fromEmail, string $fromName, string $toEmail, string $subject, string $mailBody)
    {
        $url = 'http://mailapi.osigla.com.ng/mailService/sendMail';

        //create a new cURL resource
        $ch = curl_init($url);
        //setup request to send json via POST
        $data = array(
            'fromEmail' => $fromEmail,
            'fromName' => $fromName,
            'toEmail' => $toEmail,
            'subject' => $subject,
            'mailBody' => $mailBody,
        );
        $payload = json_encode($data);

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        log_message('error', $result);

        //close cURL resource
        curl_close($ch);

    }
    private function FormatDate($date)
    {
        return date("d/m/Y" ,strtotime($date));
    }
    private function AyearfromNow($startDate)
    {
        $futureDate = date("d/m/Y", strtotime('+1 year', strtotime($startDate)));
        return $futureDate;
    }

}

/* End of file EmailServices.php */
