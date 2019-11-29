<?php
	if ($isValid) {
		try {
		    session_start();
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



			$sql = $conn->prepare("INSERT INTO registration
            (userName,
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
            maritalStatus)
			VALUES (:userName,
			:password,
            :firstName,
            :lastName,
            :email,
            :phone,
            :birth,
            :address1,
            :address2,
            :city,
            :state,
            :zip,
            :gender,
            :maritalStatus )");
			$sql->bindParam(':userName', $regForm["userName"][2]);
            $sql->bindParam(':password', $regForm["password"][2]);
            $sql->bindParam(':firstName', $regForm["firstName"][2]);
            $sql->bindParam(':lastName', $regForm["lastName"][2]);
            $sql->bindParam(':email', $regForm["email"][2]);
            $sql->bindParam(':phone', $regForm["phone"][2]);
            $sql->bindParam(':birth', $regForm["birth"][2]);
            $sql->bindParam(':address1', $regForm["address1"][2]);
            $sql->bindParam(':address2', $regForm["address2"][2]);
            $sql->bindParam(':city', $regForm["city"][2]);
            $sql->bindParam(':state', $regForm["state"][2]);
            $sql->bindParam(':zip', $regForm["zip"][2]);
            $sql->bindParam(':gender', $regForm["gender"][2]);
            $sql->bindParam(':maritalStatus', $regForm["maritalStatus"][2]);

			$sql->execute();
			
			$last_id = $conn->lastInsertId();
			$_SESSION["last_id"] = "$last_id";
		}
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		} finally {
			$conn = null;
		}
	}
?>