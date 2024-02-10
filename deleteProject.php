<?php

include("sidebar.php");

$db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
$sql = "SELECT PROJ_NO, PROJ_NAME, START_DATE, END_DATE, PROJ_COSTS FROM projects WHERE PROJ_NO=:uid";
$stmt = $db->prepare($sql);
$stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);
$result = $stmt->execute();

// Fetch the result as an associative array
$arrayResult = $result->fetchArray(SQLITE3_ASSOC);

if (isset($_POST['delete'])){
    $stmt = "DELETE FROM projects WHERE PROJ_NO = :uid";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':uid', $_POST['uid'], SQLITE3_TEXT);
    $sql->execute();
    header("Location:viewProjects.php?deleted=true");
    
    // Close the SQLite3 connection
    $db->close();
}

?>

<h2>Delete User for <?php echo $_GET['uid']; ?></h2>
<br>

<h4 style="color: red;">Are you sure you want to delete this project?</h4>
<br>

<div class="row">
    <div class="col-md-2 f">
        <label style="font-size: 20px; color: blue; font-weight: bold;">Project Number</label>
    </div>
    <div class="col-md-6">
        <label style="font-size: 20px;"><?php echo $arrayResult['PROJ_NO']; ?></label>       
    </div>
</div>

<div class="row">
    <div class="col-md-2 f">
        <label style="font-size: 20px; color: blue; font-weight: bold;">Project Name</label>
    </div>
    <div class="col-md-6">
         <label style="font-size: 20px;"><?php echo $arrayResult['PROJ_NAME'] ?></label>   
    </div>
</div>

<div class="row">
    <div class="col-md-2 f">
        <label style="font-size: 20px; color: blue; font-weight: bold;">Start Date</label>
    </div>
    <div class="col-md-6">
        <label style="font-size: 20px;"><?php echo $arrayResult['START_DATE'] ?></label>
    </div>
</div>

<div class="row">
    <div class="col-md-2 f">
        <label style="font-size: 20px; color: blue; font-weight: bold;">End Date</label>
    </div>
    <div class="col-md-6">
        <label style="font-size: 20px;"><?php echo $arrayResult['END_DATE'] ?></label>
    </div>
</div>

<div class="row">
    <div class="col-md-2 f">
        <label style="font-size: 20px; color: blue; font-weight: bold;">Project costs</label>
    </div>
    <div class="col-md-6">
        <label style="font-size: 20px;"><?php echo $arrayResult['PROJ_COSTS'] ?></label>
    </div>
</div>

<div class="row">
    <div class="col-5">
        <form method="post">
            <input type="hidden" name="uid" value="<?php echo $_GET['uid'] ?>"><br>
            <input type="submit" value="Delete" class="btn btn-danger" name="delete">
            <a href="viewProjects.php" style="font-weight: bold; padding-left: 30px;">Back</a>
        </form>
    </div>
</div>
