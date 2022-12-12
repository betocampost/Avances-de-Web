<?php
// Esto es para activar la visualización de errores en el servidor, por si los hubiese
session_start();


error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$subject = "Recibo de compra de Pasteleria Sucre";
// El valor entre corchetes son los atributos name del formulario html
$msg = "Usted ha solicitado los siguientes productos en nuestra pagina: ";
$from = $_SESSION['email'];

$totalpagar = $_SESSION['total'];
$msg = "Su total a pagar es de: " . $totalpagar;

// El from DEBE corresponder a una cuenta de correo real creada en el servidor
$headers = "From: girasolpasteles12@gmail.com\r\n";
$headers .= "Reply-To: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n";

if(mail($from, $subject, $msg,$headers)){
	echo "correo enviado";
	}else{
	$errorMessage = error_get_last()['msg'];
	echo $errorMessage;
}
?>