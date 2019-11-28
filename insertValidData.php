<?php
	if ($isValid) {
		try {
			$conn = new PDO("mysql:host=localhost",
                "root", "");
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec ("CREATE DATABASE IF NOT EXISTS dogpeople");
            $conn->exec ("use dogpeople");

                $result = $conn->exec ("CREATE TABLE IF NOT EXISTS registration (
                ID INT AUTO_INCREMENT,
                userName varchar(255) NOT NULL,
                password varchar(255) NOT NULL,
                passwordRepeat varchar(255) NOT NULL,
                firstName varchar(255) NOT NULL,
                lastName varchar(255) NOT NULL,
                email varchar(255) NOT NULL,
                phone varchar(255) NOT NULL,
                birth date,
                address1 varchar(255) NOT NULL,
                address2 varchar(255) NOT NULL,
                city varchar(255) NOT NULL,
                state varchar(255) NOT NULL,
                zip varchar(255) NOT NULL,
                gender varchar(255) NOT NULL,
                maritalStatus varchar(255) NOT NULL,
                PRIMARY KEY (ID))");



//			$sql = $conn->prepare("INSERT INTO registration
//            (userName,
//            password,
//            passwordRepeat,
//            firstName,
//            lastName,
//            email,
//            phone,
//            birth,
//            address1,
//            address2,
//            city,
//            state,
//            zip,
//            gender,
//            maritalStatus)
//			VALUES (:userName, '', '', '', :website,
//			'', :comment, '', '', :email, :gender,
//			'', CURDATE())");
//			$sql->bindParam(':userName', $regForm["userName"][0]);
//
//			$sql->execute();
			
			$last_id = $conn->lastInsertId();
			$_SESSION["last_id"] = "$last_id";
			
			//header("Location: confirmation.php");
		}
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		} finally {
			$conn = null;
		}
	}
?>