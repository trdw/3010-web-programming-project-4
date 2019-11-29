<!DOCTYPE html>
<!-- Duncan Werner CS 3010 Project 4 -->
<html lang="en">
<head>
	<title>Dogs are great</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'selectUserData.php';
?>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<img src="dog.png" alt="Dog logo" id="logo">
		</div>
	</div>
</nav>

<div class="container-fluid text-center">
	<div class="row content">
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 sidenav">
			<p><a href="index.html">Home</a></p>
			<p><a href="registration.php">Registration</a></p>
			<p><a href="animations.html">Animations</a></p>
		</div>
		<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" id="indexcontent">
			<p class="text-left">Thank you for registering!</p>
            <p class="text-left">
                User Name:</br>
                <?php echo $assocArray["userName"];?>
            </p>
            <p class="text-left">
                Name:</br>
                <?php echo $assocArray["firstName"] . " " . $assocArray["lastName"];?>
            </p>
            <p class="text-left">
                Email:</br>
                <?php echo $assocArray["email"];?>
            </p>
            <p class="text-left">
                Phone:</br>
                <?php echo $assocArray["phone"];?>
            </p>
            <p class="text-left">
                Address:</br>
                <?php echo $assocArray["address1"] . "</br>";
                if (!empty($assocArray["address2"])) {
                    echo $assocArray["address2"] . "</br>";
                }
                echo $assocArray["city"] . ", " . $assocArray["state"] . " " . $assocArray["zip"]?>
            </p>
            <p class="text-left">
                Gender:</br>
                <?php echo $assocArray["gender"];?>
            </p>
            <p class="text-left">
                Birthday:</br>
                <?php echo substr($assocArray["birth"], 5, 2) . "/" .
                substr($assocArray["birth"], 8, 2) . "/" .
                substr($assocArray["birth"], 0, 4);?>
            </p>
            <p class="text-left">
                Marital Status:</br>
                <?php echo $assocArray["maritalStatus"];?>
            </p>

		</div>
	</div>

	<footer class="container-fluid text-center">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
			<p><a href="https://en.wikipedia.org/wiki/Australian_Cattle_Dog" target="_blank">Australian Cattle Dog</a></p>
			<p><a href="https://en.wikipedia.org/wiki/German_Shepherd">German Shepherd</a></p>
			<p><a href="https://en.wikipedia.org/wiki/Rhodesian_Ridgeback">Rhodesian Ridgeback</a></p>

		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
			<p><a href="https://en.wikipedia.org/wiki/Border_Collie">Border Collie</a></p>
			<p><a href="https://en.wikipedia.org/wiki/Labrador_Retriever">Labrador Retriever</a></p>
			<p><a href="https://en.wikipedia.org/wiki/Great_Dane">Great Dane</a></p>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
			<p><a href="https://en.wikipedia.org/wiki/Rat_Terrier">Rat Terrier</a></p>
			<p><a href="https://en.wikipedia.org/wiki/Anatolian_Shepherd">Anatolian Shepherd</a></p>
			<p><a href="https://en.wikipedia.org/wiki/Dobermann">Dobermann</a></p>
		</div>
	</footer>
</div>
</body>
</html>
