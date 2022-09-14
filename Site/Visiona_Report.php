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
<div class="container">
                <img src="images/Helpdesk.jpg" alt="Help Desk ELECTROSERVICE" /> 
                <h1 class="display-6 text-center">HelpDesk ELECTROSERVICE<br> Report Summary Area</h1>
                <form>
                        <INPUT TYPE="button" VALUE="Back" 
                        onClick="history.go(-1);return true;" 
                        style="background-color: #ce401c; 
                        width: 10em;
                        padding: .5em;
                        color: #ffffff;
                        text-shadow: 1px 1px 1px #000;
                        font: 16px Arial, Helvetica, sans-serif;
                        border: solid thin #882d13;
                        -webkit-border-radius: .7em;
                        -moz-border-radius: .7em;
                        border-radius: .7em;
                        background-image: -webkit-gradient(linear, left top, left bottom,
                        from(#e9ede8), to(#ce401c),color-stop(0.4, #8c1b0b));">
                </form>
                <br>
                  
                    
    <?php

    $hostname = "localhost";
    $username = "root";
    $password = "";

    //Apertura della Connessione con il Server MYSQL

    $conn = mysqli_connect($hostname, $username, $password);
    if(! $conn)
    {
        die('Errore durante la connessione: ' . mysql_error()) .'<br>';
    }
    //echo "Connessione a MYSQL effettuata con successo".'<br>';



    //Selezione del Database HelpDesk 

    $db1 = mysqli_select_db($conn, "HelpDesk");
    if(!$db1)
    {
        die('Accesso al Database HelpDesk non riuscito: '.mysqli_error($conn)).'<br>';
    }
    //echo "Accesso al Database HelpDesk effettuato con successo".'<br>';


    $Usr=$_POST['Usr'];

    //Query sul Database. 
    $query = "select * from Reports where ID_Ticket = '$Usr';";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)!=0)
    {
        echo "<table border>";
        echo "<tr>";
        echo "<th> Report ID </th>";
        echo "<th> Ticket ID </th>";
        echo "<th> Technician1 Name </th>";
        echo "<th> Technician2 Name </th>";
        echo "<th> Problem Solved </th>";
        echo "<th> Client Validation </th>";
        echo "<th> Client Comment</th>";
        echo "<th> Time To Fix</th>";
        echo "</tr>";
    
    while ($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>$row[ID_Report] </td>";
            echo "<td>$row[ID_Ticket] </td>";
            echo "<td>$row[Nome_Tecnico1] </td>";
            echo "<td>$row[Nome_Tecnico2] </td>";
            echo "<td>$row[Problema_Risolto] </td>";
            echo "<td>$row[Convalidazione_Cliente] </td>";
            echo "<td>$row[Commento_Cliente] </td>";
            echo "<td>$row[Durata_Intervento] </td>";
            echo "</tr>";
        }
    echo "</table>";
    }

    //Chiusura della Connessione
    
    mysqli_close($conn)
    ;

    ?>
    
</body>
<footer class="text-center card-footer fixed-bottom">
    <p>&copy Alessio Borgi</p>
</footer>
</html>


