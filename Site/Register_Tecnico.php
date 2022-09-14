<!DOCTYPE html>
<html lang="en">
<head>
    <title>Help Desk ELECTROSERVICE Register</title>
    <meta Name="Autore"			content="Alessio Borgi">
    <meta Name="Description"    content="5AINF">
    <meta Name="Description"    content="Esercizio Elaborato  Maturità">
</head>
<body style="background-color:#ff8c00;" onload="init()">
<?php

$hostname = "localhost";
$username= "root";
$password= "";

$conn = mysqli_connect($hostname,$username,$password);
If(!$conn)
{
Die('Errore durante la connessione') . mysqli_connect_error() . '<br>';
}

$db1 =mysqli_select_db($conn,'HelpDesk');
If(!$db1)
{
Die ('Accesso al database non riuscito:') . mysqli_error($conn) . '<br>';
}
Echo "Accesso al database riuscito"  . '<br>';

$team = $_POST['Membership_Team'];
$name = $_POST['Name'];
$surname = $_POST['Surname'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$number = $_POST['Number'];
	
$strSQL= "insert into tecnici(Team_Appartenenza, Nome_Tecnico, Cognome_Tecnico, Username_Tecnico, Password_Tecnico, Telefono_Cellulare) 
values('$team','$name','$surname','$username','$password','$number');";
If(mysqli_query($conn,$strSQL))
{
	echo '<script type="text/javascript">
			alert(" Technician Registration Done! ")
			window.location.href = "index_Tecnico.html"
			</script>';

}
Else
{
            echo '<script type="text/javascript">
			alert(" Technician Registration Failed ")
			window.location.href = ""                 
			</script>' . mysqli_error($conn)
			. '<br>';
}


mysqli_close($conn);
 ?>
</body>

<footer class="text-center card-footer fixed-bottom">
    <p>&copy Alessio Borgi</p>
</footer>

</html>
  