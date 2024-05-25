<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates some basic HTML content elements and CSS" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="author" content="A Lecturer"  />
  <title>Designing Tomorrow: AI Systems for a Smarter Future</title>
  <link href="styles/style.css" rel="stylesheet"/>
</head>
<body>
<?php
include("menu.inc");
require_once("settings.php");
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

function sanitise_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (!$conn) {
    echo "<p>Database Connection failure</p>";
} else {
    if (isset($_POST["jobReference"])) {
        $jobReference = $_POST["jobReference"];
        $jobReference = sanitise_input($jobReference);
    } else {
        header("location: index.php");
    }
    if (isset($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
        $firstname = sanitise_input($firstname);

    }
    if (isset($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
        $lastname = sanitise_input($lastname);
    }
    if (isset($_POST["dob"])) {
        $dob = $_POST["dob"];
        $dob = sanitise_input($dob);
    }
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    }
    if (isset($_POST["Address"])) {
        $Address = $_POST["Address"];
        $Address = sanitise_input($Address);
    }
    if (isset($_POST["suburb"])) {
        $suburb = $_POST["suburb"];
        $suburb = sanitise_input($suburb);
    }
    if (isset($_POST["state"])) {
        $state = $_POST["state"];
        $state = sanitise_input($state);
    }
    if (isset($_POST["postcode"])) {
        $postcode = $_POST["postcode"];
        $postcode = sanitise_input($postcode);
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $email = sanitise_input($email);
    }
    if (isset($_POST["phoneno"])) {
        $phoneno = $_POST["phoneno"];
        $phoneno = sanitise_input($phoneno);
    }
    $skill = "";
    if (isset($_POST["backend"])) {
        $skill = $skill . "backend, ";
    }
    if (isset($_POST["frontend"])) {
        $skill = $skill . "frontend, ";
    }
    if (isset($_POST["calculation"])) {
        $skill = $skill . "calculation, ";
    }
    if (isset($_POST["communication"])) {
        $skill = $skill . "communication, ";
    }
    if (isset($_POST["teamwork"])) {
        $skill = $skill . "teamwork, ";
    }
    if (isset($_POST["other-skills"])) {
        $skill = $skill . "otherskills, ";
    }

    $skill = substr($skill, 0, -2);

    if (isset($_POST["otherskills"])) {
        $otherskill = $_POST["otherskills"];
        $otherskill = sanitise_input($otherskill);
    }

    $errMsg = "";
    $result = true;
    if ($jobReference == "") {
        $errMsg .= "<p>Job Reference Number cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^[a-zA-Z0-9 ]{5}$/", $jobReference)) {
        $errMsg .= "<p>Get reference code from Jobs page.</p>";
        $result = false;
    }
    if ($firstname == "") {
        $errMsg .= "<p>First name cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^[A-Za-z ]{1,20}$/", $firstname)) {
        $errMsg .= "<p>First name must be alpha charaters only and maximun 20 characters.</p>";
        $result = false;
    }
    if ($lastname == "") {
        $errMsg .= "<p>Last name cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^[A-Za-z ]{1,20}$/", $lastname)) {
        $errMsg .= "<p>Last name must be alpha charaters only and maximun 20 characters.</p>";
        $result = false;
    }
    if ($gender == "") {
        $errMsg .= "<p>You must choose your gender.</p>";
        $result = false;
    }
    if ($dob == "") {
        $errMsg .= "<p>Date of bith cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[012])\/(19|20)\d\d$/", $dob)) {
        $errMsg .= "<p> Date of Birth must be in the form (dd/mm/yyyy).</p>";
        $result = false;
    }
    $input_year = intval(substr($dob, -4));
    $current_year = intval(date("Y"));
    $age = $current_year - $input_year;
    if (!($age >= 15 && $age <= 80)) {
        $errMsg .= "<p>You must be between 15 and 80 years old</p>";
        $result = false;
    }

    if ($Address == "") {
        $errMsg .= "<p>Address cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^.{1,39}$/", $Address)) {
        $errMsg .= "<p>Address must be less than 40 characters</p>";
        $result = false;
    }
    if ($suburb == "") {
        $errMsg .= "<p>Suburb cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^.{1,39}$/", $suburb)) {
        $errMsg .= "<p>Suburb must be less than 40 characters</p>";
        $result = false;
    }
    if ($state == "") {
        $errMsg .= "<p>State cannot be empty.</p>";
        $result = false;
    }
    if ($postcode == "") {
        $errMsg .= "<p>Postcode cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^[0-9]{4}$/", $postcode)) {
        $errMsg .= "<p>Postcode must be exactly 4 characters</p>";
        $result = false;
    } else if ($state == "VIC") {
        if (!($postcode[0] == "3" || $postcode[0] == "8")) {
            $errMsg = "Postcode does not match selected state.\n";
            $result = false;
        }
    } else if ($state == "NSW") {
        if (!($postcode[0] == "1" || $postcode[0] == "2")) {
            $errMsg = "Postcode does not match selected state.\n";
            $result = false;
        }
    } else if ($state == "QLD") {
        if (!($postcode[0] == "4" || $postcode[0] == "9")) {
            $errMsg = "Postcode does not match selected state.\n";
            $result = false;
        }
    } else if ($state == "NT") {
        if (!($postcode[0] == "0")) {
            $errMsg = "Postcode does not match selected state.\n";
            $result = false;
        }
    } else if ($state == "WA") {
        if (!($postcode[0] == "6")) {
            $errMsg = "Postcode does not match selected state.\n";
            $result = false;
        }
    } else if ($state == "SA") {
        if (!($postcode[0] == "5")) {
            $errMsg = "Postcode does not match selected state.\n";
            $result = false;
        }
    } else if ($state == "TAS") {
        if (!($postcode[0] == "7")) {
            $errMsg = "Postcode does not match selected state.\n";
            $result = false;
        }
    } else if ($state == "TAS") {
        if (!($postcode[0] == "0")) {
            $errMsg = "Postcode does not match selected state.\n";
            $result = false;
        }
    }
    if ($email == "") {
        $errMsg .= "<p>Email cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/", $email)) {
        $errMsg .= "<p>Email must be in the fomat example@gmail.com";
        $result = false;
    }
    if ($phoneno == "") {
        $errMsg .= "<p>Phone number cannot be empty.</p>";
        $result = false;
    } elseif (!preg_match("/^[0-9 ]{8,12}$/", $phoneno)) {
        $errMsg .= "<p>Phone number must 8 to 12 digits, or spaces";
        $result = false;
    }

    if (isset($_POST["other-skills"])) {
        if ($otherskill == "") {
            $errMsg .= "<p>Other Skills text area cannot be blank if selected. </p>";
            $result = false;
        }
    } else {
        if ($otherskill != "") {
            $errMsg .= "<p>Please tick 'other skills' box. </p>";
            $result = false;
        }
    }

    if ($errMsg != "") {
        echo "<p>$errMsg</p>";
    }

    if ($result) {
        $sql_table = "EOI";
        $query = "create table if not exists $sql_table (
            EOInumber int auto_increment primary key,
            job_ref_code varchar(5),
            firstname varchar(20),
            lastname varchar(20),
            street varchar(40),
            suburb varchar(40),
            state varchar(10),
            postcode varchar(4),
            email varchar(255),
            phone varchar(12),
            skills varchar(255),
            other_skills varchar(255),
            status enum('New','Current','Final') default 'New');";
        $execute = mysqli_query($conn, $query);
        if ($execute) {
            $query = "insert into $sql_table
            (job_Ref_Code,firstname,lastname,street,suburb,state,postcode,email,phone,skills,other_skills)
            values
            ('$jobReference','$firstname','$lastname','$Address','$suburb','$state','$postcode','$email','$phoneno','$skill','$otherskill');";
            $execute = mysqli_query($conn, $query);
            if ($execute) {
                $sql_table = "EOI";
                $query = "select EOInumber from $sql_table
                where Email = '$email'";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p>Something is wrong with the ", $query, "</p>";
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $EIOnumber = $row["EOInumber"];
                    }
                }
                echo "<p>Successfully added new candidate. \n Please find your ID: $EIOnumber</p>";
            } else {
                echo "<p>Something is wrong with ", $query, "</p>";
            }
        } else {
            echo "<p>Something is wrong with ", $query, "</p>";
        }
        mysqli_close($conn);
    } else {
        echo "<p>Unsuccessfull in adding the new candidate.</p>";
    }
}
?>
</body>
</html>