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
    public function ProcessCertificate(stdClass $userData): string
    {
        try {
           
            $actionReplace = array(
                '#fullName',
                '#membership',
                '#validDate',
            );
            $actionWith = array(
                $userData->Fullname,
                $userData->Membership,
                $this->AyearfromNow($this->ci->utilities->DbTimeFormat())
            );
            $actionTemplate = file_get_contents('maitemplate/certificate.html', true);
            $mailString = str_replace($actionReplace, $actionWith, $actionTemplate);
            $this->ci->html2pdf->folder('./pdfs/');
            $fileName = $userData->Fullname. "-" . uniqid() . '.pdf';

            //Set the filename to save/download as
            $this->ci->html2pdf->filename($fileName);

            //Set the paper defaults
            $this->ci->html2pdf->paper('a3', 'landscape');

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
        $futureDate = date('d F Y', strtotime('+1 year', strtotime($startDate)));
        return $futureDate;
    }
    
   

   

}

/* End of file EmailServices.php */
