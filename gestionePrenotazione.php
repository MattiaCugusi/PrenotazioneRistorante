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
      $numero = $_POST["numeroTavolo"];
      $data = $_POST["data"];
      $orario = $_POST["orario"];
      $note = $_POST["note"];
      $antipasto = $_POST["Antipasto"];
      $primo = $_POST["Primo"];
      $secondo = $_POST["Secondo"];
      $parcheggio = $_POST["parcheggio"];

      $nomiCamerieri = array("Mattia", "Giulio", "Luca", "Niccolo", "Alice");
      $cognomiCamerieri = array("Verdi", "Bianchi", "Gialli", "Rossi", "Azzurri");

      

      $a = 5;
      $p = 6;
      $s = 7;

      $dataCompleta = $data . $orario;

      $timestamp = strtotime($dataCompleta);
      
      $ordine;

      $totale;

      if (isset($antipasto) && !isset($primo) && !isset($secondo)){
        echo "<h2>NON E' POSSIBILE ORDINARE SOLO L'ANTIPASTO</h2>";
      }else  if (!isset($antipasto) && isset($primo) && !isset($secondo)){
        $totale = $p;
        $ordine = "primo";
      }else  if (!isset($antipasto) && !isset($primo) && isset($secondo)){
        $totale = $s;
        $ordine = "secondo";
      }else  if (isset($antipasto) && isset($primo) && !isset($secondo)){
        $totale = $a + $p;
        $ordine = "antipasto,primo";
      }else  if (isset($antipasto) && !isset($primo) && isset($secondo)){
        $totale = $a + $s;
        $ordine = "antipasto,secondo";
      }else  if (!isset($antipasto) && isset($primo) && isset($secondo)){
        $totale = $p + $s;
        $totale = $totale - ($totale*0.1);
        $ordine = "primo,secondo";
      }else if (isset($antipasto) && isset($primo) && isset($secondo)){
        $totale = $a + $p + $s;
        $totale = $totale - ($totale*0.15);
        $ordine = "antipasto,primo,secondo";
      }else{
        echo "<h2>ERRORE!! CONSUMAZIONE OBBLIGATORIA!</h2>";
      }


      if ($parcheggio == "Custodito"){
        $totale = $totale + 5;
      }else if ($parcheggio == "Non Custodito"){
        $totale = $totale + 3;
      }

      echo "
      <h1>Cliente: " . $nome . " " . $cognome . "
      <h2>Cameriere: " . $nomiCamerieri[rand(0,4)] . " " . $cognomiCamerieri[rand(0,4)] . "</h2>
      <p>Data ed ora: " . date("d-m-Y H:i", $timestamp) . "</p>
      <p>Numero tavolo: " . $numero . "</p>
      <p>Note: " . $note . "</p>
      <p>Ordine: " . $ordine . "</p>
      <p>Parcheggio: " . $parcheggio . "</p>
      <br>
      <p>Prezzi menu: </p>
        <ul>
          <li>Antipasto: " . $a . "</li>
          <li>Primo: " . $p . "</li>
          <li>Secondo: " . $s . "</li>
          <li>Primo e secondo: 10% sconto</li>
          <li>Menu completo: 15% sconto</li>
      <p>Totale: " . $totale . " euro";


            

    ?>
</body>
</html>