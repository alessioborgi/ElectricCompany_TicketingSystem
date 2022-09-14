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
    <title>HappyHD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color:#ff8c00;" onload="init()">


<?php
    $hostname = "localhost";
    $username= "root";
    $password= "";
    $database= "helpdesk";
    
    $priorita = $_POST["Ticket_Priority"];
    $guasto = $_POST["Fault_Type"];
    $descrizione = $_POST["Problem_Description"];
    $richiedente = $_POST["Applicant_Name"];
    $apertura = $_POST["Ticket_Opening"];
    //$chiusura = $_POST["Ticket_Closure"];
    
    
    //connessione
    $db = new mysqli($hostname, $username, $password, $database);
    
    //check connection
    if($db->connect_error)
        echo "Errore!";   
    else{
        echo "Ottimo, si è connesso a " . $database . "<br>";
    }
    $strSQL= "INSERT INTO `tickets` (`ID_Cliente`, `Priorita_Ticket`, `Tipologia_Guasto`, `Descrizione_Problema`, `Nominativo_Richiedente`, `Data_Apertura`) 
    VALUES ('$richiedente', '$priorita', '$guasto', '$descrizione', '$richiedente', '$apertura');";
    
    if($db->query($strSQL) === TRUE)
    {
        echo '<script type="text/javascript">
                alert(" Ticket Registration Done! ")
                window.location.href = "index.html"
                </script>';
    }
    Else
    {
            echo '<script type="text/javascript">
			alert(" Ticket Registration Failed ")
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