<!DOCTYPE html>
<!-- Duncan Werner CS 3010 Project 4 -->
<html lang="en">
<head>
    <title>Dogs are great</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="registration.js"></script>
</head>
<body>
<?php
    session_start();
    include "validation.php";
    include 'insertValidData.php';
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
        <form id="registrationForm" method="POST" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 text-left">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div id="userNameDiv" class="form-group <?php echo $regForm["userName"][0];?>">
                            <label for="userName">User Name:</label>
                            <input id="userName" name="userName" class="form-control" required
                                   type="text" placeholder="User Name" value="<?php echo $regForm["userName"][2];?>" onblur="checkUserName();"/>
                            <span id="userNameErr" class="help-block <?php echo $regForm["userName"][1];?>"><?php echo $regForm["userName"][3];?></span>
                        </div>
                        <div id="passwordDiv" class="form-group <?php echo $regForm["password"][0];?>">
                            <label for="password">Password:</label>
                            <input id="password" name="password" class="form-control" required
                                   type="password" value="<?php echo $regForm["password"][2];?>" onblur="checkPassword();"/>
                            <span id="passwordErr" class="help-block <?php echo $regForm["password"][1];?>"><?php echo $regForm["password"][3];?></span>
                        </div>
                        <div id="passwordRepeatDiv" class="form-group <?php echo $regForm["passwordRepeat"][0];?>">
                            <label for="passwordRepeat">Repeat Password:</label>
                            <input id="passwordRepeat" name="passwordRepeat" class="form-control" required
                                   type="password" value="<?php echo $regForm["passwordRepeat"][2];?>" onblur="checkPasswordRepeat();"/>
                            <span id="passwordRepeatErr" class="help-block <?php echo $regForm["passwordRepeat"][1];?>"><?php echo $regForm["passwordRepeat"][3];?></span>
                        </div>
                        <div id="firstNameDiv" class="form-group <?php echo $regForm["firstName"][0];?>">
                            <label for="firstName">First Name:</label>
                            <input id="firstName" name="firstName" class="form-control" required
                                   type="text" placeholder="John" value="<?php echo $regForm["firstName"][2];?>" onblur="checkFirstName();"/>
                            <span id="firstNameErr" class="help-block <?php echo $regForm["firstName"][1];?>"><?php echo $regForm["firstName"][3];?></span>
                        </div>
                        <div id="lastNameDiv" class="form-group <?php echo $regForm["lastName"][0];?>">
                            <label for="lastName">Last Name:</label>
                            <input id="lastName" name="lastName" class="form-control" required
                                   type="text" placeholder="Wick" value="<?php echo $regForm["lastName"][2];?>" onblur="checkLastName();"/>
                            <span id="lastNameErr" class="help-block <?php echo $regForm["lastName"][1];?>"><?php echo $regForm["lastName"][3];?></span>
                        </div>
                        <div id="emailDiv" class="form-group <?php echo $regForm["email"][0];?>">
                            <label for="email">Email:</label>
                            <input id="email" name="email" class="form-control" required
                                   type="text" placeholder="email@domain.com" value="<?php echo $regForm["email"][2];?>"onblur="checkEmail();"/>
                            <span id="emailErr" class="help-block <?php echo $regForm["email"][1];?>"><?php echo $regForm["email"][3];?></span>
                        </div>
                        <div id="phoneDiv" class="form-group <?php echo $regForm["phone"][0];?>">
                            <label for="phone">Phone:</label>
                            <input id="phone" name="phone" class="form-control" required
                                   type="text" placeholder="xxx-xxx-xxxx" value="<?php echo $regForm["phone"][2];?>" onblur="checkPhone();"/>
                            <span id="phoneErr" class="help-block <?php echo $regForm["phone"][1];?>"><?php echo $regForm["phone"][3];?></span>
                        </div>
                        <div id="birthDiv" class="form-group <?php echo $regForm["birth"][0];?>">
                            <label for="birth">Birthday:</label>
                            <input id="birth" name="birth" class="form-control" required
                                   type="date" value="<?php echo $regForm["birth"][2];?>" onblur="checkBirth();"/>
                            <span id="birthErr" class="help-block <?php echo $regForm["birth"][1];?>"><?php echo $regForm["birth"][3];?></span>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div id="address1Div" class="form-group <?php echo $regForm["address1"][0];?>">
                            <label for="address1">Address Line 1:</label>
                            <input id="address1" name="address1" class="form-control" required
                                   type="text" placeholder="221 Baker St." value="<?php echo $regForm["address1"][2];?>" onblur="checkAddress1();"/>
                            <span id="address1Err" class="help-block <?php echo $regForm["address1"][1]?>"><?php echo $regForm["address1"][3]?></span>
                        </div>
                        <div id="address2Div" class="form-group <?php echo $regForm["address2"][0];?>">
                            <label for="address2">Address Line 2:</label>
                            <input id="address2" name="address2" class="form-control"
                                   type="text" placeholder="" value="<?php echo $regForm["address2"][2];?>" onblur="checkAddress2();"/>
                            <span id="address2Err" class="help-block <?php echo $regForm["address2"][1]?>"><?php echo $regForm["address2"][3]?></span>
                        </div>
                        <div id="cityDiv" class="form-group <?php echo $regForm["city"][0];?>">
                            <label for="city">City:</label>
                            <input id="city" name="city" class="form-control" required
                                   type="text" placeholder="St. Louis" value="<?php echo $regForm["city"][2];?>" onblur="checkCity();"/>
                            <span id="cityErr" class="help-block <?php echo $regForm["city"][1]?>"><?php echo $regForm["city"][3]?></span>
                        </div>
                        <div id="stateDiv" class="form-group <?php echo $regForm["state"][0];?>">
                            <label for="state">State:</label>
                            <input id="state" name="state" class="form-control" required
                                   type="text" placeholder="Missouri" value="<?php echo $regForm["state"][2];?>" onblur="checkState();"/>
                            <span id="stateErr" class="help-block <?php echo $regForm["state"][1]?>"><?php echo $regForm["state"][3]?></span>
                        </div>
                        <div id="zipDiv" class="form-group <?php echo $regForm["zip"][0];?>">
                            <label for="zip">Zip:</label>
                            <input id="zip" name="zip" class="form-control" required
                                   type="text" placeholder="xxxxx-xxxx" value="<?php echo $regForm["zip"][2];?>" onblur="checkZip();"/>
                            <span id="zipErr" class="help-block <?php echo $regForm["zip"][1]?>"><?php echo $regForm["zip"][3]?></span>
                        </div>
                        <div id="genderDiv" class="form-group <?php echo $regForm["gender"][0];?>">
                            <label for="gender">Gender:</label>
                            <input id="gender" name="gender" class="form-control" required
                                   type="text" placeholder="Male" value="<?php echo $regForm["gender"][2];?>" onblur="checkGender();"/>
                            <span id="genderErr" class="help-block <?php echo $regForm["gender"][1]?>"><?php echo $regForm["gender"][3]?></span>
                        </div>
                        <div id="maritalStatusDiv" class="form-group <?php echo $regForm["maritalStatus"][0];?>">
                            <label for="maritalStatus">Marital Status:</label>
                            <input id="maritalStatus" name="maritalStatus" class="form-control" required
                                   type="text" placeholder="Forever Alone" value="<?php echo $regForm["maritalStatus"][2];?>" onblur="checkMaritalStatus();"/>
                            <span id="maritalStatusErr" class="help-block <?php echo $regForm["maritalStatus"][1]?>"><?php echo $regForm["maritalStatus"][3]?></span>
                        </div>
                        <div id="buttonDiv" class="form-group">
                            <input id="submitbutton" type="submit" class="btn btn-success" name="submit" value="Submit" onclick="checkInput();"/>
                            <input type="reset" class="btn btn-info" name="reset" value="Reset" onclick="resetForm();"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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

</body>
</html>
