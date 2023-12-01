<?php

require_once('tcpdf/tcpdf.php');
require_once('conexion.php');
date_default_timezone_set('America/Argentina/Buenos_Aires');

ob_end_clean();

class MYPDF extends TCPDF{
    public function Header(){
        $bMargin = $this->getBreakMargin();
        $auto_page_break = $this->AutoPageBreak;
        $this->SetAutoPageBreak(false, 0);
        $img_file = dirname(__FILE__) .'/assets/img/icono_pdf.png';
        $this->Image($img_file, 5, 5, 55, 50, '', '', '', false, 300, '', false, false, 0);
        $this->SetAutoPageBreak($auto_page_break, $bMargin);
        $this->setPageMark();
    }
}

// INICIANDO NUEVO PDF
$pdf = new MYPDF('L', 'mm', 'Letter', true, 'UTF-8', false);

// ESTABLECER MARGENES DEL PDF
$pdf->SetMargins(5,20,20);
$pdf->setHeaderMargin(10);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(true);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// INFORMACION DEL PDF
$pdf->SetCreator('NTI');
$pdf->SetAuthor('Notebook Tech Innovate');
$pdf->SetTitle('Listado de Usuarios Registrados');

// AGREGANDO LA PRIMERA PÁGINA
$pdf->addPage();
$pdf->SetFont('helvetica', 'B', 13);
$pdf->SetXY(150,20);
$pdf->SetXY(210,25);
$pdf->Write(0, 'Fecha: ' . date('d-m-Y'));
$pdf->SetXY(210,30);
$pdf->Write(0, 'Hora: ' . date('h:i A'));

$pdf->SetFont('helvetica', 'B', 8);
$pdf->SetXY(15,20);
$pdf->SetTextColor(204, 0, 0);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(15,25);

$pdf->Ln(30);
$pdf->Cell(40,26,'',0,0,'C');
$pdf->SetTextColor(34,68,136);
$pdf->SetFont('helvetica', 'B', 15);
$pdf->Cell(210,6, 'LISTA DE USUARIOS REGISTRADOS', 0, 0, 'C');

$pdf->Ln(20);
$pdf->SetTextColor(0,0,0);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(10, 6, 'ID', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'NOMBRE', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'APELLIDO', 1, 0, 'C', 1);
$pdf->Cell(18, 6, 'EDAD', 1, 0, 'C', 1);
$pdf->Cell(60, 6, 'EMAIL', 1, 0, 'C', 1);
$pdf->Cell(35, 6, 'CLAVE', 1, 0, 'C', 1);
$pdf->Cell(42, 6, 'PROVINCIA', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'FECHA REGISTRO',1, 1, 'C', 1);

$pdf->SetFont('helvetica', '', 10);


$fechaInit = date("Y-m-d", strtotime($_POST['fecha_ingreso']));
$fechaFin  = date("Y-m-d", strtotime($_POST['fechaFin']));

// CONSULTA SQL PARA MOSTRAR DATOS
$sql = ("SELECT * FROM datos_usuarios WHERE (fecha_ingreso>='$fechaInit' AND fecha_ingreso<='$fechaFin') ORDER BY fecha_ingreso ASC");
$res = mysqli_query($conexion, $sql);
while($row = mysqli_fetch_array($res)){
    $pdf->Cell(10, 6, ($row['id_usuario']), 1, 0, 'C');
    $pdf->Cell(40, 6, ($row['nombre_usuario']), 1, 0, 'C');
    $pdf->Cell(40, 6, ($row['apellido_usuario']), 1, 0, 'C');
    $pdf->Cell(18, 6, ($row['edad_usuario']), 1, 0, 'C');
    $pdf->Cell(60, 6, ($row['email_usuario']), 1, 0, 'C');
    $pdf->Cell(35, 6, ($row['clave_usuario']), 1, 0, 'C');
    $pdf->Cell(42, 6, ($row['provincia_usuario']), 1, 0, 'C');
    $pdf->Cell(40, 6, ($row['fecha_ingreso']), 1, 1, 'C');
}

$pdf->Output('Resumen_Usuarios_Registrados_'.date('d_m_y').'.pdf', 'I');
?>