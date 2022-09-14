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
                <h1 class="display-6 text-center">ELECTROSERVICE Clients<br> Ticket Summary Area</h1>
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
    $query = "select * from tickets where ID_Cliente = '$Usr' and Data_Chiusura = '0000-00-00';";
    //$name = "select Nome_Cliente, Cognome_Cliente from Cliente where ID_Cliente = '$Usr';";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)!=0)
    {
        echo "<table  border>";
        echo "<tr>";
        echo "<th> Ticket ID </th>";
        echo "<th> Cliente ID </th>";
        echo "<th> Ticket Priority </th>";
        echo "<th> Fault Type </th>";
        echo "<th> Problem Description </th>";
        echo "<th> Open Date </th>";
        echo "<th> Closure Date </th>";
        echo "<th> Reports </th>";
        echo "<th> Closure Data Settings</th>";
        echo "</tr>";
    
    while ($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>$row[ID_Ticket] </td>";
            echo "<td>$row[ID_Cliente] </td>";
            $Usr1 = $row['ID_Ticket'];
            echo "<td>$row[Priorita_Ticket] </td>";
            echo "<td>$row[Tipologia_Guasto] </td>";
            echo "<td>$row[Descrizione_Problema] </td>";
            echo "<td>$row[Data_Apertura] </td>";
            echo "<td>$row[Data_Chiusura] </td>";
            ?>
            <td>
            <form method="post" action="Visiona_Report1.php">
                <br>
                <?php
                    echo '<input type="hidden" name="Usr" value="' . $Usr . '">';
                     echo '<input type="hidden" name="Usr1" value="' . $Usr1 . '">';
                ?>
                <input type="submit" class="btn" value="Reports"></input>
            </form>
            </td>
            <td>
            <form method="post" action="Data_Chiusura.php">
                <br>
                <?php
                    echo '<input type="hidden" name="Usr" value="' . $Usr . '">';
                    echo '<input type="hidden" name="Usr1" value="' . $Usr1 . '">';
                ?>
                <input type="submit" class="btn" value="Closure Data"></input>
            </form>
            </td>
            <?php
            echo "</tr>";
            ?>
            &emsp;  &emsp;  &emsp;  &emsp;  &emsp;  &emsp;  &emsp;
            <?php
        }
        
    echo "</table>";
    }

    //Chiusura della Connessione
    
    mysqli_close($conn)
    ;

    ?>
            <style>
                        .btn {
                        position: relative;
                        display: inline-block;
                        color: #777674;
                        font-weight: bold;
                        text-decoration: none;
                        text-shadow: rgba(255,255,255,.5) 1px 1px, rgba(100,100,100,.3) 3px 7px 3px;
                        user-select: none;
                        padding: 1em 2em;
                        outline: none;
                        border-radius: 3px / 100%;
                        background-image:
                        linear-gradient(45deg, rgba(255,255,255,.0) 30%, rgba(255,255,255,.8), rgba(255,255,255,.0) 70%),
                        linear-gradient(to right, rgba(255,255,255,1), rgba(255,255,255,0) 20%, rgba(255,255,255,0) 90%, rgba(255,255,255,.3)),
                        linear-gradient(to right, rgba(125,125,125,1), rgba(255,255,255,.9) 45%, rgba(125,125,125,.5)),
                        linear-gradient(to right, rgba(125,125,125,1), rgba(255,255,255,.9) 45%, rgba(125,125,125,.5)),
                        linear-gradient(to right, rgba(223,190,170,1), rgba(255,255,255,.9) 45%, rgba(223,190,170,.5)),
                        linear-gradient(to right, rgba(223,190,170,1), rgba(255,255,255,.9) 45%, rgba(223,190,170,.5));
                        background-repeat: no-repeat;
                        background-size: 200% 100%, auto, 100% 2px, 100% 2px, 100% 1px, 100% 1px;
                        background-position: 200% 0, 0 0, 0 0, 0 100%, 0 4px, 0 calc(100% - 4px);
                        box-shadow: rgba(0,0,0,.5) 3px 10px 10px -10px;
                    }
                    a.button9:hover {
                        transition: .5s linear;
                        background-position: -200% 0, 0 0, 0 0, 0 100%, 0 4px, 0 calc(100% - 4px);
                    }
                    a.button9:active {
                        top: 1px;
                    }
            </style>
           
    
</body>
<footer class="text-center card-footer fixed-bottom">
    <p>&copy Alessio Borgi</p>
</footer>
</html>


