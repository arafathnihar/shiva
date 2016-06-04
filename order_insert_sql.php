 <?php
	if (isset($_POST['myform'])) {
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

		// $sql = 'INSERT INTO MyGuests (firstname, lastname, email)
		// VALUES ('John', 'Doe', 'john@example.com')';

		$values = $_POST["myform"];

		$orderID = $values["orderID"];
		$requestAmount = $values["requestAmount"];
		$toCurrency = $values["toCurrency"];
		$exchangeRate = $values["exchangeRate"];
		$agentID = $values["agentID"];
		$reciever = $values["reciever"];
		$guid = uniqid();
		$createdBy = 1; // change
		// $createdOn = date('Y-m-d H:i:s'); // now

		$sql = '
			INSERT INTO ORDERS (CustomID, RequestAmount, ToCurrency, ExchangeRate, AgentID, Status, Reciever, Guid, CreatedBy, CreatedOn)
			VALUES ('.$orderID.', '.$requestAmount.', "'.$toCurrency.'", '.$exchangeRate.', '.$agentID.', 1, "'.$reciever.'", "'.$guid.'", 1, NOW())
		';

		if ($conn->query($sql) === TRUE) {
		    // echo "New record created successfully";
		    header('Location: addOrder.php');
		    exit();
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
?> 