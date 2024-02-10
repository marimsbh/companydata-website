
<?php
include("sidebar.php");
$db = new SQLITE3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');    
$sql = "SELECT EMP_NUM, EMP_FNAME, EMP_MNAME, EMP_LNAME, ROLES, EMAIL, PHONE_NUM, HIRE_DATE, JOB_ID, DEPARTMENT_ID FROM employees WHERE EMP_NUM=:uid";    
$stmt = $db->prepare($sql); 
$stmt->bindParam(':uid', $_GET['uid'], SQLITE3_TEXT);   
$result = $stmt->execute();    
while ($row = $result->fetchArray()){ // use fetchArray(SQLITE3_NUM) - another approach    
	$arrayResult [] = $row; //adding a record until end of records    
}

//check if delete button is pressed
if (isset($_POST['delete'])){
    $db = new SQLite3('C:/xampp/htdocs/DBWCoursework_3012813/web_application/data/employee_data.db');
    $stmt = "DELETE FROM employees WHERE EMP_NUM = :uid"; //SQL satement to delete user based on EMP_NUM
    $sql = $db->prepare($stmt);
    $sql->bindParam(':uid', $_POST['uid'], SQLITE3_TEXT);
    $sql->execute();
    header("Location:viewUser.php?deleted=true"); //reditecy to viewUser with succesful message
}

 
?>


<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2>Delete User for <?php echo $_GET['uid'];?></h2><br>
        <h4 style="color: red;">Are you sure want to delete this user?</h4><br> 
        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Employee Number</label> 
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label>
            </div> 
        </div> 
        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label>
            </div> 
        </div> 
        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Middle Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Last Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label>
            </div> 
        </div>
        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color: blue; font-weight: bold;">Roles</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][4] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color: blue; font-weight: bold;">Email</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][5] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color: blue; font-weight: bold;">Phone Number</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][6] ?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color: blue; font-weight: bold;">Hire Date</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][7] ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-5">
                <form method="post">
                    <input type="hidden" name="uid" value = "<?php echo $_GET['uid'] ?>">
                    <br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete">

                    <a href="viewUser.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div> 
        </div> 
    </main>
</div>
