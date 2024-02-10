<?php
include_once 'viewUserSQL.php'; 
include_once 'sidebar.php';

//function for database connection
function getDatabaseConnection() {
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
    return $db;
}

//call function to get assignment data
$userData = getUsers();

?>


<?php if(isset($_GET['deleted'])): ?>
    <div id="deleteAlert" class="alert alert-danger alert-dismissible fade show col-10" role="alert" style="font-weight: bold;">
        The user has been deleted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="window.location.href='viewUser.php'">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Employee data management page. This page allows you to view, create, update, and delete employee records.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
    <link rel="stylesheet" href="/DBWCoursework_3012813/web_application/css/third.css">
</head>

<body>
    
    <main class ="table">
        <!-- Main section with employee table -->
        <section class = "tableName">
            <h1> Employee data </h1>
        </section>
        <section class = "tableData">
            <div style="margin: 0 auto; width: 80%;">
            <a href="createUserPage.php" class="btn btn-primary">Create New User</a>
            <a href="viewDependents.php" class="btn btn-primary">Dependents</a>
                <table>
                    <thead>
                        <tr>
                            <th>Employee Number</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Hire Date</th>
                            <th>Job Name</th>
                            <th>Department Name</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Loop through employee data and display in table rows -->
                        <?php foreach ($userData as $user): ?>
                            <tr>
                                <td><?php echo $user['EMP_NUM']?></td>
                                <td><?php echo $user['EMP_FNAME']?></td>
                                <td><?php echo $user['EMP_MNAME']?></td>
                                <td><?php echo $user['EMP_LNAME']?></td>
                                <td><strong><?php echo $user['ROLES']?></td>
                                <td><?php echo $user['EMAIL']?></td>
                                <td><?php echo $user['PHONE_NUM']?></td>
                                <td><?php echo $user['HIRE_DATE']?></td>
                                <td><?php echo $user['JOB_CLASS']?></td>
                                <td><?php echo $user['DEPT_NAME']?></td>
                                <td>
                                    <a href="deleteUser.php?uid=<?php echo $user['EMP_NUM']; ?>">Delete</a>
                                </td>
                                <td>
                                    <a href="updateUser.php?uid=<?php echo $user['EMP_NUM']; ?>">Update</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
