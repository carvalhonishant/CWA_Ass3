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

<?php include 'menu.inc'; ?>
<h2>Managment Page</h2>
        <form action="manage.php" method="post">
            <fieldset>
                <legend>Show all the Candidates-</legend>
                <p><input type="submit" name="show" value="Click here to retrieve data for all candidates"></p>
            </fieldset>
        </form>
        <?php
        session_start();
        if (isset($_POST["show"])) {
            require_once('settings.php');
            $conn = @mysqli_connect(
                $host,
                $user,
                $pwd,
                $sql_db
            );
            if (!$conn) {
                echo "<p class=\"wrong\">Database connection failure</p>";
            } else {
                $sql_table = "EOI";
                $query = "select * from $sql_table";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
                } else {
                    if (mysqli_num_rows($result) > 0) {
                        // Display records
                        echo "<table border=\"1\">";
                        echo "<tr>\n"
                            . "<th scope=\"col\">EOI Number</th>\n"
                            . "<th scope=\"col\">Job Reference Code</th>\n"
                            . "<th scope=\"col\">First Name</th>\n"
                            . "<th scope=\"col\">Last Name</th>\n"
                            . "<th scope=\"col\">Street</th>\n"
                            . "<th scope=\"col\">Suburb</th>\n"
                            . "<th scope=\"col\">State</th>\n"
                            . "<th scope=\"col\">Postcode</th>\n"
                            . "<th scope=\"col\">Email</th>\n"
                            . "<th scope=\"col\">Phone</th>\n"
                            . "<th scope=\"col\">Skills</th>\n"
                            . "<th scope=\"col\">Other Skills</th>\n"
                            . "<th scope=\"col\">Status</th>\n"
                            . "</tr>\n";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            foreach ($row as $data) {
                                echo "<td>" . htmlspecialchars($data) . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                        mysqli_free_result($result);
                    }
                }
                mysqli_close($conn);
            }
        }
        ?>
        <br>
        <form method="post" action="manage.php">
            <fieldset>
                <legend>Search Candidates By Job Reference Number-</legend>
                <p> <label for="job_ref_code">Job Reference Number: </label>
                    <input type="text" name="job_ref_code" id="job_ref_code" />
                </p>
                <p> <input type="submit" value="Search Candidate" /></p>
            </fieldset>
        </form>
        <hr />
        <?php
        if (isset($_POST["job_ref_code"])) {
            $refcode = trim($_POST["job_ref_code"]);
            if (!$refcode == "") {
                require_once('settings.php');
                $conn = @mysqli_connect(
                    $host,
                    $user,
                    $pwd,
                    $sql_db
                );
                if (!$conn) {
                    echo "<p class=\"wrong\">Database connection failure</p>";
                } else {
                    $sql_table = "EOI";
                    $query = "select * from $sql_table where job_ref_code like '%$refcode%'";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
                    } else {
                        if (mysqli_num_rows($result) > 0) {
                            // Display records
                            echo "<table border=\"1\">";
                            echo "<tr>\n"
                                . "<th scope=\"col\">EOI Number</th>\n"
                                . "<th scope=\"col\">Job Reference Code</th>\n"
                                . "<th scope=\"col\">First Name</th>\n"
                                . "<th scope=\"col\">Last Name</th>\n"
                                . "<th scope=\"col\">Street</th>\n"
                                . "<th scope=\"col\">Suburb</th>\n"
                                . "<th scope=\"col\">State</th>\n"
                                . "<th scope=\"col\">Postcode</th>\n"
                                . "<th scope=\"col\">Email</th>\n"
                                . "<th scope=\"col\">Phone</th>\n"
                                . "<th scope=\"col\">Skills</th>\n"
                                . "<th scope=\"col\">Other Skills</th>\n"
                                . "<th scope=\"col\">Status</th>\n"
                                . "</tr>\n";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                foreach ($row as $data) {
                                    echo "<td>" . htmlspecialchars($data) . "</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                            mysqli_free_result($result);
                        }
                    }
                    mysqli_close($conn);
                }
            }
        }
        ?>
        <br>
        <form method="post" action="manage.php">
            <fieldset>
                <legend>Search Candidates By Name-</legend>
                <p> <label for="firstname">First Name: </label>
                    <input type="text" name="firstname" id="firstname" />
                </p>
                <p> <label for="lastname">Last Name: </label>
                    <input type="text" name="lastname" id="lastname" />
                </p>
                <p> <input type="submit" value="Search Candidate" /></p>
            </fieldset>
        </form>
        <hr />
        <?php
        if (isset($_POST["firstname"]) || isset($_POST["lastname"])) {
            $firstname = trim($_POST["firstname"]);
            $lastname = trim($_POST["lastname"]);
            if (!$firstname == "" || !$lastname == "") {
                require_once('settings.php');
                $conn = @mysqli_connect(
                    $host,
                    $user,
                    $pwd,
                    $sql_db
                );
                if (!$conn) {
                    echo "<p class=\"wrong\">Database connection failure</p>";
                } else {
                    $sql_table = "EOI";
                    $query = "select * from $sql_table where firstname = '$firstname' or lastname = '$lastname'";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
                    } else {
                        if (mysqli_num_rows($result) > 0) {
                            // Display records
                            echo "<table border=\"1\">";
                            echo "<tr>\n"
                                . "<th scope=\"col\">EOI Number</th>\n"
                                . "<th scope=\"col\">Job Reference Code</th>\n"
                                . "<th scope=\"col\">First Name</th>\n"
                                . "<th scope=\"col\">Last Name</th>\n"
                                . "<th scope=\"col\">Street</th>\n"
                                . "<th scope=\"col\">Suburb</th>\n"
                                . "<th scope=\"col\">State</th>\n"
                                . "<th scope=\"col\">Postcode</th>\n"
                                . "<th scope=\"col\">Email</th>\n"
                                . "<th scope=\"col\">Phone</th>\n"
                                . "<th scope=\"col\">Skills</th>\n"
                                . "<th scope=\"col\">Other Skills</th>\n"
                                . "<th scope=\"col\">Status</th>\n"
                                . "</tr>\n";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                foreach ($row as $data) {
                                    echo "<td>" . htmlspecialchars($data) . "</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</table>";
                            mysqli_free_result($result);
                        }
                    }
                    mysqli_close($conn);
                }
            }
        }
        ?>
        <br>
        <form method="post" action="manage.php">
            <fieldset>
                <legend>Delete Candidates By Job Reference Code-</legend>
                <p> <label for="refcode">Job Reference Code: </label>
                    <input type="text" name="refcode" id="refcode" />
                </p>
                <p> <input type="submit" value="Delete Candidate" /></p>
            </fieldset>
        </form>
        <hr />
        <?php
        if (isset($_POST["refcode"])) {
            $refcode = trim($_POST["refcode"]);
            if (!$refcode == "") {
                require_once('settings.php');
                $conn = @mysqli_connect(
                    $host,
                    $user,
                    $pwd,
                    $sql_db
                );
                if (!$conn) {
                    echo "<p class=\"wrong\">Database connection failure</p>";
                } else {
                    $sql_table = "EOI";
                    $query = "delete from $sql_table where job_ref_code = '$refcode'";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
                    } else {
                        echo "Succesfully deleted all the candidates for job reference number '$refcode'";
                    }
                    mysqli_close($conn);
                }
            }
        }
        ?>
        <br>
        <form method="post" action="manage.php">
            <fieldset>
                <legend>Change Candidate Status-</legend>
                <p> <label for="eoinumber">EOI Number: </label>
                    <input type="text" name="eoinumber" id="eoinumber" />
                </p>
                <p> <label for="status">Status: </label>
                    <select name="status" id="status">
                        <option value="">Please Select</option>
                        <option value="New">New</option>
                        <option value="Current">Current</option>
                        <option value="Final">Final</option>
                    </select>
                </p>
                <p> <input type="submit" value="Update Status" /></p>
            </fieldset>
        </form>
        <hr />
        <?php
        if (isset($_POST["eoinumber"]) && isset($_POST["status"])) {
            $eoinumber = trim($_POST["eoinumber"]);
            $status = trim($_POST["status"]);
            if (!$eoinumber == "" && !$status == "") {
                require_once('settings.php');
                $conn = @mysqli_connect(
                    $host,
                    $user,
                    $pwd,
                    $sql_db
                );
                if (!$conn) {
                    echo "<p class=\"wrong\">Database connection failure</p>";
                } else {
                    $sql_table = "EOI";
                    $query = "update $sql_table set Status = '$status' where EOInumber = '$eoinumber'";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
                    } else {
                        echo "Succesfully updated status of the candidate with EOI number '$eoinumber' to '$status'";
                    }
                    mysqli_close($conn);
                }
            }
        }
        ?>

<?php include 'footer.inc';?>


</body>
</html>