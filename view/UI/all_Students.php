<?php
 include_once("..\..\controller\classes\StudentController.php");
 include_once("..\classes\AllStudentView.php");

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
</head>
<body>
<?php

$studentController =  new studentController;
$student = $studentController->get_all_Student();  

$ALLStudentsView= new AllStudentsView;
$ALLStudentsView->studnets =$student;
 echo $ALLStudentsView->output();
?>
</body>
</html>






