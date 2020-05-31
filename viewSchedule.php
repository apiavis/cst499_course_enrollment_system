<?php
    error_reporting(E_ALL ^ E_NOTICE);
    require_once('Connect.php');
    $myConnection = $newConnection->connection;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> View Schedule </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-sacle=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<?php include 'master.php';?>

    <div class="container text-center">
        <?php 
            if(isset($_SESSION['username'])) {
                echo "<h1>Here is your course schedule, ".$_SESSION['username']."</h1>";
                echo "<br>";
                echo "<h2>You are registered for:</h2>";
                displayCourseSchedule($myConnection,$_SESSION['studentId']);
            }
            else {
                echo "<h1>Welcome to the Profile Page</h1>";
                echo "<h3>Please login or register</h3>";
            }
        ?>
    </div>

<?php include 'footer.php';?>
</body>
</html>

<?php
function displayCourseSchedule($connection,$studentId) {
    $getScheduleQuery =  "SELECT enrollment.student_id, offering.offering_id, course.courseName, offering.year, offering.semester
        FROM ((enrollment
            INNER JOIN offering ON enrollment.offering_id = offering.offering_id
                AND enrollment.student_id = $studentId)
            INNER JOIN course ON course.course_id = offering.course_id)";
    $results = mysqli_query($connection, $getScheduleQuery); 
    if (mysqli_num_rows($results) != 0) { 
        while($row = mysqli_fetch_assoc($results)) {
            $_SESSION['offeringId'] = $row['offering_id'];
            $_SESSION['courseName'] = $row['courseName'];
            $_SESSION['courseYear'] = $row['year'];
            $_SESSION['courseSemester'] = $row['semester'];

            echo "<div class='row'>";
                echo "<div class='col-md-6 text-left'>";
                    echo "<h3>".$_SESSION['courseName']."</h3>";
                echo "</div>";
                echo "<div class='col-md-3 text-left'>";
                    echo "<h3>".$_SESSION['courseSemester']."</h3>";
                echo "</div>";
                echo "<div class='col-md-3 text-left'>";
                    echo "<h3>".$_SESSION['courseYear']."</h3>";
                echo "</div>";
            echo "</div>";
        }
    } 
};

?>