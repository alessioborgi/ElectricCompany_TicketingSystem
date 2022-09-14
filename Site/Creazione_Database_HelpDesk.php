<html>
<head>
		<Title>Alessio Borgi Creazione Database Elaborato Finale Maturità</Title>
		<Meta Name="Autore"			content="Alessio Borgi">
		<Meta Name="Description"    content="Elaborato Finale">
</head>


<body bgcolor = "#ff8c00">

	<font face="Arial" size="3" color="Black">
	<h1 Align="Center">Database HelpDesk Creation</h1>
	</font> 

	<div class="container">
		<img src="images/HelpDesk.jpg" alt="Happy Help Desk"/><br><br><br><br>

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



	//Creazione del Database Helpdesk

	$strSQL = "CREATE DATABASE HelpDesk;";
	if (mysqli_query($conn, $strSQL))
	{
		//echo "Database Helpdesk Creato Correttamente".'<br>';
	}
	else
	{
		echo "Errore nella Creazione del Database Helpdesk: ".mysqli_error($conn).'<br>';
	}



	//Selezione del Database Helpdesk

	$db1 = mysqli_select_db($conn, "HelpDesk");
	if(!$db1)
	{
		die('Accesso al Database HelpDesk non riuscito: '.mysqli_error($conn)).'<br>';
	}
	//echo "Accesso al Database HelpDesk Effettuato con Successo".'<br>';




//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



    //Creazione della Tabella Clienti
	$strSQL = "CREATE TABLE Clienti(";
    $strSQL .= "ID_Cliente int NOT NULL AUTO_INCREMENT,";
    $strSQL .= "Nome_Cliente VARCHAR(30),";
	$strSQL .= "Cognome_Cliente VARCHAR(30),";
    $strSQL .= "Email_Cliente VARCHAR(30),";
    $strSQL .= "Username_Cliente VARCHAR(30),";
    $strSQL .= "Password_Cliente VARCHAR(30),";
    $strSQL .= "Indirizzo_Cliente VARCHAR(30),";
    $strSQL .= "Telefono_Cliente INT NOT NULL,";
	$strSQL .= "PRIMARY KEY (ID_Cliente));";
	if(mysqli_query($conn, $strSQL))
	{
		//echo "Tabella Cliente Creata Correttamente".'<br>';
	}
	else
	{
		echo "Errore durante la Creazione della Tabella Cliente: ".mysqli_error($conn).'<br>';
    }
    


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


    //Creazione della Tabella Tickets
	$strSQL1 = "CREATE TABLE Tickets(";
    $strSQL1 .= "ID_Ticket int NOT NULL AUTO_INCREMENT,";
    $strSQL1 .= "ID_Cliente int NOT NULL,";
    $strSQL1 .= "Priorita_Ticket VARCHAR(30),";
	$strSQL1 .= "Tipologia_Guasto VARCHAR(30),";
    $strSQL1 .= "Descrizione_Problema VARCHAR(300),";
    $strSQL1 .= "Nominativo_Richiedente VARCHAR(30),";
    $strSQL1 .= "Data_Apertura DATE NOT NULL,";
    $strSQL1 .= "Data_Chiusura DATE NOT NULL,";
    $strSQL1 .= "PRIMARY KEY (ID_Ticket),";
    $strSQL1 .= "FOREIGN KEY (ID_Cliente) REFERENCES Clienti(ID_Cliente));";
	if(mysqli_query($conn, $strSQL1))
	{
		//echo "Tabella Ticket Creata Correttamente".'<br>';
	}
	else
	{
		echo "Errore durante la Creazione della Tabella Tickets: ".mysqli_error($conn).'<br>';
    }
    



//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




    //Creazione della Tabella Tecnici
	$strSQL2 = "CREATE TABLE Tecnici(";
    $strSQL2 .= "ID_Tecnico int NOT NULL AUTO_INCREMENT,";
    $strSQL2 .= "Team_Appartenenza VARCHAR(30),";
	$strSQL2 .= "Nome_Tecnico VARCHAR(30),";
	$strSQL2 .= "Cognome_Tecnico VARCHAR(30),";
	$strSQL2 .= "Username_Tecnico VARCHAR(30),";
    $strSQL2 .= "Password_Tecnico VARCHAR(30),";
    $strSQL2 .= "Telefono_Cellulare INT NOT NULL,";
	$strSQL2 .= "PRIMARY KEY (ID_Tecnico));";
	if(mysqli_query($conn, $strSQL2))
	{
		//echo "Tabella Tecnico Creata correttamente".'<br>';
	}
	else
	{
		echo "Errore durante la Creazione della Tabella Tecnico: ".mysqli_error($conn).'<br>';
    }
    



