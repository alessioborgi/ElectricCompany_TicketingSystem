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
            <img src="images/HelpDesk.jpg" alt="Happy Help Desk"/><h1>ELECTROSERVICE</h1>
                    

            <div class="row">
                <div class="col-sm-6">
                <img src="images/tecnico.jpg" alt="Help Desk Cliente"/>
                    <h1 class="display-4 text-center">Add Report Insertion Area</h1>
                </div>

                <div class="jumbotron col-sm-6" style="background-color:lavender;">
                    <form method="post" action="Report_Approvato.php" autocomplete="on">
                    <h1>New Report</h1>
                            <div class="form-group">
                                <label for="Technician1_Name">Technician1 Name:</label> <br>
                                <input type="text" id="Technician1_Name" name="Technician1_Name" placeholder="Technician1 Name" class="form-control"required>
                            </div>

                            <div class="form-group">
                                <label for="Technician2_Name">Technician2 Name:</label> <br>
                                <input type="text" id="Technician2_Name" name="Technician2_Name" placeholder="Technician2 Name" class="form-control">
                            </div>

                            <div class="form-group">
                            <label for="Problem_Solved">Problem Solved:</label> <br>
                                <select name="Problem_Solved">
                                    <option value = "No"> No </option>
                                    <option value = "Yes"> Yes </option>
                            </select> 
                            </div>
                            <div class="form-group">
                                <label for="Client_Convalidation">Client Convalidation:</label> <br>
                                <input type="text" id="Client_Convalidation" name="Client_Convalidation" placeholder="Not Yet" class="form-control" readonly>
                            </div>
                                                    
                            <div class="form-group">
                                <label for="Client_Comment">Client Comment:</label> <br>
                                <textarea name = "Client_Comment" cols= "65" rows="6" placeholder="Client Comment" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ID_Ticket">Ticket ID:</label>
                                <?php
                                $Usr=$_POST['Usr'];
                                echo '<input type="text" id="ID_Ticket" name="ID_Ticket" placeholder="' . $Usr . '" class="form-control" value="' . $Usr . '"readonly>';
                                ?>
                            
                            </div>
                            <div class="form-group">
                            <label for="Durata_Intervento">Time To Fix:</label> <br>
                                <select name="Durata_Intervento">
                                    <option value = "1"> 1 </option>
                                    <option value = "2"> 2 </option>
                                    <option value = "3"> 3 </option>
                                    <option value = "4"> 4 </option>
                                    <option value = "5"> 5 </option>
                                    <option value = "6"> 6 </option>
                                    <option value = "7"> 7 </option>
                                    <option value = "8"> 8 </option>
                            </select> 
                            </div>
                                <div>
                                <button type="submit"  onclick="register()">Register Report</button>
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