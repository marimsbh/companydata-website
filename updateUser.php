<?php
$db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');

$sql = "SELECT * FROM EMPLOYEES WHERE EMP_NUM=:uid"; // SQL query to select information about an employee based on UID
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
$result = $stmt->execute();
 

// Fetch data into an array
$arrayResult = [];
while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
}

//if form is submitted
if (isset($_POST['submit'])) {
     $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
 
     // SQL query to update employee info
     $sql = "UPDATE EMPLOYEES SET
             EMP_NUM = :EMP_NUM,
             EMP_FNAME = :EMP_FNAME,
             EMP_MNAME = :EMP_MNAME,
             EMP_LNAME = :EMP_LNAME,
             ROLES = :ROLES,
             EMAIL = :EMAIL,
             PHONE_NUM = :PHONE_NUM,
             HIRE_DATE = :HIRE_DATE
             WHERE EMP_NUM = :emp_num2";
 
     $stmt = $db->prepare($sql);
 
     // Bind parameters for update query
     $stmt->bindParam(':emp_num2', $_GET['uid'], SQLITE3_TEXT);
     $stmt->bindParam(':EMP_NUM', $_POST['EMP_NUM'], SQLITE3_TEXT);
     $stmt->bindParam(':EMP_FNAME', $_POST['EMP_FNAME'], SQLITE3_TEXT);
     $stmt->bindParam(':EMP_MNAME', $_POST['EMP_MNAME'], SQLITE3_TEXT);
     $stmt->bindParam(':EMP_LNAME', $_POST['EMP_LNAME'], SQLITE3_TEXT);
     $stmt->bindParam(':ROLES', $_POST['ROLES'], SQLITE3_TEXT);
     $stmt->bindParam(':EMAIL', $_POST['EMAIL'], SQLITE3_TEXT);
     $stmt->bindParam(':PHONE_NUM', $_POST['PHONE_NUM'], SQLITE3_TEXT);
     $stmt->bindParam(':HIRE_DATE', $_POST['HIRE_DATE'], SQLITE3_TEXT);
 
     $stmt->execute();
 
     header('Location: viewUser.php');
     exit();
 }
 
 
?>

<body>
     <div class="row">
          <div class="col-11">
               <form method="post">
                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Employee Number</label>
                         <input class="form-control" type="text" name="EMP_NUM" value="<?php echo $arrayResult[0][0]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">First Name</label>
                         <input class="form-control" type="text" name="EMP_FNAME" value="<?php echo $arrayResult[0][1]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Middle Name</label>
                         <input class="form-control" type="text" name="EMP_MNAME" value="<?php echo $arrayResult[0][2]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Last Name</label>
                         <input class="form-control" type="text" name="EMP_LNAME" value="<?php echo $arrayResult[0][3]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Role</label>
                         <select name="ROLES" class="form-control">
                              <option value="Admin" <?php echo ($arrayResult[0][4] == "Admin") ? "selected" : ""; ?>>Admin</option>
                              <option value="Staff" <?php echo ($arrayResult[0][4] == "Staff") ? "selected" : ""; ?>>Staff</option>
                         </select>
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Email</label>
                         <input class="form-control" type="text" name="EMAIL" value="<?php echo $arrayResult[0][5]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Phone Number</label>
                         <input class="form-control" type="text" name="PHONE_NUM" value="<?php echo $arrayResult[0][6]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Hire Date</label>
                         <input class="form-control" type="text" name="HIRE_DATE" value="<?php echo $arrayResult[0][7]; ?>">
                    </div>

                    <!-- Add other form fields based on your table structure -->

                    <div class="form-group col-md-3">
                         <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    </div>
                    <div class="form-group col-md-3"><a href="viewUser.php">Back</a></div>
               </form>
          </div>
     </div>

</body>
