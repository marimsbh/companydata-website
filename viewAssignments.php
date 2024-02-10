<?php
include_once 'viewAssignmentsSQL.php';
include_once 'sidebar.php';

//function to get database connection
function getDatabaseConnection() {
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
    return $db;
}
// Call the function to get user data
$assignmentData = getAssignments();
?>

<!-- Display a confirmation message if assignment is deleted -->
<?php if (isset($_GET['deleted'])): ?>
    <div class="alert alert-danger alert-dismissible fade show col-10" role="alert" style="font-weight: bold;">
         The assignment has been deleted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
    <link rel="stylesheet" href="/DBWCoursework_3012813/web_application/css/third.css">
</head>


<body>
    <!-- Main section with assignment table -->
    <main class ="table">
        <section class = "tableName">
            <h1> Assignment data </h1>
        </section>
        <section class = "tableData">
            <div style="margin: 0 auto; width: 80%;">
                <table>
                    <thead>
                        <tr>
                            <th>Project Number</th>
                            <th>Project Name</th>
                            <th>Employee Number</th>
                            <th>Employee Name</th>
                            <th>Role</th>
                            <th>Hours</th>
                            <th  colspan="2">Actions</th>
                            
                        </tr>
                    </thead>

                    <tbody>
                        <!-- loop through assignment data and display in table rows -->
                        <?php foreach ($assignmentData as $assignment): ?>
                            <tr>
                                <td><?php echo $assignment['PROJ_NO']?></td>
                                <td><?php echo $assignment['PROJ_NAME']?></td>
                                <td><?php echo $assignment['EMP_NUM']?></td>
                                <td><?php echo $assignment['EMP_NAME'] ?></td>
                                <td><?php echo $assignment['ROLES'] ?></td>
                                <td><?php echo $assignment['HOURS']?></td>
                                <td>
                                    <a href="deleteAssignment.php?uid=<?php echo $assignment['PROJ_NO']; ?>">Delete</a>
                                </td>
                                <td>
                                    <a href="updateAssignment.php?uid=<?php echo $assignment['PROJ_NO']; ?>">Update</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>

