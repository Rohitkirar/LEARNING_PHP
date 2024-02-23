<?php
$studentId  = $marks = "";
$studentIdErr = $marksErr = "";
    
    if(isset($_POST['submit'])){
        $studentId = $_POST['studentId'];
        $marks = $_POST['marks'];

        include_once 'FacultyService/StudentMarks.php';

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
                <h2>Add student Marks Form</h2>
            </div>
            <div>
                <label for="studentId">Student Id : </label>
                <span style="color:red;">*<?php echo $studentIdErr ; ?></span>
                <input type="number" name="studentId" id="studentId">
            </div>

            <div>
                <label for="marks">Marks : </label>
                <div id="marks">
                    <label for="physics">Physics Marks : </label>
                    <span style="color:red;">*<?php echo $marksErr ; ?></span>
                    <input type="number" name="marks['physics']" id="physics">
                    
                    <label for="chemistry">Chemistry Marks : </label>
                    <span style="color:red;">*<?php echo $marksErr ; ?></span>
                    <input type="number" name="marks['chemistry']" id="chemistry">

                    <label for="maths">Physics Marks : </label>
                    <span style="color:red;">*<?php echo $marksErr ; ?></span>
                    <input type="number" name="marks['maths']" id="maths">
                </div>
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