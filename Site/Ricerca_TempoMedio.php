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
<div class="container">
                <img src="images/Helpdesk.jpg" alt="Help Desk ELECTROSERVICE" /> 
                <h1 class="display-6 text-center">ELECTROSERVICE Management<br> Ticket Closure - Average Time</h1>
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
    
    

    //Query sul Database. 
   

    
    $inizio = mysqli_real_escape_string($conn, stripcslashes(trim($_POST['Inizio'])));
	$fine   = mysqli_real_escape_string($conn, stripcslashes(trim($_POST['Fine'])));
    
    

    
    $query = "SELECT AVG(Data_Chiusura - Data_Apertura) as media
	          FROM Tickets 
			  WHERE Data_Chiusura != '0000-00-00'
			  AND Data_Chiusura BETWEEN '$inizio' AND '$fine'
			  AND Data_Apertura BETWEEN '$inizio' AND '$fine'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $avg = $row['media'] / 1;
    $avgh = $avg *24;
    $avgm = $avgh *60;
    $avgs = $avgm *60;
    
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo "<table border>";
        echo "<tr>";
        echo "<th> Search Start Date </th>";
        echo "<th> Search End Date  </th>";
        echo "<th> Average Time - Days </th>";
        echo "<th> Average Time - Hours </th>";
        echo "<th> Average Time - Minutes </th>";
        echo "<th> Average Time - Seconds </th>";
        echo "</tr>";
    
    
        
        echo "<tr>";
        echo "<td>$inizio </td>";
        echo "<td>$fine </td>";
        echo "<td>$avg Days </td>";
        echo "<td>$avgh Hours </td>";
        echo "<td>$avgm Minutes </td>";
        echo "<td>$avgs Seconds </td>";
        echo "</tr>";
        ?>
        &emsp;  &emsp;  &emsp;  &emsp;  &emsp;  &emsp;  &emsp;
        <?php
        
        echo "</table>";
    }

    //Chiusura della Connessione
    
    mysqli_close($conn)
    ;

    ?>
<style>
                .btn {
                    display: inline-block;
  font-size: 12px;
  font-weight: bold;
  color: rgba(255,255,255,.6);
  text-shadow: 1px 1px rgba(0,0,0,.3);
  text-decoration: none;
  padding: 20px;
  border-radius: 15px;
  background: rgb(10,120,10);
  box-shadow:
   inset 0 0 3px 1px rgba(0,0,0,.8),
   inset rgba(0,0,0,.3) -5px -5px 8px 5px,
   inset rgba(255,255,255,.5) 5px 5px 8px 5px,
   1px 1px 1px rgba(255,255,255,.1),
   -2px -2px 5px rgba(0,0,0,.5);
  transition: .2s;
}
a.boxShadow4:hover {
  color: rgba(255,255,255,.9);
  background: rgb(20,130,20);
}
a.boxShadow4:active {
  background: rgb(0,110,0);
  box-shadow:
   inset 0 0 5px 3px rgba(0,0,0,.8),
   inset rgba(0,0,0,.3) -5px -5px 8px 5px,
   inset rgba(255,255,255,.5) 5px 5px 8px 5px,
   1px 1px 1px rgba(255,255,255,.2),
   -2px -2px 5px rgba(0,0,0,.5);
              }
            </style>
    
</body>
<footer class="text-center card-footer fixed-bottom">
    <p>&copy Alessio Borgi</p>
</footer>
</html>



