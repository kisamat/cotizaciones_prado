<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'/third_party/mpdf/mpdf.php';

class M_pdf extends mPDF {
    
    public $param;
    public $pdf;
    
    
    public function __construct($param = '"","Letter","","",32,25,47,47,10,10')
    {
        $this->param =$param;
        $this->pdf = new mPDF($this->param);
    }
}

