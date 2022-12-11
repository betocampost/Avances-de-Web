<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require('fpdf.php');

    ini_set('date.timezone', 'America/Mexico_City');
    $time1 = date('l jS \de F Y', time());

    $nombre = "Carrito";
    $apellido = "Compra";
    $curso = "Recibo de Pago";


    $cliente = "Alberto Campos Terrones";
    $pdf = new FPDF('L', 'cm', 'Letter');
    $pdf->AddPage();
    $pdf->Image('MarcoV2.png', 0, 0, 28, 21.54);
    $pdf->Image('logoV1.png', 11, 6, 5, 5);
    $pdf->SetY(3);
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->SetTitle("Comprobante de Pago " . $cliente . ".pdf", true);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetFontSize(30);
    $pdf->Cell(0, 0, 'Recibo de pago OXXO', 0, 1, 'C');
    $pdf->SetFontSize(20);
    $pdf->Cell(0, 2, 'Recuento de productos:', 0, 1, 'C');



/*
    METER AQUI LA LISTA DE PRODUCTOS PARA MOSTRARLAS EN EL RECIBO


*/



    $pdf->SetFontSize(20);
    -$pdf->Cell(0, 2, '"aqui va la lista de productos"' . ' ' , 0, 1, 'C');
    $pdf->SetFont('Arial', '', 15);
    #$pdf->Cell(0, 2, 'Por haber realizado el curso "' . $curso . '" en una duracion de ' . $duracion . " semanas", 0, 1, 'C');
    $pdf->Cell(0, 2, 'Fecha de compra: ' . $time1, 0, 1, 'C');
    $pdf->SetLeftMargin(2);
    $pdf->SetRightMargin(2);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 1,  "Sucre ", 0, 0.5, 'R');
    $pdf->Cell(24, 1, "Pasteleria ", 0, 0.5, 'R');
    $pdf->Cell(16, 0,  "Escanee este codigo en caja!", 0, 0.5, 'R');
    $pdf->Image('codigobarra.png', 9, 12, 10, 4);
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 15);
    $pdf->Image('logooxxo.png', 23, 12.5, 3);
    $pdf->Cell(5.5, 4.5, "Nombre del Cliente", 0, 0.5, 'R');
    $pdf->Cell(0, -2,  $cliente, 0, 1, 'L');



    $pdf->Output();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h1>Generar Formulario</h1>
    <form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">

        <input type="submit" value="Crear PDF">
    </form>
</body>

</html>