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
                <h1 class="display-6 text-center">ELECTROSERVICE HelpDesk<br> Report Summary Area</h1>
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
    $Usr1=$_POST['Usr1'];
    


    //Query sul Database. 
    $query = "select * from Reports where ID_Ticket = '$Usr1';";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)!=0)
    {
        echo "<table border>";
        echo "<tr>";
        echo "<th> Report ID </th>";
        echo "<th> Ticket ID </th>";
        echo "<th> Technician1 Name </th>";
        echo "<th> Technician2 Name</th>";
        echo "<th> Problem Solved </th>";
        echo "<th> Client Validation </th>";
        echo "<th> Client Comment</th>";
        echo "<th> Time To Fix </th>";
        echo "<th> Report Validations </th>";
        echo "</tr>";
    
    while ($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>$row[ID_Report] </td>";
            $Usr1 = $row['ID_Report'];
            echo "<td>$row[ID_Ticket] </td>";
            echo "<td>$row[Nome_Tecnico1] </td>";
            echo "<td>$row[Nome_Tecnico2] </td>";
            echo "<td>$row[Problema_Risolto] </td>";
            echo "<td>$row[Convalidazione_Cliente] </td>";
            echo "<td>$row[Commento_Cliente] </td>";
            echo "<td>$row[Durata_Intervento] </td>";
            ?>
            <td>
            <form method="post" action="Convalidazione_Report.php">
                <br>
                <?php
                    echo '<input type="hidden" name="Usr1" value="' . $Usr1 . '">';
                    echo '<input type="hidden" name="Usr" value="' . $Usr . '">';
                ?>
                &emsp;<input type="submit" class="btn" value="Validation"></input>
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


