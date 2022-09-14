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
    <title>HelpDesk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color:#ff8c00;" onload="init()">


<?php
    $hostname = "localhost";
    $username= "root";
    $password= "";
    $database= "HelpDesk";
    
       
    //connessione
    $db = new mysqli($hostname, $username, $password, $database);
    
    //check connection
    if($db->connect_error)
        echo "Errore!";   
    else{
        echo "Astonishing, You're Connected to " . $database . "<br>";
    }

    $chiusura = $_POST["Ticket_Closure"];
    
    $ticket = $_POST["ID_Ticket"];
    $report = $_POST["ID_Report"];
    $strSQL  = " UPDATE Tickets set Data_Chiusura = '$chiusura' where ID_Ticket = '$ticket';";
    
      
    if($db->query($strSQL) === TRUE)
    {
        echo '<script type="text/javascript">
                alert(" Ticket Closure Done Correctly! ")
                window.location.href = "index.html"
                </script>';
    }
    Else
    {
            echo '<script type="text/javascript">
			alert(" Ticket Closure Failed ")
			window.location.href = ""                 
			</script>'
			. '<br>';
    }
?>
</body>
<footer class="text-center card-footer fixed-bottom">
    <p>&copy Alessio Borgi</p>
</footer>
</html>