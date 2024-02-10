<?php
$db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');

$sql = "SELECT * FROM dependents WHERE dependent_id=:uid"; //SQL query to select info about a dependant based on UID
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT); //bind UID parameter and execute query
$result = $stmt->execute();

// Fetch data into an array
$arrayResult = [];
while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayResult[] = $row;
}

//if the form is submitted
if (isset($_POST['submit'])) {
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
    
    //SQL query to update dependant info
    $sql = "UPDATE dependents SET
             dependent_id = :new_dependent_id,
             RELATIONSHIP = :RELATIONSHIP,
             R_FNAME = :R_FNAME,
             R_LNAME = :R_LNAME,
             R_EMAIL = :R_EMAIL,
             R_PHONENUM = :R_PHONENUM
             WHERE dependent_id = :old_dependent_id";

    $stmt = $db->prepare($sql);

    // Bind parameters for update query
    $stmt->bindParam(':old_dependent_id', $_GET['uid'], SQLITE3_TEXT);
    $stmt->bindParam(':new_dependent_id', $_POST['dependent_id'], SQLITE3_TEXT);
    $stmt->bindParam(':RELATIONSHIP', $_POST['RELATIONSHIP'], SQLITE3_TEXT);
    $stmt->bindParam(':R_FNAME', $_POST['R_FNAME'], SQLITE3_TEXT);
    $stmt->bindParam(':R_LNAME', $_POST['R_LNAME'], SQLITE3_TEXT);
    $stmt->bindParam(':R_EMAIL', $_POST['R_EMAIL'], SQLITE3_TEXT);
    $stmt->bindParam(':R_PHONENUM', $_POST['R_PHONENUM'], SQLITE3_TEXT);

    $stmt->execute();


    //redirect to viewDependents after update
    header('Location: viewDependents.php');
    exit();
}
?>


<body>
    <div class="row">
        <div class="col-11">
            <form method="post">

                <div class="form-group col-md-3">
                    <label class="control-label labelFont">Dependent ID</label>
                    <input class="form-control" type="text" name="dependent_id" value="<?php echo $arrayResult[0][0]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class="control-label labelFont">First Name</label>
                    <input class="form-control" type="text" name="EMP_FNAME" value="<?php echo $arrayResult[0][1]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class="control-label labelFont">Last Name</label>
                    <input class="form-control" type="text" name="EMP_LNAME" value="<?php echo $arrayResult[0][2]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class="control-label labelFont">Relationship</label>
                    <input class="form-control" type="text" name="RELATIONSHIP" value="<?php echo $arrayResult[0][3]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class="control-label labelFont">Dependent First Name</label>
                    <input class="form-control" type="text" name="R_FNAME" value="<?php echo $arrayResult[0][4]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class="control-label labelFont">Dependent Last Name</label>
                    <input class="form-control" type="text" name="R_LNAME" value="<?php echo $arrayResult[0][5]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class="control-label labelFont">Dependent Email</label>
                    <input class="form-control" type="text" name="R_EMAIL" value="<?php echo $arrayResult[0][6]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <label class="control-label labelFont">Dependent Phone Number</label>
                    <input class="form-control" type="text" name="R_PHONENUM" value="<?php echo $arrayResult[0][7]; ?>">
                </div>

                <div class="form-group col-md-3">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary">
                </div>
                <div class="form-group col-md-3"><a href="viewDependents.php">Back</a></div>
            </form>
        </div>
    </div>
</body>
