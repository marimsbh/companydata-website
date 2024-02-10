<?php
include("sidebar.php");
$createUserResult = $_GET['createUser'];

?>

<div class="container bgColor">
    <main role="main" class="pb-3">
        <h2>User Creation Result</h2><br>
        <div>
            <?php
            if ($createUserResult) {
                echo "User has been successfully created";
            } else {
                echo "Error";
            }
            ?>
            <div><a href="viewUser.php">Back</a></div>
        </div>
    </main>
</div>
