<?php
$db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');

$sql = "SELECT * FROM projects WHERE PROJ_NO=:uid"; //// SQL query to select info about a project based on UID
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

    // SQL query to update project info
    $sql = "UPDATE projects SET
             PROJ_NO = :new_PROJ_NO,
             PROJ_NAME = :PROJ_NAME,
             START_DATE = :START_DATE,
             END_DATE = :END_DATE,
             PROJ_COSTS = :PROJ_COSTS
             WHERE PROJ_NO = :old_PROJ_NO";

    $stmt = $db->prepare($sql);

    // Bind parameters for update query
    $stmt->bindParam(':new_PROJ_NO', $_POST['PROJ_NO'], SQLITE3_TEXT);
    $stmt->bindParam(':PROJ_NAME', $_POST['PROJ_NAME'], SQLITE3_TEXT);
    $stmt->bindParam(':START_DATE', $_POST['START_DATE'], SQLITE3_TEXT);
    $stmt->bindParam(':END_DATE', $_POST['END_DATE'], SQLITE3_TEXT);
    $stmt->bindParam(':PROJ_COSTS', $_POST['PROJ_COSTS'], SQLITE3_TEXT);
    $stmt->bindParam(':old_PROJ_NO', $_GET['uid'], SQLITE3_TEXT);

    $stmt->execute();

    // Update PROJ_NO in assignments table
    $stmt_update_projects = "UPDATE assignments SET
        PROJ_NO = :new_PROJ_NO
        WHERE PROJ_NO = :old_PROJ_NO";

    $stmt_update_projects = $db->prepare($stmt_update_projects);

    $stmt_update_projects->bindParam(':new_PROJ_NO', $_POST['PROJ_NO'], SQLITE3_TEXT);
    $stmt_update_projects->bindParam(':old_PROJ_NO', $_GET['uid'], SQLITE3_TEXT);

    $stmt_update_projects->execute();


    header('Location: viewProjects.php');
    exit();
}
?>


<body>
     <div class="row">
          <div class="col-11">
               <form method="post">
                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Project Number</label>
                         <input class="form-control" type="text" name="PROJ_NO" value="<?php echo $arrayResult[0][0]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Project Name</label>
                         <input class="form-control" type="text" name="PROJ_NAME" value="<?php echo $arrayResult[0][1]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Start Date</label>
                         <input class="form-control" type="text" name="START_DATE" value="<?php echo $arrayResult[0][2]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">Start Date</label>
                         <input class="form-control" type="text" name="END_DATE" value="<?php echo $arrayResult[0][3]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <label class="control-label labelFont">PROJ_COSTS</label>
                         <input class="form-control" type="text" name="PROJ_COSTS" value="<?php echo $arrayResult[0][4]; ?>">
                    </div>

                    <div class="form-group col-md-3">
                         <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    </div>
                    <div class="form-group col-md-3"><a href="viewProjects.php">Back</a></div>
               </form>
          </div>
     </div>

</body>
