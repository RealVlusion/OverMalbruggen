<?php
$name = $_POST['naam'];
$email = $_POST['email'];
$telefoon = $_POST['telefoon'];
$opmerking = $_POST['opmerking'];
$formcontent="Van $name \n Opmerking: $opmerking \n Email: $email \n Telefoon: $telefoon";
$recipient = "info@levelswebdesign.nl";
$subject = "Aanvraag gratis proefles";
mail($recipient, $subject, $formcontent) or die("Er ging iets fout!");
header('Location: gratisproefles.php ');
?>
