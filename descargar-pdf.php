<?php

require_once('tcpdf/tcpdf.php');
require_once('conexion.php');
date_default_timezone_set('America/Argentian/Buenos_Aires');

ob_end_clean();

class MYPDF extends TCPDF{
    public function Header(){
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = dirname( __FILE__ ).'assets/img/icono_pdf.png';
        
    }
}

?>