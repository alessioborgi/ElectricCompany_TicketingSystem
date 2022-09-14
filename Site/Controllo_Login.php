
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Help Desk ELECTROSERVICE Login</title>
    <meta Name="Autore"			content="Alessio Borgi">
    <meta Name="Description"    content="5AINF">
    <meta Name="Description"    content="Esercizio Elaborato  Maturità">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color:#ff8c00;" onload="init()">
<?php

$hostname = "localhost";
$user= "root";      //username per accedere al database
$password= "";
$conn = new mysqli("localhost", $user, $password, 'HelpDesk');


   $username = $_POST['Username'];      //username utente
   $password = $_POST['Password'];

$query=" SELECT * FROM Clienti WHERE Username_Cliente = '$username' AND Password_Cliente ='$password';";
$result = mysqli_query($conn,$query);

$risultato = $conn->query($query);

if($row = mysqli_fetch_assoc($risultato)){

            $Usr = $row['ID_Cliente'];
            echo '<script type="text/javascript">
			alert(" You are logged! Welcome in ELECTROSERVICE HelpDesk ")
			</script>';
}
else
{
			echo '<script type="text/javascript">
			alert(" You are not logged! Try Again")
			window.location.href = "index.html"
			</script>';
}
mysqli_close($conn);
?>
            
            <div class="container">
                <img src="images/Helpdesk.jpg" alt="Help Desk ELECTROSERVICE"/><h1>ELECTROSERVICE</h1>
                <div class="row">
                    <div class="col-sm-6">
                    <img src="images/cliente.png" alt="Help Desk Cliente"/>
                    <h1 class="display-4 text-center">Client Ticket Area </h1>
                    </div>
                        <div class="jumbotron col-sm-6" style="background-color:lavender;">
                         <table>
                         
                        <tr>
                            
                                <form method="post" action="Crea_Ticket.php"> 
                                    
                                    <?php
                                    echo '<input type="hidden" name="Usr" value="' . $Usr . '">';
                                    ?>
                                    &emsp; &emsp;  &emsp; &emsp;   &emsp;   &emsp;  &emsp; &emsp;<input type="submit" class="btn" value="Ticket Creation"></input> &emsp;  &emsp;  &emsp; 
                                </form>
                            
                        </tr>
                        <tr>
                        <td>
                        <form method="post" action="Crea_Ticket.php"> 
                                    
                                    <?php
                                    echo '<input type="hidden" name="Usr" value="' . $Usr . '">';
                                    ?>
                                   
                                </form>
                        </td>
                        </tr>
                            <td>
                                <form method="post" action="Visiona_Ticket.php">
                                    <br>
                                    
                                    <?php
                                    echo '<input type="hidden" name="Usr" value="' . $Usr . '">';
                                    ?>
                                    &emsp; &emsp;  &emsp; &emsp;   &emsp;   &emsp;  &emsp; &emsp;<input type="submit" class="btn" value="Tickets Review"></input> 
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post" action="Ticket_Chiusi.php">  
                                    <br> 
                                    <?php
                                    echo '<input type="hidden" name="Usr" value="' . $Usr . '">';
                                    ?>
                                   &emsp; &emsp;  &emsp; &emsp;   &emsp;   &emsp;  &emsp; &emsp;<input type="submit" class="btn" value="Closed Tickets"></input>
                                </form>
                            </td>
                        </tr>
                        </table>
                        </div>
                    </div>
            </div><style>
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
 <input type="hidden" name="Usr" value="">
 </body>

<footer class="text-center card-footer fixed-bottom">
    <p>&copy Alessio Borgi</p>
</footer>

</html>