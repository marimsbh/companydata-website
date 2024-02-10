<?php
include_once 'viewDependentSQL.php';

//function to connect database
function getDatabaseConnection() {
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
    return $db;
}

//call teh function to get dependent data
$dependentsData = getDependents();

?>


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
    <!-- Main section with dependent table -->
    <main class ="table">
        <section class = "tableName">
            <h1> Dependents data </h1>
        </section>
        <section class = "tableData">
            <div style="margin: 0 auto; width: 80%;">
            <div><a href="viewUser.php">Back</a></div>
                <table>
                    <thead>
                        <tr>
                            <th>Employee Number<th>
                            <th>Employee Name</th>
                            <th>Dependent ID<th>
                            <th>Relationship</th>
                            <th>Dependent Name</th>
                            <th>Dependent Email</th>
                            <th>Dependent Phone Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Loop through dependent data and display in table rows -->
                        <?php foreach ($dependentsData as $dependent): ?>
                            <tr>
                                <td><?php echo $dependent['EMP_NUM']?></td>
                                <td><?php echo $dependent['EMP_NAME']?></td>
                                <td><?php echo $dependent['dependent_id']?></td>
                                <td><?php echo $dependent['RELATIONSHIP']?></td>
                                <td><?php echo $dependent['D_NAME']?></td>
                                <td><?php echo $dependent['R_EMAIL']?></td>
                                <td><?php echo $dependent['R_PHONENUM']?></td>
                                <td>
                                    <a href="updateDependent.php?uid=<?php echo $dependent['dependent_id']; ?>">Update</a>
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
