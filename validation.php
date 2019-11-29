<?php
$regForm = array("userName" => array("", "hide", "", "Please enter a user name"),
    "password" => array("","hide","", "Please enter a password"),
    "passwordRepeat" => array("","hide","", "Please enter repeat your password"),
    "firstName" => array("","hide","", "Please enter a first name"),
    "lastName" => array("","hide","", "Please enter a last name"),
    "email" => array("","hide","", "Please enter an email address"),
    "phone" => array("","hide","", "Please enter a phone number"),
    "birth" => array("","hide","", "Please enter a birth date"),
    "address1" => array("","hide","", "Please enter a street address"),
    "address2" => array("","hide","", "", "Invalid user name"),
    "city" => array("","hide","", "Please enter a city name"),
    "state" => array("","hide","", "Please enter a state name"),
    "zip" => array("","hide","", "Please enter a zip code"),
    "gender" => array("","hide","", "Please enter a gender"),
    "maritalStatus" => array("","hide","", "Please enter a marital status") );

$isValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    if(array_key_exists("reset", $_POST) && $_POST["reset"] == "Reset") {
        foreach ($regForm as $key => $value) {
            $regForm[$key][2] = "";
        }
    } else {
        $isValid = true;

        foreach ($regForm as $key => $value) {
            $regForm[$key][2] = cleanInput($_POST[$key]);
        }

        $key = "userName";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a user name";
        } else {
            if (strlen($regForm[$key][2]) < 6 || strlen($regForm[$key][2]) > 30) {
                errorize($key);
            } else {
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
                    $sql = $conn->prepare("SELECT ID from registration where userName = :userName");
                    $sql->bindParam(':userName',$regForm["userName"][2]);
                    $sql->execute();
                    if ( empty($sql->fetch())) {
                        validize($key);
                    } else {
                        errorize($key);
                        $regForm[$key][3] = "Great minds think alike! That user name is already taken.";
                    }
                } catch(PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                } finally {
                    $conn = null;
                }

            }
        }

        $key = "password";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a password";
        } else {
            if (strlen($regForm[$key][2]) < 8 || strlen($regForm[$key][2]) > 50 ||
                preg_match('/[!@#$%^&*()_+\-=\[\]{};:]/', $regForm[$key][2]) !== 1 ||
                preg_match('/[a-z]/', $regForm[$key][2]) !== 1 ||
                preg_match('/[A-Z]/', $regForm[$key][2]) !== 1 ||
                preg_match('/[0-9]/', $regForm[$key][2]) !== 1) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "passwordRepeat";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please repeat your password";
        } else {
            if (strlen($regForm[$key][2]) < 8 || strlen($regForm[$key][2]) > 50 ||
                preg_match('/[!@#$%^&*()_+\-=\[\]{};:]/', $regForm[$key][2]) !== 1 ||
                preg_match('/[a-z]/', $regForm[$key][2]) !== 1 ||
                preg_match('/[A-Z]/', $regForm[$key][2]) !== 1 ||
                preg_match('/[0-9]/', $regForm[$key][2]) !== 1) {
                errorize($key);
            } else if ($regForm[$key][2] != $regForm["password"][2]) {
                errorize($key);
                $regForm[$key][3] = "Passwords must match!";
            } else {
                validize($key);
            }
        }

        $key = "firstName";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a first name";
        } else {
            if (strlen($regForm[$key][2]) > 50) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "lastName";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a last name";
        } else {
            if (strlen($regForm[$key][2]) > 50) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "email";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter an email address";
        } else {
            // check if e-mail address is well-formed
            if (!filter_var($regForm[$key][2], FILTER_VALIDATE_EMAIL)) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "phone";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a phone number";
        } else {
            if (strlen($regForm[$key][2]) < 10 || strlen($regForm[$key][2]) > 12 ||
                (preg_match('/^[0-9]{10}$/', $regForm[$key][2]) === 0 &&
                    preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $regForm[$key][2]) === 0)) {
                errorize($key);
            } else {
                validize($key);
                if (strlen($regForm[$key][2]) == 10) {
                    $regForm[$key][2] = substr($regForm[$key][2], 0, 3) . "-" .
                        substr($regForm[$key][2], 3, 3) . "-" .
                        substr($regForm[$key][2], 6, 4);
                }
            }
        }

        $key = "birth";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a birth day";
        } else {
            //if the date is really old or in the future, the entry is invalid
            if (substr($regForm[$key][2],0,4) < 1900 || substr($regForm[$key][2],0,4) > date("Y") ||
                (substr($regForm[$key][2],0,4) == date("Y") && substr($regForm[$key][2],5,2) > date("m") ) ||
                (substr($regForm[$key][2],0,4) == date("Y") && substr($regForm[$key][2],5,2) == date("m")  &&
                    substr($regForm[$key][2],8,2) > date("d"))) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "address1";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a street address";
        } else {
            if (strlen($regForm[$key][2]) > 100) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "address2";
        if (strlen($regForm[$key][2]) > 100) {
            errorize($key);
        } else {
            validize($key);
        }

        $key = "city";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a city name";
        } else {
            if (strlen($regForm[$key][2]) > 50) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "state";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a city name";
        } else {
            if (strlen($regForm[$key][2]) > 52) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "zip";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a zip code";
        } else {
            if (strlen($regForm[$key][2]) < 5 || strlen($regForm[$key][2]) > 10 ||
                (preg_match('/^[0-9]{5}$/', $regForm[$key][2]) === 0 &&
                    preg_match('/^[0-9]+-[0-9]+$/', $regForm[$key][2]) === 0)) {
                errorize($key);
            } else {
                validize($key);
                if (strlen($regForm[$key][2]) == 10) {
                    preg_match('/^[0-9]+/',$regForm[$key][2], $match1);
                    preg_match('/[0-9]+$/',$regForm[$key][2], $match2);
                    $regForm[$key][2] = substr_replace($match1[0] . $match2[0], "-", 5, 0);
                }
            }
        }

        $key = "gender";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a gender";
        } else {
            if (strlen($regForm[$key][2]) > 50) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        $key = "maritalStatus";
        if (empty($regForm[$key][2])) {
            errorize($key);
            $regForm[$key][3] = "Please enter a marital status";
        } else {
            if (strlen($regForm[$key][2]) > 50) {
                errorize($key);
            } else {
                validize($key);
            }
        }

        //Enforcement of phone and zip formatting is preserved
        foreach ($regForm as $key => $value) {
            $_POST[$key] = $regForm[$key][2];
        }
    }
}

function errorize($key) {
    global $regForm;
    global $isValid;
    $regForm[$key][0] = "has-error";
    $regForm[$key][1] = "show";
    $regForm[$key][3] = "Invalid entry";
    $isValid = false;
}

function validize($key) {
    global $regForm;
    $regForm[$key][0] = "has-success";
    $regForm[$key][1] = "hide";
}

function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>