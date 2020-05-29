<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Certificate
{
    protected $ci;
    public $emailTemplate;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->library('html2pdf');
    }
    public function ProcessCertificate(stdClass $userData ,stdClass $membershipData): string
    {
        try {
           
            $actionReplace = array(
                '#fullName',
                '#membershipId',
                '#date',
            );
            $actionWith = array(
               strtoupper($userData->Fullname),
                strtoupper($userData->MembershipId),    
                $this->AyearfromNow($this->ci->utilities->DbTimeFormat())
            );
            $actionTemplate = file_get_contents("maitemplate/{$membershipData->Template}", true);
            $mailString = str_replace($actionReplace, $actionWith, $actionTemplate);
            $this->ci->html2pdf->folder('./pdfs/');
            $fileName = str_replace(" ", "_",$userData->Fullname) . "-" . uniqid() . '.pdf';

            //Set the filename to save/download as
            $this->ci->html2pdf->filename($fileName);

            //Set the paper defaults
            $this->ci->html2pdf->paper('a3', "{$membershipData->Orientation}");

            //Load html view
            $this->ci->html2pdf->html($mailString);

            if ($this->ci->html2pdf->create('save')) {
                return base_url("pdfs/{$fileName}");
            }
            return $mailString;
        } catch (\Throwable $th) {
            log_message('error', $th->getMessage());
        }
        return "";
    }
    private function AyearfromNow($startDate)
    {
        $futureDate = date('d F Y', strtotime($startDate));
        return $futureDate;
    }
    
   

   

}

/* End of file EmailServices.php */
