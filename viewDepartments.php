<?php
include_once 'viewDepartmentsSQL.php'; 
include_once 'sidebar.php';

//function to get database connection
function getDatabaseConnection() {
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
    return $db;
}

// call the function to get department  data
$departmentData = getDepartments();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Portal</title>
    <link rel="stylesheet" href="/DBWCoursework_3012813/web_application/css/third.css">
</head>

<body>
    <!-- main section with department table -->
    <main class ="table">
        <section class = "tableName">
            <h1> Department data </h1>
        </section>
        <section class = "tableData">
            <div style="margin: 0 auto; width: 80%;">
                <table>
                    <thead>
                        <tr>
                            <th>Department Name</th>
                            <th>Location</th>
                            <th>Country</th>
                            <th>Region</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Loop through department data and display in table rows -->
                        <?php foreach ($departmentData as $department): ?>
                            <tr>
                                <td><?php echo $department['DEPT_NAME']?></td>
                                <td><?php echo $department['LOCATION']?></td>
                                <td><?php echo $department['COUNTRY_NAME']?></td>
                                <td><?php echo $department['REGION_NAME']?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
