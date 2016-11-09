<?php
if(isset($_POST['email'])) {
     

    $email_to = "carlos.arriaga@live.com";
     
    $email_subject = "Contacto a travez del Sitio Web";
     
     
    function died($error) {
      
        echo "Le pedimos una disculpa, pero hemos encontrado un error en el formulario que ha enviado ";
        echo "Dicho error aparece a continuación: <br /><br />";
        echo $error."<br /><br />";
        echo "Por favor, regrese y arregle esos errores.<br /><br />";
        die();
    }
     

    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('Le pedimos una disculpa, pero hemos encontrado un error en el formulario que ha enviado');       
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'El correo electrónico que introdujo no es valido.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'El nombre que introdujo no es valido.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'El Apellido que introdujo no es valido.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'El comentario que introdujo no es valido.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Detalles del formulario.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// cabecera del correo
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
echo "¡El formulario se ha enviado con éxito!";
?>
 

 
<?php
}
die();
?>