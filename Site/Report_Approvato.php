<!DOCTYPE html>
<html lang="en">
<head>
    <title>Help Desk ELECTROSERVICE</title>
    <meta Name="Autore"			content="Alessio Borgi">
    <meta Name="Description"    content="5AINF">
    <meta Name="Description"    content="Esercizio Elaborato  Maturità">
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HelpDesk ELECTROSERVICE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color:#ff8c00;" onload="init()">


<?php
    $hostname = "localhost";
    $username= "root";
    $password= "";
    $database= "helpdesk";
    
    $tecnico1 = $_POST["Technician1_Name"];
    $tecnico2 = $_POST["Technician2_Name"];
    $problem = $_POST["Problem_Solved"];
    $convalidazione = $_POST["Client_Convalidation"];
    $commento = $_POST["Client_Comment"];
    $ticket = $_POST["ID_Ticket"];
    $durata = $_POST["Durata_Intervento"];
    
    //connessione
    $db = new mysqli($hostname, $username, $password, $database);
    
    //check connection
    if($db->connect_error)
        echo "Errore!";   
    else{
        echo "Ottimo, si è connesso a " . $database . "<br>";
    }
    $strSQL= "INSERT INTO `Reports` (`ID_Ticket`, `Nome_Tecnico1`, `Nome_Tecnico2`, `Problema_Risolto`, `Convalidazione_Cliente`, `Commento_Cliente`, `Durata_Intervento`) 
    VALUES ('$ticket', '$tecnico1', '$tecnico2', '$problem', '$convalidazione', '$commento', '$durata');";
    
    if($db->query($strSQL) === TRUE)
    {
        echo '<script type="text/javascript">
                alert(" Report Registration Done! ")
                window.location.href = "index_Tecnico.html"
                </script>';
    }
    Else
    {
            echo '<script type="text/javascript">
			alert(" Report Registration Failed ")
			window.location.href = ""                 
			</script>' . mysqli_error($conn)
			. '<br>';
    }
?>
</body>
<footer class="text-center card-footer fixed-bottom">
    <p>&copy Alessio Borgi</p>
</footer>
</html>