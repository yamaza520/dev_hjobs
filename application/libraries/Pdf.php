<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf
{
    private $tcpdf;

    private $html;

    /**
     * Constructor
     */
    public function __construct()
    {
        // create new PDF document
        $this->tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    }
    /**
     * Set html
     * @param string $html
     * @return object $this
     */
    public function setHtml($html)
    {
        $this->html = $html;

        return $this;
    }

    /**
     * Download PDF
     * @param string $file_name The download file name
     */
    public function download($file_name)
    {
        $this->tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT); // set margins
        $this->tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); // set auto page breaks
        $this->tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO); // set image scale factor
        $this->tcpdf->setFontSubsetting(true); // set default font subsetting mode

        // Set font
        // convert TTF font to TCPDF format and store it on the fonts folder
        $fontname = TCPDF_FONTS::addTTFfont(APPPATH . 'libraries/tcpdf/fonts/ttf/ipag.ttf', 'TrueTypeUnicode', '', 96);
        $this->tcpdf->SetFont($fontname, '', 12, '', false); // use the font

        // Add a page
        $this->tcpdf->SetPrintHeader(false);
        $this->tcpdf->SetPrintFooter(false);
        $this->tcpdf->AddPage();

        // Print text using writeHTML()
        $this->tcpdf->writeHTML($this->html, true, false, true, false, '');

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $this->tcpdf->Output($file_name.'.pdf', 'I');
    }
}
