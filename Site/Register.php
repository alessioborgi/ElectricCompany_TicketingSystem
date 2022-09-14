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

$name = $_POST['Name'];
$surname = $_POST['Surname'];
$email = $_POST['Email'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$address = $_POST['Address'];
$number = $_POST['Number'];
	
$strSQL= "insert into clienti(Nome_Cliente, Cognome_Cliente, Email_Cliente, Username_Cliente, Password_Cliente, Indirizzo_Cliente, Telefono_Cliente) 
values('$name','$surname','$email','$username','$password','$address','$number');";
If(mysqli_query($conn,$strSQL))
{
	echo '<script type="text/javascript">
			alert(" Client Registration Done ")
			window.location.href = "index.html"
			</script>';

}
Else
{
            echo '<script type="text/javascript">
			alert(" Client Registration Failed ")
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
  