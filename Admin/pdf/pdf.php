<?php

// Incluye el archivo de conexión
include '../../Connections/conexion.php';
require('ex.php');

$pdf = new PDF();
$pdf->SetProtection(array('print'));
$pdf->AddPage();
$pdf->SetLineWidth(2);
$pdf->Rect(7,7,265,202,'D');

$v1 = intval($_GET['cc']);
$registro = $mysqli->prepare("SELECT * FROM certificado WHERE id_certificado = ?");
$registro->bind_param('i', $v1);
$registro->execute();
$result = $registro->get_result();

if ($result && $result->num_rows > 0) {
    // Recorre los resultados
    while ($row = $result->fetch_assoc()) {
        $documento = $row["num_doc"];
        $nombre = $row["nombre"];
        $ti_doc = $row["ti_doc"];
        $ciudad_exp = utf8_decode($row["ciudad_exp"]);
        $id_curso = $row["id_curso"];
        $fecha = explode('-', $row["fecha"]);
        $consecutivo = $row["consecutivo"];
    }
    // Libera el conjunto de resultados
    $result->free();
} else {
    throw new Exception('Error en la consulta: ' . $mysqli->error);
}

$registro0 = $mysqli->prepare("SELECT * FROM curso WHERE id_curso = ?");
$registro0->bind_param('i', $id_curso);
$registro0->execute();
$result0 = $registro0->get_result();

if ($result0 && $result0->num_rows > 0) {
    // Recorre los resultados
    while ($row0 = $result0->fetch_assoc()) {
        $curso = $row0["nom_curso"];
        $subcategoria = $row0["id_subcategoria"];
    }
    // Libera el conjunto de resultados
    $result0->free();
} else {
    throw new Exception('Error en la consulta: ' . $mysqli->error);
}

$horas = 0;
$registro1 = $mysqli->prepare("SELECT * FROM curso WHERE nom_curso = ?");
$registro1->bind_param('s', $curso);
$registro1->execute();
$result1 = $registro1->get_result();

if ($result1 && $result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $horas = $row1["total_horas"];
    $result1->free();
} else {
    throw new Exception('Error en la consulta de horas: ' . $mysqli->error);
}

if($ti_doc == 1){
    $doc = number_format($documento, 0, ".", ".");
} else {
    $doc = $documento;
}

$word1 = utf8_decode('Cursó y aprobó la sección de formación en:');
$word2 = utf8_decode('IDENTIFICADO CON CÉDULA DE CIUDADANÍA N° ');
$word3 = utf8_decode('Con una intensidad de ');
$word4 = utf8_decode(' horas, expedido en la ciudad de ');
$word5 = utf8_decode('IDENTIFICADO CON CÉDULA DE EXTRANJERÍA N° ');
$word6 = utf8_decode('IDENTIFICADO CON PASAPORTE N° ');
$word7 = utf8_decode('IDENTIFICADO CON VISA N° ');
$word8 = utf8_decode('IDENTIFICADO CON PERMISO ESPECIAL DE PERMANENCIA N° ');
$word9 = utf8_decode('IDENTIFICADO CON PPT N° ');
$nombref = utf8_decode($nombre);
$cursof = utf8_decode($curso);

if($subcategoria == 12){
    $pdf->Image('logonomada.png','82','86','115');
} else {
    $pdf->Image('logosva.jpg','54','66','160');
}

$pdf->SetFont('Arial','B',20);
$pdf->SetY(65);
$pdf->Cell('0','0','HACE CONSTAR QUE:','0','0','C');
$pdf->SetFont('Arial','B',25);
$pdf->SetY(83);
$pdf->Cell('0','0',"$nombref",'0','0','C');
$pdf->SetFont('Arial','B',15);

switch($ti_doc){
    case 1:
        $pdf->SetXY(60,90);
        $pdf->Write(10,$word2);
        $pdf->Write(10,$doc);
        break;    
    case 2:
        $pdf->SetXY(78,90);
        $pdf->Write(10,$word6);
        $pdf->Write(10,$doc);
        break;
    case 3:
        $pdf->SetXY(62,90);
        $pdf->Write(10,$word5);
        $pdf->Write(10,$doc);
        break;
    case 4:
        $pdf->SetXY(89,90);
        $pdf->Write(10,$word7);
        $pdf->Write(10,$doc);
        break;
    case 5:
        $pdf->SetXY(35,90);
        $pdf->Write(10,$word8);
        $pdf->Write(10,$doc);
        break;
    case 6:
        $pdf->SetXY(89,90);
        $pdf->Write(10,$word9);
        $pdf->Write(10,$doc);
        break;
}

$pdf->SetFont('Arial','',15);
$pdf->SetXY(87,110);
$pdf->Write(10,$word1);
$pdf->Ln(12);
$pdf->SetFont('Arial','B',25);
$pdf->Multicell('0','10',$cursof,'0','C');
$pdf->SetFont('Arial','',15);
$pdf->SetXY(60,140);
$pdf->Write(10,$word3);
$pdf->Write(10,$horas);
$pdf->Write(10,$word4);
$pdf->Write(10,$ciudad_exp);
$pdf->SetXY(95,147);
$pdf->Write(10,'Se expide el ');
$pdf->Write(10,$fecha[2]);
$pdf->Write(10,' de ');

$meses = [
    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio',
    7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
];
$mes = $meses[intval($fecha[1])] ?? '';
$pdf->Write(10,$mes);
$pdf->Write(10,' de ');
$pdf->Write(10,$fecha[0]);
$pdf->SetFont('Arial','B',10);
$pdf->RotatedText(16,197,$consecutivo,90);
$pdf->RotatedText(266,197,$fecha[2],90);
$pdf->RotatedText(266,193,'/',90);
$pdf->RotatedText(266,192,$fecha[1],90);
$pdf->RotatedText(266,188,'/',90);
$pdf->RotatedText(266,187,$fecha[0],90);
$pdf->Output();
?>
