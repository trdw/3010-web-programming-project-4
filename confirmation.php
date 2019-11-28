<!DOCTYPE html>
<!-- Duncan Werner CS 3010 Project 3 -->
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
                <?php echo $_POST["userName"];?>
            </p>
            <p class="text-left">
                Name:</br>
                <?php echo $_POST["firstName"] . " " . $_POST["lastName"];?>
            </p>
            <p class="text-left">
                Email:</br>
                <?php echo $_POST["email"];?>
            </p>
            <p class="text-left">
                Phone:</br>
                <?php echo $_POST["phone"];?>
            </p>
            <p class="text-left">
                Address:</br>
                <?php echo $_POST["address1"] . "</br>";
                if (!empty($_POST["address2"])) {
                    echo $_POST["address2"] . "</br>";
                }
                echo $_POST["city"] . ", " . $_POST["state"] . " " . $_POST["zip"]?>
            </p>
            <p class="text-left">
                Gender:</br>
                <?php echo $_POST["gender"];?>
            </p>
            <p class="text-left">
                Birthday:</br>
                <?php echo substr($_POST["birth"], 5, 2) . "/" .
                substr($_POST["birth"], 8, 2) . "/" .
                substr($_POST["birth"], 0, 4);?>
            </p>
            <p class="text-left">
                Marital Status:</br>
                <?php echo $_POST["maritalStatus"];?>
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
