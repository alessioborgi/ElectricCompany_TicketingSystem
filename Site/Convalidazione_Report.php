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
            <img src="images/HelpDesk.jpg" alt="Happy Help Desk"/><h1>ELECTROSERVICE</h1>
                    

            <div class="row">
                <div class="col-sm-6">
                <img src="images/cliente.png" alt="Help Desk Cliente"/>
                    <h1 class="display-4 text-center"><br>Validation Area</h1>
                </div>

                <div class="jumbotron col-sm-6" style="background-color:lavender;">
                    <form method="post" action="Confirm_Report.php" autocomplete="on">
                    <h1>Report Validation</h1>
                            <div class="form-group">
                                <label for="Client_Convalidation">Client Validation:</label> <br>
                                <input type="text" id="Client_Convalidation" name="Client_Convalidation" placeholder="Write    Yes     to Convalidate the Report"  class="form-control" required>
                            </div>
                                                    
                            <div class="form-group">
                                <label for="Client_Comment">Client Comment:</label> <br>
                                <textarea name = "Client_Comment" id = "Client_Comment" cols= "65" rows="6" placeholder="Client Comment" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ID_Ticket"> Ticket ID:</label>
                                <?php
                                $Usr=$_POST['Usr'];
                                echo '<input type="text" id="ID_Ticket" name="ID_Ticket" placeholder="' . $Usr . '" class="form-control" value="' . $Usr . '"readonly>';
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="ID_Report">Report ID:</label>
                                <?php
                                $Usr1=$_POST['Usr1'];
                                echo '<input type="text" id="ID_Report" name="ID_Report" placeholder="' . $Usr1 . '" class="form-control" value="' . $Usr1 . '"readonly>';
                                ?>
                            </div>
                            <div>
                                <button type="submit"  onclick="register()">Report Validation</button>
                            </div><br>
                            <div id="alert">
                            </div>
                    </form>

                </div>
            </div>
        </div>
        </body>
<footer class="text-center card-footer fixed-bottom">
    <p>&copy Alessio Borgi</p>
</footer>
</html>