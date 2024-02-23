<?php
$studentId = $studentName = $mobile = "";
$studentIdErr = $studentNameErr = $mobileErr = "";
    
    if(isset($_POST['submit'])){
        $studentId = $_POST['studentId'];
        $studentName = $_POST['studentName'];
        $mobile = $_POST['mobile'];

        include_once 'FacultyService/StudentRecords.php';
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main">
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <div>
                <h2>Add student Form</h2>
            </div>
            <div>
                <label for="studentId">Student Id : </label>
                <span style="color:red;">*<?php echo $studentIdErr ; ?></span>
                <input type="number" name="studentId" id="studentId">
            </div>

            <div>
                <label for="studentName">Student Name : </label>
                <span style="color:red;">*<?php echo $studentNameErr ; ?></span>
                <input type="text" name="studentName" id="studentName">
            </div>

            <div>
                <label for="mobile">Mobile No : </label>
                <span style="color:red;">*<?php echo $mobileErr ; ?></span>
                <input type="number" name="mobile" id="mobile">
            </div>
            <div>
                <input type="submit" value="submit" name="submit">
                <input type="reset">
            </div>
        </form>
    </div>
</body>
</html>