<?php

if(isset($_POST['message']))
{
	header('Content-Type: application/json');

	$name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
	$message = $_POST['message'];   
	
	$customMessage = "Nombre: {$name}  Email:  {$email} Telefono:  {$phone}  
					  Mensaje:  {$message}";
	
	$to      = 'jcandia@nostrapizza.cl';
	//$to      = 'coambiado@gmail.com';
	$subject = 'Formulario de contacto Web';

	$headers = 'From: '. $email . "\r\n" .
    'Reply-To: '. $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

	$status = mail($to, $subject, $customMessage, $headers);
	
	if($status == true)
	{			
		return print(json_encode("OK"));
    }
	else
	{
		return print(json_encode("FAIL"));
	}	
}
?>