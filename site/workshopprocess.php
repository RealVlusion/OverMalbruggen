<?php
$name = $_POST['naam'];
$email = $_POST['email'];
$telefoon = $_POST['telefoon'];
$straatPlusHuisnummer = $_POST['straatPlusHuisnummer'];
$postcode = $_POST['postcode'];
$woonplaats = $_POST['woonplaats'];
$betaalMethode = $_POST['betaalMethode'];
$opmerking = $_POST['opmerking'];

$formcontent="Van $name \n Email: $email \n Telefoon: $telefoon \n Straat en Huisnummer: $straatPlusHuisnummer \n Postcode: $postcode \n Woonplaats: $woonplaats
\n Betaalmethode: $betaalMethode \n Opmerking: $opmerking";
$recipient = "info@levelswebdesign.nl";
$subject = "Inschrijven wekelijkse workshops";
mail($recipient, $subject, $formcontent) or die("Er ging iets fout!");
header('Location: wekelijkseworkshops.php ');
?>
