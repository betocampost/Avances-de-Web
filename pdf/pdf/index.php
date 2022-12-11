<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require('fpdf.php');

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $curso = "CURSO CSS";
    $profesor = "GEORGINA SALAZAR PARTIDA";
    ini_set('date.timezone', 'America/Mexico_City');
    $time1 = date('l jS \de F Y', time());

    $pdf = new FPDF('L', 'cm', 'Letter');
    $pdf->AddPage();
    $pdf->Image('fondo.png', 0, 0, 28, 21.54);
    $pdf->Image('logo.png', 11, 6, 5, 5);
    $pdf->SetY(3);
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->SetTitle("Certificado para " . $nombre . ".pdf", true);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetFontSize(30);
    $pdf->Cell(0, 3, 'Universidad Autonoma de Aguascalientes', 0, 1, 'C');
    $pdf->SetFontSize(20);
    $pdf->Cell(0, 2, 'Otorga el presente a', 0, 1, 'C');
    $pdf->SetFontSize(40);
    -$pdf->Cell(0, 2, $nombre . ' ' . $apellido, 0, 1, 'C');
    $pdf->SetFont('Arial', '', 15);
    $pdf->Cell(0, 2, 'Fecha de finalizacion: ' . $time1, 0, 1, 'C');
    $pdf->SetLeftMargin(2);
    $pdf->SetRightMargin(2);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 0,  "Director", 0, 0.5, 'R');
    $pdf->Cell(0, 0,  "Instructor del curso", 0, 0.5, 'L');
    $pdf->Cell(0, 1,  "");
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 15);
    $pdf->Image('firma.png', 24, null, 1.5);
    $pdf->Cell(0, 0,  $profesor, 0, 1, 'L');
    $pdf->Cell(0, 0,  "Dr. en C. Francisco Javier Avelar Gonzalez", 0, 1, 'R');



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
        <label for="nombre">Nombre</label>
        <input type="text" required minlength="5" name="nombre">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" required minlength="5">
        <label for="curso">Curso</label>
        <input type="text" name="curso" required minlength="5">
        <label for="duracion">Duracion (semanas)</label>
        <input type="number" name="duracion" min="5" required>
        <label for="finalizacion">Fecha de finalizacion</label>
        <input type="date" name="finalizacion" id="" required>
        <label for="profesor">Profesor</label>
        <input type="text" name="profesor" required minlength="5">
        <input type="submit" value="Crear PDF">
    </form>
</body>

</html>