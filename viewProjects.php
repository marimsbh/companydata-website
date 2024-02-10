<?php
include_once 'viewProjectsSQL.php';
include_once 'sidebar.php';

// Call the function to get project data
$projectData = getProjects();
?>

<?php if (isset($_GET['deleted'])): ?>
    <div class="alert alert-danger alert-dismissible fade show col-10" role="alert" style="font-weight: bold;">
         The Project has been deleted
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
    <!-- Main section with project table -->
    <main class ="table">
        <section class = "tableName">
            <h1> Project data </h1>
        </section>
        <section class = "tableData">
            <div style="margin: 0 auto; width: 80%;">
                <table>
                    <thead>
                        <tr>
                            <th>Project Number</th>
                            <th>Project name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Project Costs</th>
                            <th colspan="2" >Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Loop through project data and display in table rows -->
                        <?php foreach ($projectData as $project): ?>
                            <tr>
                                <td><?php echo $project['PROJ_NO']?></td>
                                <td><?php echo $project['PROJ_NAME']?></td>
                                <td><?php echo $project['START_DATE']?></td>
                                <td><?php echo $project['END_DATE']?></td>
                                <td><?php echo $project['PROJ_COSTS']?></td>
                                <td>
                                    <a href="deleteProject.php?uid=<?php echo $project['PROJ_NO']; ?>">Delete</a>
                                </td>
                                <td>
                                    <a href="updateProject.php?uid=<?php echo $project['PROJ_NO']; ?>">Update</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>


