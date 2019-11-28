<?php
	if ($isValid) {
		try {
			$conn = new PDO("mysql:host=localhost",
                "root", "");
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sq1 = $conn->prepare ("CREATE DATABASE IF NOT EXISTS dogpeople");
            $sq1 -> execute();
			$sql = $conn->prepare("INSERT INTO registration 
            (userName,
            password,
            passwordRepeat,
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
			VALUES (:userName, '', '', '', :website,
			'', :comment, '', '', :email, :gender,
			'', CURDATE())");
//			$sql->bindParam(':userName', $regForm["userName"][0]);
//			$sql->bindParam(':website', $website);
//			$sql->bindParam(':comment', $comment);
//			$sql->bindParam(':email', $email);
//			$sql->bindParam(':gender', $gender);
//
//			$sql->execute();
			
			$last_id = $conn->lastInsertId();
			$_SESSION["last_id"] = "$last_id";
			
			header("Location: confirmation.php");
		}
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		} finally {
			$conn = null;
		}
	}
?>