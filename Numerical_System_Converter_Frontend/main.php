<!-- header section starts -->

<?php
require("header.php")
?>

<!-- header section ends -->

<!-- Navigation Bar section starts -->

  <div class="topnav ">
      <div class="image noselect">
        <a class="active"href="main.php"><img src="assets/logo.png" width="120" height="80" alt="Number Systems Calculator"></a>
      </div>
    <a>Dezimalsystem</a>
    <a>Hexadezimalsystem</a>
    <a>Oktalsystem</a>
    <a>Binärsystem</a>
    <a style="float:right">Zahlensystem Rechner</a>
  </div>

<!-- Navigation Bar section ends -->

<!-- Code section starts -->
<?php

$cboSys = "";
$Zahl = "";

    if (isset($_POST["cmdTaste"]))
       //Eingegebene zahl
        $Zahl = (isset($_POST["Zahl"]) && is_string($_POST["Zahl"])) 
            ? $_POST["Zahl"] : "";
       //Zahlen system
        $cboSys = (isset($_POST["cboSys"]) && is_string($_POST["cboSys"])) 
            ? $_POST["cboSys"] : "";

    $Eingabe = true;

    //Zahlen zu Dezimalzahlen  konvertieren
    if ($cboSys == "Dezi") { 
    $Dezimal = $Zahl;
    }
    else if ($cboSys == "Hexa"){
        $Dezimal = hexdec($Zahl);
    }
    else if ($cboSys == "Okta"){
        $Dezimal = octdec($Zahl);
    }
    else if ($cboSys == "Bin"){
        $Dezimal = bindec($Zahl);
    }
    else {echo ("<h1>Fehlerhafte eingabe</h1>"); 
          $Eingabe = false;}
    //Wenn alles stimmt wird die Dezimalzahl in die restlichen Zahlensysteme konvertiert
    if($Eingabe == true && $Dezimal !== ""){
        $Hexadezimal = dechex($Dezimal);
        $Oktal = decoct($Dezimal);
        $Binar = decbin($Dezimal);
    }
?>
<!-- Code section ends -->

<!-- Home section starts -->

<section class="Home">
  <div class="content"><img style="float:right"width="600" height="602"src="assets/logo.png">
    <form method="post" action="main.php">
      <h2>Zahlensystem Rechner</h2>
      <p>Bitte Geben sie die zu Konvertierende Zahl ein: </p> <input type="text" name="Zahl" size="20 " style="border: 3px solid #87CEEB;background-color: #708090;" ><br><br>
      <p>Bitte wählen sie das Zahlensystem aus: </p>
        <select class="selectdiv" name="cboSys" size="1"style="border: 3px solid #87CEEB;background-color: #708090;">
            <option selected value=""> </option >
            <option value="Dezi">Dezimalsystem</option >
            <option value="Hexa">Hexadezimalsystem</option >
            <option value="Okta">Oktalsystem</option >
            <option value="Bin">Binärsystem</option >
        </select><br><br>
            <input class="btn" type="Submit"value="Rechnen" name="cmdTaste"></input>
  </form>
  <br>
      <h2>Zahlensystem Rechner</h2>
  <p>Binärsystem</p> <input type="text" name="BinValue" value="<?php echo $Binar; ?>"size="20"style="border: 3px solid #87CEEB;background-color: #708090;"readonly>
  <p>Oktalsystem</p> <input type="text" name="OctValue" value="<?php echo $Oktal; ?>"size="20"style="border: 3px solid #87CEEB;background-color: #708090;"readonly>
  <p>Dezimalsystem</p> <input type="text" name="DecValue" value="<?php echo $Dezimal; ?>"size="20"style="border: 3px solid #87CEEB;background-color: #708090;"readonly>
  <p>Hexadezimalsystem</p> <input type="text" name="HexValue" value="<?php echo $Hexadezimal; ?>"size="20"style="border: 3px solid #87CEEB;background-color: #708090;"readonly>
  </div>
                                        
</section>

<!-- Home section ends -->

<!-- Footer section starts -->

<?php
require("footer.php")
?>

<!-- Footer section ends -->