//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------





    //Creazione della Tabella Gestori
	$strSQL3 = "CREATE TABLE Gestori(";
	$strSQL3 .= "ID_Ticket int NOT NULL,";
    $strSQL3 .= "ID_Tecnico int NOT NULL,";
    $strSQL3 .= "PRIMARY KEY (ID_Ticket, ID_Tecnico),";
    $strSQL3 .= "FOREIGN KEY (ID_Ticket) REFERENCES Tickets(ID_Ticket),";
    $strSQL3 .= "FOREIGN KEY (ID_Tecnico) REFERENCES Tecnici(ID_Tecnico));";
	if(mysqli_query($conn, $strSQL3))
	{
		//echo "Tabella Gestore Creata correttamente".'<br>';
	}
	else
	{
		echo "Errore durante la Creazione della Tabella Gestori: ".mysqli_error($conn).'<br>';
    }
    
    


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




    //Creazione della Tabella Reports
	$strSQL4 = "CREATE TABLE Reports(";
    $strSQL4 .= "ID_Report int NOT NULL AUTO_INCREMENT,";
    $strSQL4 .= "ID_Ticket int NOT NULL,";
    $strSQL4 .= "Nome_Tecnico1 VARCHAR(30),";
    $strSQL4 .= "Nome_Tecnico2 VARCHAR(30),";
    $strSQL4 .= "Problema_Risolto VARCHAR(30),";
    $strSQL4 .= "Convalidazione_Cliente VARCHAR(30),";
    $strSQL4 .= "Commento_Cliente VARCHAR(300),";
    $strSQL4 .= "Durata_Intervento INT NOT NULL,";
    $strSQL4 .= "PRIMARY KEY (ID_Report),";
    $strSQL4 .= "FOREIGN KEY (ID_Ticket) REFERENCES Tickets(ID_Ticket));";
	if(mysqli_query($conn, $strSQL4))
	{
		//echo "Tabella Report Creata correttamente".'<br>';
	}
	else
	{
		echo "Errore durante la Creazione della Tabella Reports: ".mysqli_error($conn).'<br>';
    }
	
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

   //Creazione della Tabella Dirigenti
   $strSQL5 = "CREATE TABLE Dirigenti(";
   $strSQL5 .= "ID_Dirigente int NOT NULL AUTO_INCREMENT,";
   $strSQL5 .= "Nome_Dirigente VARCHAR(30),";
   $strSQL5 .= "Cognome_Dirigente VARCHAR(30),";
   $strSQL5 .= "Team_AppartenenzaD VARCHAR(30),";
   $strSQL5 .= "Username_Dirigente VARCHAR(30),";
   $strSQL5 .= "Password_Dirigente VARCHAR(30),";
   $strSQL5 .= "PRIMARY KEY (ID_Dirigente));";
   if(mysqli_query($conn, $strSQL5))
   {
	   //echo "Tabella Dirigente Creata correttamente".'<br>';
   }
   else
   {
	   echo "Errore durante la Creazione della Tabella Dirigenti: ".mysqli_error($conn).'<br>';
   }


//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

	//Creazione della Tabella Supervisionamenti
	$strSQL3 = "CREATE TABLE Supervisionamenti(";
	$strSQL3 .= "ID_Tecnico int NOT NULL,";
	$strSQL3 .= "ID_Dirigente int NOT NULL,";
	$strSQL3 .= "PRIMARY KEY (ID_Tecnico, ID_Dirigente),";
	$strSQL3 .= "FOREIGN KEY (ID_Tecnico) REFERENCES Tecnici(ID_Tecnico),";
	$strSQL3 .= "FOREIGN KEY (ID_Dirigente) REFERENCES Dirigenti(ID_Dirigente));";
	if(mysqli_query($conn, $strSQL3))
	{
		//echo "Tabella Supervisionamento Creata correttamente".'<br>';
	}
	else
	{
		echo "Errore durante la Creazione della Tabella Supervisionamenti: ".mysqli_error($conn).'<br>';
	}
	
   



	//Chiusura della Connessione
	mysqli_close($conn);
?>

<br>
        <form method="post" action="index.html">
            <br>
            <input type="submit" class="btn" value="Clients Area"></input>
		</form>
		<form method="post" action="index_Tecnico.html">
            <br>
            <input type="submit" class="btn" value="Technicians Area"></input>
        </form>
		<form method="post" action="index_Dirigente.html">
            <br>
            <input type="submit" class="btn" value="Managers Area"></input>
        </form>




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






