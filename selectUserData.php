<?php
	try {
	    session_start();
		$last_id = $_SESSION["last_id"];
		//echo "<br/>ID: $last_id<br/>";
		$conn = new PDO("mysql:host=localhost;dbname=dogpeople",
            "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT userName,
            password,
            firstName,
            lastName,
            email,
            phone,
            birth,
            address1,
            address2,
            city,
            state,
            zip,
            gender,
            maritalStatus ".
		" FROM registration WHERE id = :last_id");
		$stmt->bindParam(':last_id', $last_id);
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		//var_dump($stmt->fetchAll()[0]);
		$assocArray = $stmt->fetchAll()[0];
	}
	catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	} finally {
		$conn = null;
	}
?>