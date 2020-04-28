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
$recipient = "info@overmalbruggen.nl";
$subject = "Inschrijven wekelijkse workshops";
mail($recipient, $subject, $formcontent) or die("Er ging iets fout!");

//Bevestigingsmail

// Subject of confirmation email.
$conf_subject = 'Bevestiging workshop';

// Who should the confirmation email be from?
$conf_sender = 'OverMalbruggen <info@overmalbruggen.nl>';

$msg = "Beste meneer, mevrouw" . ",\n\nBedankt voor het invullen van het formulier op de website van Stichting OverMalbruggen.
 We zullen u spoedig berichten over de eerstvolgende (proef)les waar u aan mee kan komen doen. \n
 We kijken er naar uit u dan te mogen ontmoeten!\n
 Mocht u nog vragen hebben bel of mail ons vooral (zie contactgegevens hieronder).\n\n
 Hartelijke groet,\n
 Freija Poll\n
 Namens Stichting OverMalbruggen\n
 Mail: info@overmalbruggen.nl
 Tel: 06-111383030
 Website: www.overmalbruggen.nl";

mail( $_POST['email'], $conf_subject, $msg, 'Van: ' . $conf_sender );

header('Location: wekelijkseworkshops.php ');
?>
