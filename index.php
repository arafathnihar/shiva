 <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "shiva";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = '
        SELECT a.CustomID AS AgentID, o.CustomID AS OrderID, o.Reciever, o.RequestAmount, o.ExchangeRate
        FROM ORDERS AS o
        INNER JOIN AGENTS AS a ON o.AgentID = a.ID
    ';

    $result = $conn->query($sql);

    // global $resultArray = array();

    
?> 
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Material Design - Responsive Table</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            height: auto;
        }
    </style>
</head>
<body>
<div id="demo">
    <div class="btn-group btn-group-justified">
        <div class="btn-group">
            <a href="index.php" type="button" class="btn btn-default">Order List</a>
        </div>
        <div class="btn-group">
            <a href="addAgent.php" type="button" class="btn btn-default" style="border-left: solid;border-right: solid;
    border-width: 1px;">Add Agent</a>
        </div>
        <div class="btn-group">
            <a href="addOrder.php" type="button" class="btn btn-default" >Add Order</a>
        </div>
    </div>
    <h1>Mother House Money Transfer</h1>
    <!--<h2>Table of my other Material Design works (list was updated 08.2015)</h2>-->
    <!-- Responsive table starts here -->
    <!-- For correct display on small screens you must add 'data-title' to each 'td' in your table -->
    <div class="table-responsive-vertical shadow-z-1">
        <!-- Table starts here -->
        <table id="table" class="table table-hover table-mc-light-blue">
            <thead>
            <tr>
                <th>AG</th>
                <th>ORD</th>
                <th>Name</th>
                <th style="text-align: right">Unit</th>
                <th style="text-align: right">CHF</th>
                <th style="text-align: right">Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php 
                if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // echo "Agent: " . $row["AgentID"] . " - Order: " . $row["OrderID"] . " - Reciever: " . $row["Reciever"] . " - Request Amount: " . $row["RequestAmount"] . " - Exchange Rate: " . $row["ExchangeRate"] . "<br>";
            // array_push($resultArray, $row);
            echo '<tr>
                <td data-title="AG">'.$row["AgentID"].'</td>
                <td data-title="ORD">'.$row["OrderID"].'</td>
                <td data-title="Name"> '.$row["Reciever"].'</td>
                <td data-title="Unit" style="text-align: right">'.$row["ExchangeRate"].'</td>
                <td data-title="CHF" style="text-align: right">'.$row["RequestAmount"].'</td>
                <td data-title="Amount" style="text-align: right">'.$row["RequestAmount"]*$row["ExchangeRate"].'</td>
            </tr>';
        }

    } else {
        echo "0 results";
    }
    $conn->close();
            ?>
            <!-- <tr>
                <td data-title="AG">128</td>
                <td data-title="ORD">643</td>
                <td data-title="Name"> T.AIROJAN,SAMPATH BANK,AC-105554931265,VAVUNIYA</td>
                <td data-title="Amount">1,000,000.00</td>
                <td data-title="Unit">150.49</td>
                <td data-title="CHF">6,645.00</td>
            </tr>
            <tr>
                <td data-title="AG">0</td>
                <td data-title="ORD">653</td>
                <td data-title="Name"> RATHINY NISHANTHAN,TP ORDER KARAN </td>
                <td data-title="Amount">300,000.00</td>
                <td data-title="Unit">150.00</td>
                <td data-title="CHF">2,000.00</td>
            </tr>
            <tr>
                <td data-title="AG">101</td>
                <td data-title="ORD">661</td>
                <td data-title="Name"> IYATHURAI YOGANANTHAM,B0C,AC-78549032,COLOM BO-06 </td>
                <td data-title="Amount">149,500.00</td>
                <td data-title="Unit">149.50</td>
                <td data-title="CHF">1,000.00</td>
            </tr>
            <tr>
                <td data-title="AG">101</td>
                <td data-title="ORD">464</td>
                <td data-title="Name"> VADIVEL VASANTHAN,P BANK,AC-110200180058309,KAITHADY </td>
                <td data-title="Amount">195,000.00</td>
                <td data-title="Unit">150.00</td>
                <td data-title="CHF">1,300.00</td>
            </tr>
            <tr>
                <td data-title="AG">1667</td>
                <td data-title="ORD">665</td>
                <td data-title="Name"> NESAN COLOMBO </td>
                <td data-title="Amount">330,000.00</td>
                <td data-title="Unit">165.00</td>
                <td data-title="CHF">2,000.00</td>
            </tr> -->
            </tbody>
        </table>
    </div>
    <!-- Table Constructor change table classes, you don't need it in your project -->
    <div style="width: 45%; display: none; vertical-align: top">
        <h2>Table Constructor</h2>
        <p> <label for="table-bordered">Style: bordered</label> <select id="table-bordered" name="table-bordered">
            <option value="">No</option>
            <option selected value="table-bordered">Yes</option>
        </select> </p>
        <p> <label for="table-striped">Style: striped</label> <select id="table-striped" name="table-striped">
            <option value="">No</option>
            <option selected value="table-striped">Yes</option>
        </select> </p>
        <p> <label for="table-hover">Style: hover</label> <select id="table-hover" name="table-hover">
            <option value="">No</option>
            <option selected value="table-hover">Yes</option>
        </select> </p>
        <p> <label for="table-color">Style: color</label> <select id="table-color" name="table-color">
            <option value="">Default</option>
            <option value="table-mc-red">Red</option>
            <option value="table-mc-pink">Pink</option>
            <option value="table-mc-purple">Purple</option>
            <option value="table-mc-deep-purple">Deep Purple</option>
            <option value="table-mc-indigo">Indigo</option>
            <option value="table-mc-blue">Blue</option>
            <option value="table-mc-light-blue">Light Blue</option>
            <option value="table-mc-cyan">Cyan</option>
            <option value="table-mc-teal">Teal</option>
            <option value="table-mc-green">Green</option>
            <option selected value="table-mc-light-green">Light Green</option>
            <option value="table-mc-lime">Lime</option>
            <option value="table-mc-yellow">Yellow</option>
            <option value="table-mc-amber">Amber</option>
            <option value="table-mc-orange">Orange</option>
            <option value="table-mc-deep-orange">Deep Orange</option>
        </select> </p>
    </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>
</body>

</html>