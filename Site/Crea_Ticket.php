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
                <img src="images/cliente.png" alt="Help Desk Cliente"/>
                    <h1 class="display-4 text-center">Tickets Area</h1>
                </div>

                <div class="jumbotron col-sm-6" style="background-color:lavender;">
                    <form method="post" action="Ticket_Approvato.php" autocomplete="on">
                    <h1>New Ticket</h1>
                            <div class="form-group">
                                <label for="Ticket_Priority">Ticket Priority:</label> <br>
                                <select name="Ticket Priority">
                                    <option value = "Low"> Low </option>
                                    <option value = "Medium"> Medium </option>
                                    <option value = "High"> High  </option>
                                    <option value = "Critical"> Critical </option>
                                <select> 
                            </div>

                            <div class="form-group">
                            <label for="Fault_Type">Fault Type:</label> <br>
                                <select name="Fault_Type">
                                    <option value = "Ascensore Hardware"> Elevator Hardware </option>
                                    <option value = "Ascensore Software"> Elevator Software </option>
                                    <option value = "Pannelli Solari"> Solar Panels  </option>
                                    <option value = "Computer Hardware"> Computer Hardware </option>
                                    <option value = "Computer Software"> Computer Software </option>
                                <select> 
                            </div>
                            <div class="form-group">
                                <label for="Problem_Description">Problem Description:</label> <br>
                                <textarea name = "Problem_Description" cols= "65" rows="6" placeholder="Problem Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="Applicant_Name">Client Name:</label>
                                <?php
                                $Usr=$_POST['Usr'];
                                echo '<input type="text" id="Applicant_Name" name="Applicant_Name" placeholder="' . $Usr . '" class="form-control" value="' . $Usr . '"readonly>';
                                ?>
                                
                            </div>
                            <div class="form-group">
                                <label for="Ticket_Opening">Ticket Opening:</label>
                                <input type="date" name="Ticket_Opening" value="" min="01-06-2020" max="31-12-2080">
                            </div>
                            <div>
                                <input type="hidden" name="Ticket_Closure" value="01-01-1939" readonly>
                            </div>
                            <div>
                                <button type="submit"   class= "btn" onclick="register()">Register</button>
                            </div><br>
                            <div id="alert">
                            </div>
                    </form>

                </div>
            </div>
        </div>
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