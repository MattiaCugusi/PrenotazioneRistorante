<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione prenotazione</title>
</head>
<body>
    



    <?php
      $nome = $_POST["nome"];
      $cognome = $_POST["cognome"];
      $numero = $_POST["numero"];
      $data = $_POST["data"];
      $orario = $_POST["orario"];
      $note = $_POST["note"];
      $antipasto = $_POST["Antipasto"];
      $primo = $_POST["Primo"];
      $secondo = $_POST["Secondo"];
      $parcheggio = $_POST["parcheggio"];

      $nomiCamerieri = array("Mattia", "Giulio", "Luca", "Niccolo", "Alice");
      $cognomiCamerieri = array("Verdi", "Bianchi", "Gialli", "Rossi", "Azzurri");

      $antipasto = 5;
      $primo = 6;
      $secondo = 7;

      $totale;

      if (isset($antipasto)==true && isset($primo)==false && isset($secondo)==false){
        echo "<h2>NON E' POSSIBILE ORDINARE SOLO L'ANTIPASTO</h2>";
      }else  if (isset($antipasto)==false && isset($primo)==true && isset($secondo)==false){
        $totale = $primo;
      }else  if (isset($antipasto)==false && isset($primo)==false && isset($secondo)==true){
        $totale = $secondo;
      }else  if (isset($antipasto)==true && isset($primo)==true && isset($secondo)==false){
        $totale = $antipasto + $primo;
      }else  if (isset($antipasto)==true && isset($primo)==false && isset($secondo)==true){
        $totale = $antipasto + $secondo;
      }else  if (isset($antipasto)==false && isset($primo)==true && isset($secondo)==true){
        $totale = $primo + $secondo;
        $totale = $totale - ($totale*0.1);
      }else  if (isset($antipasto)==true && isset($primo)==true && isset($secondo)==true){
        $totale = $antipasto + $primo + $secondo ;
        $totale = $totale - ($totale*0.15);
      }else{
        echo "<h2>ERRORE!! CONSUMAZIONE OBBLIGATORIA!</h2>";
      }


      if ($parcheggio == "Custodito"){
        $totale = $totale + 5;
      }else if ($parcheggio == "Non Custodito"){
        $totale = $totale + 3;
      }

      echo "<h2>Cameriere: " . $nomiCamerieri[rand(0,4)] . " " . $cognomiCamerieri[rand(0,4)] . "</h2>";










    ?>
</body>
</html>