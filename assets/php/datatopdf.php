<?php

$nombre = $_POST["nombre"];
$num_control = $_POST["nocontrol"];
$apellido_p = $_POST["apellidop"];
$apellido_m = $_POST["apellidom"];
$fecha = $_POST["fechana"];
$curp = $_POST["curp"];
$rfc = $_POST["rfc"];
$sexo = $_POST["sexo"];
$edad = $_POST["edad"];
$promedio = $_POST["promedio"];

$private_file="../llaves/mycertificado.key.pem";
$public_file="../llaves/MyCer.cer.pem";
$sello = '';

$cadena_original = "||".$num_control."|"
					   .$nombre."|"
					   .$apellido_p."|"
					   .$apellido_m."|"
					   .$fecha."|"
					   .$curp."|"
					   .$rfc."|"
					   .$sexo."|"
					   .$edad."|"
					   .$promedio."||";

//print($cadena_original);

$private_key = openssl_get_privatekey(file_get_contents($private_file)); //abre

openssl_sign($cadena_original, $Firma, $private_key, OPENSSL_ALGO_SHA256); //convierte

$sello = base64_encode($Firma); //convierte a base 64

//echo $Firma . "<br> <br> ".  $sello;

$public_key = openssl_pkey_get_public(file_get_contents($public_file));           

$PubData = openssl_pkey_get_details($public_key);

//print_r($PubData);

$result = openssl_verify($cadena_original, $Firma, $public_key, "sha256WithRSAEncryption");

if ($result == 1) {
	$estatus= "La firma es válida";
  } else {
	$estatus= "La firma no es válida";
  }
  






require_once('library/tcpdf.php');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetTitle('Formulario con firma y sello digital');
$pdf->SetAuthor('Evelyn Hernández Martínez');
$pdf->SetPageOrientation('P');


$pdf->AddPage();
  
$content = '
  <h2>Formulario con firma y sello digital.</h2>
  <table>
	<tr>
	  <td><b>Nombre:</b></td>
	  <td>'.$nombre.'</td>
	</tr>  
	<tr>
	  <td><b>Apellido Paterno:</b></td>
	  <td>'.$apellido_p.'</td>
	</tr>
	<tr>
	  <td><b>Apellido Materno:</b></td>
	  <td>'.$apellido_m.'</td>
	</tr>
	<tr>
	  <td><b>CURP:</b></td>
	  <td>'.$curp.'</td>
	</tr>
	<tr>
	  <td><b>RFC:</b></td>
	  <td>'.$rfc.'</td>
	</tr>
	<tr>
	  <td><b>Sexo:</b></td>
	  <td>'.$sexo.'</td>
	</tr>
	<tr>
	  <td><b>Edad:</b></td>
	  <td>'.$edad.'</td>
	</tr>
	<tr>
	  <td><b>Promedio:</b></td>
	  <td>'.$promedio.'</td>
	</tr>
	<tr>
	  <td><b>No. control:</b></td>
	  <td>'.$num_control.'</td>
	</tr>
	<tr><td><b>Fecha nacimiento:</b></td>
	  <td>'.$fecha.'</td>
	</tr>
  </table>
  <br><br>
  <h2> Cadena original: </h2><p>'.$cadena_original.'</p><br>
  <h2> Sello digital: </h2><p>'.$sello.'</p><br>
  <h2> Estatus: </h2><p>'.$estatus.'</p><br>';

$pdf->writeHTML($content);

// ob_end_clean();
$pdf->Output('formulario_EvelynHernandezMartinez.pdf', 'I');

?>